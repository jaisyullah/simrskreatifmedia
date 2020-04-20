<?php

class ADODB_pdo_informix extends ADODB_pdo {
	
   //select * from syscolumns
   //select current from dual


    var $metaTablesSQL="select tabname,tabtype from systables where tabtype in ('T','V')"; //Don't get informix tables and pseudo-tables


	var $metaColumnsSQL = 
		"select c.colname, c.coltype, c.collength, d.default,c.colno
		from syscolumns c, systables t,outer sysdefaults d
		where c.tabid=t.tabid and d.tabid=t.tabid and d.colno=c.colno
		and tabname='%s' order by c.colno";

	var $metaPrimaryKeySQL =
		"select part1,part2,part3,part4,part5,part6,part7,part8 from
		systables t,sysconstraints s,sysindexes i where t.tabname='%s'
		and s.tabid=t.tabid and s.constrtype='P'
		and i.idxname=s.idxname";
		
	var $sysDate = 'CURDATE()';
	var $sysTimeStamp = 'NOW()';
	var $hasGenID = true;
	var $_genIDSQL = "update %s set id=LAST_INSERT_ID(id+1);";
	var $_dropSeqSQL = "drop table %s";
	var $fmtTimeStamp = "'Y-m-d, H:i:s'";
	var $nameQuote = '`';

	function _init($parentDriver)
	{
	
		$parentDriver->hasTransactions = false;
		#$parentDriver->_bindInputArray = false;
		$parentDriver->hasInsertID = true;
		//$parentDriver->_connectionID->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
	}
	
		// dayFraction is a day in floating point
	function OffsetDate($dayFraction,$date=false)
	{		
		if (!$date) $date = $this->sysDate;
		
		$fraction = $dayFraction * 24 * 3600;
		return $date . ' + INTERVAL ' .	 $fraction.' SECOND';
		
//		return "from_unixtime(unix_timestamp($date)+$fraction)";
	}
	
	function Concat() 
	{	
		$s = "";
		$arr = func_get_args();

		// suggestion by andrew005#mnogo.ru
		$s = implode(',',$arr);
		if (strlen($s) > 0) return "CONCAT($s)"; return ''; 
	}
	
	function ServerInfo()
	{
		$arr['description'] = ADOConnection::GetOne("select version()");
		$arr['version'] = ADOConnection::_findvers($arr['description']);
		return $arr;
	}
	
	function MetaTables($ttype=false,$showSchema=false,$mask=false) 
	{	
		$save = $this->metaTablesSQL;
		if ($showSchema && is_string($showSchema)) {
			$this->metaTablesSQL .= " from $showSchema";
		}
		
		if ($mask) {
			$mask = $this->qstr($mask);
			$this->metaTablesSQL .= " like $mask";
		}
		$ret = ADOConnection::MetaTables($ttype,$showSchema);
		
		$this->metaTablesSQL = $save;
		return $ret;
	}
	
	function SetTransactionMode( $transaction_mode ) 
	{
		$this->_transmode  = $transaction_mode;
		if (empty($transaction_mode)) {
			$this->Execute('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
			return;
		}
		if (!stristr($transaction_mode,'isolation')) $transaction_mode = 'ISOLATION LEVEL '.$transaction_mode;
		$this->Execute("SET SESSION TRANSACTION ".$transaction_mode);
	}
	
	function MetaColumns($table,$normalize=true)
	{
		global $ADODB_FETCH_MODE;
	
		$false = false;
		if (!empty($this->metaColumnsSQL)) {
			$save = $ADODB_FETCH_MODE;
			$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
			if ($this->fetchMode !== false) $savem = $this->SetFetchMode(false);
          		$rs = $this->Execute(sprintf($this->metaColumnsSQL,$table));
			if (isset($savem)) $this->SetFetchMode($savem);
			$ADODB_FETCH_MODE = $save;
			if ($rs === false) return $false;
			$rspkey = $this->Execute(sprintf($this->metaPrimaryKeySQL,$table)); //Added to get primary key colno items

			$retarr = array();
			while (!$rs->EOF) { //print_r($rs->fields);
				$fld = new ADOFieldObject();
				$fld->name = $rs->fields[0];
				$pr=ifx_props($rs->fields[1],$rs->fields[2]); //!eos
				$fld->type = $pr[0] ;//!eos
				$fld->primary_key=$rspkey->fields && array_search($rs->fields[4],$rspkey->fields);
				$fld->max_length = $pr[1]; //!eos
				$fld->precision = $pr[2] ;//!eos
				$fld->not_null = $pr[3]=="N"; //!eos

				if (trim($rs->fields[3]) != "AAAAAA 0") {
	                    		$fld->has_default = 1;
	                    		$fld->default_value = $rs->fields[3];
				} else {
					$fld->has_default = 0;
				}

                $retarr[strtolower($fld->name)] = $fld;	
				$rs->MoveNext();
			}

			$rs->Close();
			$rspkey->Close(); //!eos
			return $retarr;	
		}

		return $false;
	}
	
	function SelectLimit($sql,$nrows=-1,$offset=-1,$inputarr=false,$secs=0)
	{
		if($offset < 1) $offset = 0;
		
		// jason judge, see http://phplens.com/lens/lensforum/msgs.php?id=9220
		if ($nrows < 0) $nrows = '18446744073709551615';
		
		$sql = str_replace("SELECT ", sprintf("SELECT SKIP %s FIRST %s ", $offset, $nrows), $sql);
		
		if ($secs)
        
        	$rs = $this->CacheExecute($secs, $sql, $inputarr);
		else
			$rs = $this->Execute($sql, $inputarr);
		return $rs;
	}
}
/** !Eos
* Auxiliar function to Parse coltype,collength. Used by Metacolumns
* return: array ($mtype,$length,$precision,$nullable) (similar to ifx_fieldpropierties)
*/
function ifx_props($coltype,$collength){
	$itype=fmod($coltype+1,256);
	$nullable=floor(($coltype+1) /256) ?"N":"Y";
	$mtype=substr(" CIIFFNNDN TBXCC     ",$itype,1);
	switch ($itype){
		case 2:
			$length=4;
		case 6:
		case 9:
		case 14:
			$length=floor($collength/256);
			$precision=fmod($collength,256);
			break;
		default:
			$precision=0;
			$length=$collength;
	}
	return array($mtype,$length,$precision,$nullable);
}
?>