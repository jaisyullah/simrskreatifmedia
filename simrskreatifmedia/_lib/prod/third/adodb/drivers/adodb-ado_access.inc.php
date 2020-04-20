<?php
/* 
v4.991 16 Oct 2008  (c) 2000-2008 John Lim (jlim#natsoft.com). All rights reserved.
Released under both BSD license and Lesser GPL library license. 
Whenever there is any discrepancy between the two licenses, 
the BSD license will take precedence. See License.txt. 
Set tabs to 4 for best viewing.
  
  Latest version is available at http://adodb.sourceforge.net
  
	Microsoft Access ADO data driver. Requires ADO and ODBC. Works only on MS Windows.
*/

// security - hide paths
if (!defined('ADODB_DIR')) die();

if (!defined('_ADODB_ADO_LAYER')) {
	if (PHP_VERSION >= 5) include(ADODB_DIR."/drivers/adodb-ado5.inc.php");
	else include(ADODB_DIR."/drivers/adodb-ado.inc.php");
}

class  ADODB_ado_access extends ADODB_ado {	
	var $databaseType = 'ado_access';
	var $hasTop = 'top';		// support mssql SELECT TOP 10 * FROM TABLE
	var $fmtDate = "#Y-m-d#";
	var $fmtTimeStamp = "#Y-m-d h:i:sA#";// note no comma
	var $sysDate = "FORMAT(NOW,'yyyy-mm-dd')";
	var $sysTimeStamp = 'NOW';
	var $hasTransactions = false;
	var $upperCase = 'ucase';
	
	function __construct()
	{
		$this->ADODB_ado_access();
	}
	
	function ADODB_ado_access()
	{
		$this->ADODB_ado();
	}
	
	// returns true or false
	function Connect($argHostname = "", $argUsername = "", $argPassword = "", $argDatabaseName = "", $forceNew = false, $arrExtraArgs=array(), $charset="") 
	{
		if(substr($argHostname, -6) == '.accdb')
		{
			$argHostname  = 'Provider=Microsoft.ACE.OLEDB.12.0;Data Source='. $argHostname .';Persist Security Info=False;';
		}
		else
		{
			$argHostname  = 'PROVIDER=Microsoft.Jet.OLEDB.4.0;DATA SOURCE=' . $argHostname . ';Persist Security Info=False;';
		}
		
		if (!empty($argUsername))
		{
			$argHostname .= 'User ID=' . $argUsername . ';';
		}
		if (!empty($argPassword))
		{
			$argHostname .= 'Jet OLEDB:Database Password=' . $argPassword . ';';
		}
		
		return $this->_connect($argHostname, $argUsername, $argPassword, "");
	}
}

class  ADORecordSet_ado_access extends ADORecordSet_ado {	
	
	var $databaseType = "ado_access";		
	
	function __construct($id,$mode=false)
	{
		$this->ADORecordSet_ado_access($id,$mode);
	}
	
	function ADORecordSet_ado_access($id,$mode=false)
	{
		return $this->ADORecordSet_ado($id,$mode);
	}
}
?>