<?php

class ADODB_pdo_firebird extends ADODB_pdo {
	var $metaTablesSQL = "select rdb\$relation_name from rdb\$relations where rdb\$relation_name not like 'RDB\$%'";
	var $metaColumnsSQL = "select a.rdb\$field_name, a.rdb\$null_flag, a.rdb\$default_source, b.rdb\$field_length, b.rdb\$field_scale, b.rdb\$field_sub_type, b.rdb\$field_precision, b.rdb\$field_type from rdb\$relation_fields a, rdb\$fields b where a.rdb\$field_source = b.rdb\$field_name and a.rdb\$relation_name = '%s' order by a.rdb\$field_position asc";
	var $sysDate = "cast('TODAY' as timestamp)";
	var $sysTimeStamp = "CURRENT_TIMESTAMP"; //"cast('NOW' as timestamp)";
	var $hasGenID = true;
	var $_dropSeqSQL = "drop table %s";

	var $dialect = 3;
	
	var $nameQuote = '`';

	function _init($parentDriver)
	{
	
		$parentDriver->hasTransactions = true;
		$parentDriver->transOff = false;
		#$parentDriver->_bindInputArray = false;
		$parentDriver->hasInsertID = true;
		$parentDriver->_connectionID->setAttribute(PDO::FB_ATTR_TIMESTAMP_FORMAT, '%Y-%m-%d %H:%M:%S');
	}
	
	// dayFraction is a day in floating point
	function OffsetDate($dayFraction,$date=false)
	{		
		if (!$date) $date = $this->sysDate;
		
		$fraction = $dayFraction * 24 * 3600;
		return $date . ' + INTERVAL ' .	 $fraction.' SECOND';
	}

	function GenID($seqname='adodbseq',$startID=1)
	{
		$getnext = ("SELECT Gen_ID($seqname,1) FROM RDB\$DATABASE");
		$rs = @$this->Execute($getnext);
		if (!$rs) {
			$this->Execute(("INSERT INTO RDB\$GENERATORS (RDB\$GENERATOR_NAME) VALUES (UPPER('$seqname'))" ));
			$this->Execute("SET GENERATOR $seqname TO ".($startID-1).';');
			$rs = $this->Execute($getnext);
		}
		if ($rs && !$rs->EOF) $this->genID = (integer) reset($rs->fields);
		else $this->genID = 0; // false
		
		if ($rs) $rs->Close();
		
		return $this->genID;
	}

	function ServerInfo()
	{
		$arr['description'] = ADOConnection::GetOne("SELECT rdb\$get_context('SYSTEM', 'ENGINE_VERSION') from rdb\$database;");
		$arr['version'] = ADOConnection::_findvers($arr['description']);
		return $arr;
	}
	
	function MetaTables($ttype=false,$showSchema=false,$mask=false) {
         $arr_tables = $this->GetCol($this->metaTablesSQL);
         foreach($arr_tables as $_key =>$_table)
         {
         	$arr_tables[ $_key ] = trim($_table);
         }
         return $arr_tables;
    }

	function MetaIndexes($table, $primary = FALSE, $owner=false)
	{
        // save old fetch mode
        global $ADODB_FETCH_MODE;
        $false = false;
        $save = $ADODB_FETCH_MODE;
        $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
        if ($this->fetchMode !== FALSE) {
               $savem = $this->SetFetchMode(FALSE);
        }
        $table = strtoupper($table);
        $sql = "SELECT * FROM RDB\$INDICES WHERE RDB\$RELATION_NAME = '".$table."'";
        if (!$primary) {
        	$sql .= " AND RDB\$INDEX_NAME NOT LIKE 'RDB\$%'";
        } else {
        	$sql .= " AND RDB\$INDEX_NAME NOT LIKE 'RDB\$FOREIGN%'";
        }
        // get index details
        $rs = $this->Execute($sql);
        if (!is_object($rs)) {
	        // restore fetchmode
	        if (isset($savem)) {
	            $this->SetFetchMode($savem);
	        }
	        $ADODB_FETCH_MODE = $save;
            return $false;
        }
        
        $indexes = array();
		while ($row = $rs->FetchRow()) {
			$index = trim($row[0]);
             if (!isset($indexes[$index])) {
             		if (is_null($row[3])) {$row[3] = 0;}
                     $indexes[$index] = array(
                             'unique' => (trim($row[3]) == 1),
                             'columns' => array()
                     );
             }
			$sql = "SELECT * FROM RDB\$INDEX_SEGMENTS WHERE RDB\$INDEX_NAME = '".$index."' ORDER BY RDB\$FIELD_POSITION ASC";
			$rs1 = $this->Execute($sql);
            while ($row1 = $rs1->FetchRow()) {
             	$indexes[$index]['columns'][ trim($row1[2]) ] = trim($row1[1]);
        	}
		}
        // restore fetchmode
        if (isset($savem)) {
            $this->SetFetchMode($savem);
        }
        $ADODB_FETCH_MODE = $save;
        
        return $indexes;
	}
	
