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
}

$obj = new Calculator;

$raw_arr = [];

if (strpos($argv[2], "\\") !== FALSE) {

    $raw_arr = $obj->format( $argv[2], $obj->getDelimeter($argv[2]) );
} else{

	$raw_arr = $obj->format($argv[2]);
}

switch( $argv[1] ){

	case "sum":
		//$num_arr = $obj->format( $argv[2] );
		echo trim($obj->sum($raw_arr));

	break;

	case "add":
		//$num_arr = $obj->format( $argv[2] );
		echo trim($obj->sum($raw_arr));

	break;

}

?>