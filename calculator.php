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
	public function arrayFilter($arr){

		$new = [];
		foreach($arr as $ar){

			if($ar <= 1000)
			$new[] = $ar;
		}

		return $new;
	}

	public function multiply($arr){

		return array_product($arr);
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
	echo "Negative numbers (". implode(',', $obj->checkNegativeNumber($raw_arr) ) .") not allowed.";
	exit;
}

switch( $argv[1] ){

	case "sum":
		echo trim($obj->sum($raw_arr));

	break;

	case "add":
		$raw_arr = $obj->arrayFilter( $raw_arr  );
		echo trim( $obj->sum( $raw_arr ) );

	break;

	case "multiply":
		echo trim($obj->multiply($raw_arr));

	break;

}

?>