 	function MetaColumns($table, $normalize=true) 
	{
		global $ADODB_FETCH_MODE;
		
		$save = $ADODB_FETCH_MODE;
		$ADODB_FETCH_MODE = ADODB_FETCH_NUM;

		if($normalize)
		{
			$table = strtoupper($table);
		}
	
		$rs = $this->Execute(sprintf($this->metaColumnsSQL, $table));
	
		$ADODB_FETCH_MODE = $save;
		$false = false;
		if ($rs === false) {
			return $false;
		}
		
		$retarr = array();
		//OPN STUFF start
		$dialect3 = ($this->dialect==3 ? true : false);
		//OPN STUFF end
		while (!$rs->EOF) { //print_r($rs->fields);
			$fld = new ADOFieldObject();
			$fld->name = trim($rs->fields[0]);
			//OPN STUFF start
			$this->_ConvertFieldType($fld, $rs->fields[7], $rs->fields[3], $rs->fields[4], $rs->fields[5], $rs->fields[6], $dialect3);
			if (isset($rs->fields[1]) && $rs->fields[1]) {
				$fld->not_null = true;
			}				
			if (isset($rs->fields[2])) {
				
				$fld->has_default = true;
				$d = substr($rs->fields[2],strlen('default '));
				switch ($fld->type)
				{
				case 'smallint':
				case 'integer': $fld->default_value = (int) $d; break;
				case 'char': 
				case 'blob':
				case 'text':
				case 'varchar': $fld->default_value = (string) substr($d,1,strlen($d)-2); break;
				case 'double':
				case 'float': $fld->default_value = (float) $d; break;
				default: $fld->default_value = $d; break;
				}
		//	case 35:$tt = 'TIMESTAMP'; break;
			}
			if ((isset($rs->fields[5])) && ($fld->type == 'blob')) {
				$fld->sub_type = $rs->fields[5];
			} else {
				$fld->sub_type = null;
			}
			//OPN STUFF end
			if ($ADODB_FETCH_MODE == ADODB_FETCH_NUM) $retarr[] = $fld;	
			else $retarr[strtoupper($fld->name)] = $fld;
			
			$rs->MoveNext();
		}
		$rs->Close();
		if ( empty($retarr)) return $false;
		else return $retarr;	
	}

	//OPN STUFF start
	function _ConvertFieldType(&$fld, $ftype, $flen, $fscale, $fsubtype, $fprecision, $dialect3)
	{
		$fscale = abs($fscale);
		$fld->max_length = $flen;
		$fld->scale = null;
		switch($ftype){
			case 7: 
			case 8:
				if ($dialect3) {
				    switch($fsubtype){
				    	case 0: 
				    		$fld->type = ($ftype == 7 ? 'smallint' : 'integer');
				    		break;
				    	case 1: 
				    		$fld->type = 'numeric';
							$fld->max_length = $fprecision;
							$fld->scale = $fscale;
				    		break;
				    	case 2:
				    		$fld->type = 'decimal';
							$fld->max_length = $fprecision;
							$fld->scale = $fscale;
				    		break;
				    } // switch
				} else {
					if ($fscale !=0) {
					    $fld->type = 'decimal';
						$fld->scale = $fscale;
						$fld->max_length = ($ftype == 7 ? 4 : 9);
					} else {
						$fld->type = ($ftype == 7 ? 'smallint' : 'integer');
					}
				}
				break;
			case 16: 
				if ($dialect3) {
				    switch($fsubtype){
				    	case 0: 
				    		$fld->type = 'decimal';
							$fld->max_length = 18;
							$fld->scale = 0;
				    		break;
				    	case 1: 
				    		$fld->type = 'numeric';
							$fld->max_length = $fprecision;
							$fld->scale = $fscale;
				    		break;
				    	case 2:
				    		$fld->type = 'decimal';
							$fld->max_length = $fprecision;
							$fld->scale = $fscale;
				    		break;
				    } // switch
				}
				break;
			case 10:
				$fld->type = 'float';
				break;
			case 14:
				$fld->type = 'char';
				break;
			case 27:
				if ($fscale !=0) {
				    $fld->type = 'decimal';
					$fld->max_length = 15;
					$fld->scale = 5;
				} else {
					$fld->type = 'double';
				}
				break;
			case 35:
				if ($dialect3) {
				    $fld->type = 'timestamp';
				} else {
					$fld->type = 'date';
				}
				break;
			case 12:
				$fld->type = 'date';
				break;
			case 13:
				$fld->type = 'time';
				break;
			case 37:
				$fld->type = 'varchar';
				break;
			case 40:
				$fld->type = 'cstring';
				break;
			case 261:
				$fld->type = 'blob';
				$fld->max_length = -1;
				break;
		} // switch
	}
	//OPN STUFF end
	
	// parameters use PostgreSQL convention, not firebird
	function SelectLimit($sql,$nrows=-1,$offset=-1,$inputarr=false, $secs=0)
	{
		$nrows = (integer) $nrows;
		$offset = (integer) $offset;
		$str = 'SELECT ';
		if ($nrows >= 0) $str .= "FIRST $nrows "; 
		$str .=($offset>=0) ? "SKIP $offset " : '';
		
		$sql = preg_replace('/^[ \t]*select/i',$str,$sql); 
		if ($secs)
			$rs = $this->CacheExecute($secs,$sql,$inputarr);
		else
			$rs = $this->Execute($sql,$inputarr);
			
		return $rs;
	}
}
?>