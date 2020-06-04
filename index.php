<?php
include_once "assets/head.php";

$value = isset($_GET['json']) ? 'true' : 'false';
//echo $value;
//$output = array();
$array_final = array();
$array_output = array();

//strip function
function strip($string){
	$string = trim($string);
	$string = substr_replace($string ,"", -1);
	$string = strtolower($string);
	$string = preg_replace('/[^a-zA-Z0-9\s\:,-.@]/', '', $string);
	return $string;
}

if($value){
	$directory = dirname(__FILE__);
	$path = $directory . '\scripts\*.*';
	$glob = glob($path);
	$count = count($glob);
	foreach($glob as $key => $file){
		$name = pathinfo($file)['basename'];
		$extension = pathinfo($file)['extension'];
		$output = array();
		switch ($extension) {
			case 'js':
				$keyword = 'node';
				break;

			case 'py':
				$keyword = 'python';
				break;

			case 'php':
				$keyword = 'php';
				break;
			
			default:
				# code...
				break;
		}
		exec("$keyword $file", $output);
		tome($output, $name);
	}
}

function tome($output, $name){

	$exploaded = array();
	$hold = array();
	
	for($i = 1; $i < count($output) - 1; $i++){
		$exploaded[$i] = strip($output[$i]);
	}
	for($i = 1; $i <= count($exploaded); $i++){
		$value = explode(':', $exploaded[$i]);
		array_push($hold, ["$value[0]" => trim($value[1])]);
	}

	array_push($GLOBALS['array_output'], $hold);
	execute($GLOBALS['array_output'], $name);
	$output = [];
}

function execute($arr, $name){
	$array_hold = array();

	$fullRegex = "/hello\sworld,\sthis\sis\s(.*)\swith\sHNGi7\sID\s(.*)\susing(.*)\sfor\sstage\s2\stask/";

	for($i = 0; $i < count($arr); $i++){
		if(preg_match($fullRegex, $arr[$i][0]['output'], $matches)){
			$status = 'Pass';
		}else{
			$status = 'Fail'; 
		}
		$array_hold = [
			'file' => $name,
			'output' => $arr[$i][0]['output'] ? $arr[$i][0]['output'] : 'Incorrect format',
			'id' => $arr[$i][1]['id'] ? $arr[$i][1]['id'] : 'Incorrect format',
			'name' => $arr[$i][2]['name'] ? $arr[$i][2]['name'] : 'Incorrect format',
			'email' => $arr[$i][3]['email'] ? $arr[$i][3]['email'] : 'Incorrect format',
			'language' => $arr[$i][4]['language'] ? $arr[$i][0]['language'] : 'Incorrect format',
			'status' => $status
		];
	}
	array_push($GLOBALS['array_final'], $array_hold);
}

include_once "assets/body.php";

include_once "assets/footer.php";

