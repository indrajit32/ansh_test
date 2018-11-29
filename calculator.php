<?php

class Calculator{

	public function sum($num) {

		if(count($num)  > 0)
			return array_sum($num);
		else
			return 0;
	}

	public function format($raw,$delimeter = ","){

		$data = explode($delimeter,$raw);
		return $data;
	} 
}

$obj = new Calculator;

switch( $argv[1] ){

	case "sum":
		$num_arr = $obj->format( $argv[2] );
		echo trim($obj->sum($num_arr));

	break;

	case "add":
		$num_arr = $obj->format( $argv[2] );
		echo trim($obj->sum($num_arr));

	break;

}

?>