<?php
/* 
v4.991 16 Oct 2008  (c) 2000-2008 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence. See License.txt. 
  Set tabs to 4 for best viewing.
  
  Latest version is available at http://adodb.sourceforge.net
  
  Microsoft Access data driver. Requires ODBC. Works only on MS Windows.
*/
if (!defined('_ADODB_ODBC_LAYER')) {
	if (!defined('ADODB_DIR')) die();
	
	include(ADODB_DIR."/drivers/adodb-odbc.inc.php");
}
 if (!defined('_ADODB_ACCESS')) {
 	define('_ADODB_ACCESS',1);

class  ADODB_access extends ADODB_odbc {	
	var $databaseType = 'access';
	var $hasTop = 'top';		// support mssql SELECT TOP 10 * FROM TABLE
	var $fmtDate = "#Y-m-d#";
	var $fmtTimeStamp = "#Y-m-d h:i:sA#"; // note not comma
	var $_bindInputArray = false; // strangely enough, setting to true does not work reliably
	var $sysDate = "FORMAT(NOW,'yyyy-mm-dd')";
	var $sysTimeStamp = 'NOW';
	var $hasTransactions = false;
	var $upperCase = 'ucase';
	
	function __construct()
	{
	global $ADODB_EXTENSION;
	
		$ADODB_EXTENSION = false;
		$this->ADODB_odbc();
	}
	
	function Time()
	{
		return time();
	}
	
	// returns true or false
	function Connect($argHostname = "", $argUsername = "", $argPassword = "", $argDatabaseName = "", $forceNew = false, $arrExtraArgs=array(), $charset="") 
	{
		//testa se � odbc ou arquivo direto
		//se for arquivo direto, monta string de dns
		if(is_file($argHostname))
		{
			if(!empty($argUsername))
			{
				$argUsername = "UID=". $argUsername .";";
			}
			if(!empty($argPassword))
			{
				$argPassword = "PWD=". $argPassword .";";
			}

			if(substr($argHostname, "-6") == ".accdb" || !empty(strstr(php_uname("m"), '64')))
			{
				$argHostname = "DBQ=". $argHostname .";DefaultDir=". realpath(dirname($argHostname)) .";Driver={Microsoft Access Driver (*.mdb, *.accdb)};FIL=MS Access;MaxBufferSize=2048;PageTimeout=5;SafeTransactions=0;Threads=3;". $argUsername . $argPassword ."UserCommitSync=Yes;";
			}			
			else
			{
				$argHostname = "DBQ=". $argHostname .";DefaultDir=". realpath(dirname($argHostname)) .";Driver={Microsoft Access Driver (*.mdb)};FIL=MS Access;MaxBufferSize=2048;PageTimeout=5;SafeTransactions=0;Threads=3;". $argUsername . $argPassword ."UserCommitSync=Yes;";
			}

			$argUsername = "";
			$argPassword = "";
		}
		return $this->_connect($argHostname, $argUsername, $argPassword, $argDatabaseName);
	}
	
	function IfNull( $field, $ifNull ) 
	{
		return " IIF(IsNull($field), $ifNull, $field) "; // if Access
	}
}

 
class  ADORecordSet_access extends ADORecordSet_odbc {	
	
	var $databaseType = "access";		
	
	function __construct($id,$mode=false)
	{
		$this->ADORecordSet_access($id,$mode);
	}
	
	function ADORecordSet_access($id,$mode=false)
	{
		return $this->ADORecordSet_odbc($id,$mode);
	}
}// class
} 
?>