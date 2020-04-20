<?php


/*
V5.17 17 May 2012  (c) 2000-2012 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence.
  Set tabs to 8.
 
*/ 

class ADODB_pdo_sqlsrv extends ADODB_pdo {
	var $metaTablesSQL="select name,case when type='U' then 'T' else 'V' end from sysobjects where (type='U' or type='V') and (name not in ('sysallocations','syscolumns','syscomments','sysdepends','sysfilegroups','sysfiles','sysfiles1','sysforeignkeys','sysfulltextcatalogs','sysindexes','sysindexkeys','sysmembers','sysobjects','syspermissions','sysprotects','sysreferences','systypes','sysusers','sysalternates','sysconstraints','syssegments','REFERENTIAL_CONSTRAINTS','CHECK_CONSTRAINTS','CONSTRAINT_TABLE_USAGE','CONSTRAINT_COLUMN_USAGE','VIEWS','VIEW_TABLE_USAGE','VIEW_COLUMN_USAGE','SCHEMATA','TABLES','TABLE_CONSTRAINTS','TABLE_PRIVILEGES','COLUMNS','COLUMN_DOMAIN_USAGE','COLUMN_PRIVILEGES','DOMAINS','DOMAIN_CONSTRAINTS','KEY_COLUMN_USAGE','dtproperties'))";
	var $metaColumnsSQL = # xtype==61 is datetime
        "select c.name as name,t.name as type, c.length,
	    (case when c.xusertype=61 then 0 else c.xprec end) as length2,
	    (case when c.xusertype=61 then 0 else c.xscale end) as xscale 
	    from syscolumns c join systypes t on t.xusertype=c.xusertype join sysobjects o on o.id=c.id where o.name='%s'";
	var $hasTop = 'top';
	var $sysDate = 'convert(datetime,convert(char,GetDate(),102),102)';
	var $sysTimeStamp = 'GetDate()';
	
	
	function _init($parentDriver)
	{
	
		$parentDriver->hasTransactions = false; ## <<< BUG IN PDO mssql driver
		$parentDriver->_bindInputArray = false;
		$parentDriver->hasInsertID = true;
	}
	
	function ServerInfo()
	{
		return ADOConnection::ServerInfo();
	}
	
	function SelectLimit($sql,$nrows=-1,$offset=-1,$inputarr=false,$secs2cache=0)
	{
		$ret = ADOConnection::SelectLimit($sql,$nrows,$offset,$inputarr,$secs2cache);
		return $ret;
	}
	
	function SetTransactionMode( $transaction_mode ) 
	{
		$this->_transmode  = $transaction_mode;
		if (empty($transaction_mode)) {
			$this->Execute('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
			return;
		}
		if (!stristr($transaction_mode,'isolation')) $transaction_mode = 'ISOLATION LEVEL '.$transaction_mode;
		$this->Execute("SET TRANSACTION ".$transaction_mode);
	}
	
	function MetaTables($ttype=false,$showSchema=false,$mask=false) 
	{
	    if ($mask) {
			$save = $this->metaTablesSQL;
			$mask = $this->qstr(($mask));
			$this->metaTablesSQL .= " AND name like $mask";
		}
		$ret = ADOConnection::MetaTables($ttype,$showSchema);

		if ($mask) {
			$this->metaTablesSQL = $save;
		}
		return $ret;
	}
	
	// mark newnham
	function MetaColumns($tab,$normalize=true)
	{
	  global $ADODB_FETCH_MODE;
	  $false = false;
	  $save = $ADODB_FETCH_MODE;
	  $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	  
	  $schema = '';
	  $this->_findschema($tab,$schema);
	  
	  if ($this->fetchMode !== false) $savem = $this->SetFetchMode(false);
	  
	  $str_sql = sprintf($this->metaColumnsSQL,$tab);
	  if(!empty($schema))
	  {
	    $str_sql .= " AND o.uid = (SELECT schema_id FROM sys.schemas WHERE name = '" . $schema . "')";
	  }
	  
	  $rs = $this->Execute($str_sql);
	  if (isset($savem)) $this->SetFetchMode($savem);
	  if (!$rs) {
	    $ADODB_FETCH_MODE = $save; 
	    return $false;
	  }
	  $arr = array();
	  while ($r = $rs->FetchRow()) {
	  	
	  	$type = explode('(',$r['type']);
	    $size = '';
	    if (sizeof($type)==2)
	    	$size = trim($type[1],')');
	    	
	    $fn = strtoupper($r['name']);
	    
	    $fld = new ADOFieldObject;
	    $fld->name = $r['name'];
	    $fld->type = $r['type'];
	    $fld->max_length =$r['length'];
	    $fld->scale = 0;
	    
	    switch (strtoupper($fld->type)) {
	    	case 'INT':
	    	case 'INTEGER':
	    	case 'BIGINT':
	    	case 'DATE':
	    	case 'SMALLINT':
	    	case 'TINYINT':
	    		$fld->max_length =$r['length2'];
	    		break;
	    
	    	case 'DECIMAL':
	    	case 'MONEY':
	    	case 'SMALLMONEY':
	    	case 'NUMERIC':
	    	case 'TIME':
	    	case 'SMALLDATETIME':
	    	case 'DATETIME2':
	    		$fld->max_length =$r['length2'];
	    		$fld->scale =$r['xscale'];
	    		break;
	    		
	    	case 'REAL':
	    	case 'FLOAT':
	    		$fld->max_length =$r['length2'];
	    		if($fld->max_length > 24)
	    		{
	    			$fld->scale =15;
	    		}else 
	    		{
	    			$fld->scale =7;
	    		}
	    		break;
	    
	    	case 'NCHAR':
	    	case 'NVARCHAR':
	    		
	    		if($fld->max_length < 0)
	    		{
	    			$fld->max_length =4000;
	    		}else if($fld->max_length > 1)
	    		{
	    			$fld->max_length = $fld->max_length/2;
	    		}
	    		break;
	    
	    	case 'VARCHAR':
	    		
	    		if($fld->max_length < 0)
	    		{
	    			$fld->max_length =8000;
	    		}
	    		break;
	    
	    	case 'DATETIME':
	    		$fld->max_length =19;
	    		break;
	    }
	    
	    if ($save == ADODB_FETCH_NUM)
	    	$arr[] = $fld;	
	    else 
	    	$arr[strtoupper($fld->name)] = $fld;
	  }
	  $rs->Close();
	  $ADODB_FETCH_MODE = $save;
	  
	  return $arr;
	}
	
	function BlobDecode($blob,$maxsize=false,$hastrans=true, $blobtype='BLOB')
	{
		return pack("H*",$blob);
	}
}
?>