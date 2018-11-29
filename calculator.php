<?php

class Calculator{

	public function sum($num) {

		if(count($num)  > 0)
			return array_sum($num);
		else
			return 0;
	}

	public function format($raw,$delimeter = ","){

		$raw = str_replace(array("\n","n"), "," ,$raw);
		$data = explode($delimeter,$raw);
		return $data;
	}
	public function getDelimeter($str){

		$delimeter = explode('\\',$str);
		return $delimeter[2];
	}
	public function checkNegativeNumber($num){

		$filtered = array_filter($num, "is_numeric");
		$filtered = array_values($filtered);
		
		$arr = array();
		foreach($filtered as $row){
			if( $row < 0 )
				$arr[] = $row;
		}

		return $arr;
	}
}

$obj = new Calculator;

$raw_arr = [];

if (strpos($argv[2], "\\") !== FALSE) {

    $raw_arr = $obj->format( $argv[2], $obj->getDelimeter($argv[2]) );
} else{

	$raw_arr = $obj->format($argv[2]);
}

if( count( $obj->checkNegativeNumber($raw_arr) ) > 0 ){
	echo "Negative numbers not allowed.";
	exit;
}

switch( $argv[1] ){

	case "sum":
		echo trim($obj->sum($raw_arr));

	break;

	case "add":
		echo trim($obj->sum($raw_arr));

	break;

}

?>