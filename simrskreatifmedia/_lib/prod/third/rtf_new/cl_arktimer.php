<?php
class ArkTimer {
	var $start;

	function __construct() {
		$this->start = $this->GetMicrotime();
	}

	function GetMicrotime() {
		$arr_tmp_list_change = explode(" ",microtime()); 
		list($usec, $sec) = $arr_tmp_list_change; 
		return ((float)$usec + (float)$sec); 
	}

	function GetTime() {
		return round($this->GetMicrotime() - $this->start,6);
	}

	function EchoTime() {
		echo "<hr size=1>Did in ";
		echo round($this->GetMicrotime() - $this->start,6);
		echo " seconds";
	}

	function ReturnTime() {
		$fin =  round($this->GetMicrotime() - $this->start,6);
		return $fin;
	}


}

?>