<?php


/*
V5.17 17 May 2012  (c) 2000-2012 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence.
  Set tabs to 8.
 
*/ 

class ADODB_pdo_mssql extends ADODB_pdo {
	
	var $sysTime = 'CURRENT TIME';
	var $sysDate = 'CURRENT DATE';
	var $sysTimeStamp = 'CURRENT TIMESTAMP';
	
	var $fmtTimeStamp = "'Y-m-d H:i:s'";
	
	
	function _init($parentDriver)
	{
		$parentDriver->hasTransactions = true;
		$parentDriver->transOff = false;
		$parentDriver->hasInsertID = true;

		$parentDriver->_connectionID->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
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

	function MetaTables($ttype=false,$showSchema=false,$mask=false) 
	{
		return false;
	}
	
	function MetaColumns($table,$normalize=true)
	{
		return false;
	}
}
?>