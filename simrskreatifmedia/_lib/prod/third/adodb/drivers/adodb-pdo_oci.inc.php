<?php


/*
V5.17 17 May 2012  (c) 2000-2012 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence.
  Set tabs to 8.
 
*/ 

class ADODB_pdo_oci extends ADODB_pdo_base {

	var $concat_operator='||';
	var $sysDate = "TRUNC(SYSDATE)";
	var $sysTimeStamp = 'SYSDATE';
	var $random = "abs(mod(DBMS_RANDOM.RANDOM,10000001)/10000000)";

	var $NLS_DATE_FORMAT = 'RRRR-MM-DD HH24:MI:SS';  // To include time, use 'RRRR-MM-DD HH24:MI:SS'
	var $dateformat = 'YYYY-MM-DD'; // for DBDate()
 	var $useDBDateFormatForTextInput=false;
	var $datetime = false; // MetaType('DATE') returns 'D' (datetime==false) or 'T' (datetime == true)

	var $metaDatabasesSQL = "SELECT USERNAME FROM ALL_USERS WHERE USERNAME NOT IN ('SYS','SYSTEM','DBSNMP','OUTLN') ORDER BY 1";
	var $metaTablesSQL = "SELECT TABLE_NAME, TABLE_TYPE FROM ALL_CATALOG WHERE TABLE_TYPE IN ('TABLE','VIEW') AND TABLE_NAME NOT LIKE '%\$' AND TABLE_NAME NOT LIKE 'BIN\$%' AND TABLE_NAME NOT LIKE 'APPLY\$%' AND TABLE_NAME NOT LIKE 'FGR\$%' AND TABLE_NAME NOT LIKE 'STREAMS\$%' AND TABLE_NAME NOT LIKE 'DIR\$%' AND TABLE_NAME NOT LIKE 'REGISTRY\$%' AND TABLE_NAME NOT LIKE 'OL\$%' AND TABLE_NAME NOT LIKE 'V_\$%' AND TABLE_NAME NOT LIKE 'GV_\$%'";
	var $metaColumnsSQL = "SELECT COLUMN_NAME, DATA_TYPE, DATA_LENGTH, DATA_SCALE, DATA_PRECISION, NULLABLE, DATA_DEFAULT FROM ALL_TAB_COLUMNS WHERE OWNER='%s' AND TABLE_NAME='%s' ORDER BY COLUMN_ID";
	var $metaColumnsSQLNoSchema = "SELECT COLUMN_NAME, DATA_TYPE, DATA_LENGTH, DATA_SCALE, DATA_PRECISION, NULLABLE, DATA_DEFAULT FROM ALL_TAB_COLUMNS WHERE TABLE_NAME='%s' ORDER BY COLUMN_ID";
	var $_genIDSQL = "SELECT (%s.nextval) FROM DUAL";
	var $_genSeqSQL = "CREATE SEQUENCE %s START WITH %s";
	var $_dropSeqSQL = "DROP SEQUENCE %s";
		
 	var $_initdate = false;
	var $_hasdual = true;
	
	function _init($parentDriver)
	{
		global $ADODB_FETCH_MODE;

		$parentDriver->_bindInputArray = true;
		$parentDriver->_nestedSQL = true;

		if ($this->_initdate) {

			$save = $ADODB_FETCH_MODE;
	        $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
	        if ($this->fetchMode !== FALSE) {
	               $savem = $this->SetFetchMode(FALSE);
	        }
			$this->Execute("ALTER SESSION SET NLS_DATE_FORMAT='".$this->NLS_DATE_FORMAT."'");
			if (isset($savem)) {
	            $this->SetFetchMode($savem);
	        }
	        $ADODB_FETCH_MODE = $save;
		}
	}
	
	function MetaTables($ttype=false,$showSchema=false,$mask=false) 
	{
		if ($mask) {
			$save = $this->metaTablesSQL;
			$mask = $this->qstr(strtoupper($mask));
			$this->metaTablesSQL .= " AND table_name like $mask";
		}
		$ret = ADOConnection::MetaTables($ttype,$showSchema);
		
		if ($mask) {
			$this->metaTablesSQL = $save;
		}
		return $ret;
	}
	
	function MetaColumns($table,$normalize=true)
	{
	global $ADODB_FETCH_MODE;
	
		$false = false;
		$save = $ADODB_FETCH_MODE;
		$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
		if ($this->fetchMode !== false) $savem = $this->SetFetchMode(false);
		
		$this->_findschema($table,$schema);
		if(!empty($schema)) {
			$rs = $this->Execute(sprintf($this->metaColumnsSQL,strtoupper($schema),strtoupper($table)));
		}
		else {
			$rs = $this->Execute(sprintf($this->metaColumnsSQLNoSchema,strtoupper($table)));
		}
		
		if (isset($savem)) $this->SetFetchMode($savem);
		$ADODB_FETCH_MODE = $save;
		if (!$rs) {
			return $false;
		}
		$retarr = array();
		while (!$rs->EOF) { //print_r($rs->fields);
			$fld = new ADOFieldObject();
	   		$fld->name = $rs->fields[0];
	   		$fld->type = $rs->fields[1];
	   		$fld->max_length = $rs->fields[2];
			$fld->scale = $rs->fields[3];
			if ($rs->fields[1] == 'NUMBER' && $rs->fields[3] == 0) {
				$fld->type ='INT';
	     		$fld->max_length = $rs->fields[4];
	    	}	
		   	$fld->not_null = (strncmp($rs->fields[5], 'NOT',3) === 0);
			$fld->binary = (strpos($fld->type,'BLOB') !== false);
			$fld->default_value = $rs->fields[6];
			
			if ($ADODB_FETCH_MODE == ADODB_FETCH_NUM) $retarr[] = $fld;	
			else $retarr[strtoupper($fld->name)] = $fld;
			$rs->MoveNext();
		}
		$rs->Close();
		if (empty($retarr))
			return  $false;
		else 
			return $retarr;
	}
}

?>