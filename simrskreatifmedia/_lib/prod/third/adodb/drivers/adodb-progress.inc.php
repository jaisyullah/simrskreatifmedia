<?php
if (!defined('ADODB_DIR')) die();

if (!defined('_ADODB_ODBC_LAYER')) {
	include(ADODB_DIR."/drivers/adodb-odbc.inc.php");
}
if (!defined('ADODB_PROGRESS')){
	define('ADODB_PROGRESS',1);
	class ADODB_progress extends ADODB_odbc {

		var $databaseType = "progress";	
		var $metaTablesSQL = "SELECT CONCAT(OWNER, CONCAT('.',  TBL)), TBLTYPE FROM SYSPROGRESS.SYSTABLES";
		var $metaColumnsSQL = "SELECT COL, COLTYPE, WIDTH, SCALE, NULLFLAG, DFLT_VALUE FROM SYSPROGRESS.SYSCOLUMNS WHERE (''='%s' OR OWNER='%s') AND TBL='%s' ORDER BY ID";
		
		function __construct()
		{
			$this->ADODB_odbc();
		}

		function MetaTables($ttype=false,$showSchema=false,$mask=false) 
		{
			if ($mask) {
				$save = $this->metaTablesSQL;
				$mask = $this->qstr(strtoupper($mask));
				$this->metaTablesSQL .= " AND upper(table_name) like $mask";
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

			$schema = '';
			$this->_findschema($table,$schema);

			$rs = $this->Execute(sprintf($this->metaColumnsSQL,strtoupper($schema),strtoupper($schema),strtoupper($table)));
			
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
			   	$fld->not_null = ($rs->fields[4] == 'N');
				$fld->binary = (strpos($fld->type,'blob') !== false);
				$fld->default_value = $rs->fields[5];
				
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

	};

	class ADORecordset_progress extends ADORecordSet_odbc {	
		var $databaseType = "progress";
		function __construct($id,$mode=false)
		{
			$this->ADORecordset_progress($id,$mode);
		}
		
		function ADORecordset_progress($id,$mode=false)
		{
			$this->ADORecordSet_odbc($id,$mode);
		}
	}
} //define
?>