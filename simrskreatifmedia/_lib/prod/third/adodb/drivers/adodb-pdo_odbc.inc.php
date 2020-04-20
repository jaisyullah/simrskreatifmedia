<?php
/*
V4.94 23 June 2007  (c) 2000-2007 Brian Kirchoff (briankircho@gmail.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence.
  Set tabs to 8.
*/ 

class ADODB_pdo_odbc extends ADODB_pdo {
    var $fmtDate = "'Y-m-d'";
	var $fmtTimeStamp = "'Y-m-d H:i:s'";
	var $replaceQuote = "''"; // string to use to replace quotes
    
    function _init($parentDriver)
	{
        $parentDriver->hasTransactions = false;
		$parentDriver->_bindInputArray = false;
		$parentDriver->hasInsertID = true;
	}
    
    function MetaTables($ttype=false,$showSchema=false,$mask=false) 
	{
	   return array();
	}
    
    function MetaColumns($table,$normalize=true)
    {
        return array();
    }
    
    function SelectLimit($sql,$nrows=-1,$offset=-1,$inputarr=false,$secs2cache=0)
	{
		$ret = ADOConnection::SelectLimit($sql,$nrows,$offset,$inputarr,$secs2cache);
		return $ret;
	}
}

class  ADORecordSet_pdo_odbc extends ADORecordSet_pdo {	
    var $databaseType = "pdo_odbc";
	function __construct($id,$mode=false)
	{
		$this->ADORecordSet_pdo($id,$mode);
	}
}
?>