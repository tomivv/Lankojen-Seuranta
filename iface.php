<?php
	header('Content-Type: application/json');
	
	$json = file_get_contents('json/data.json');
	
	$data = json_decode($json, true);
	
	$new_data = array();

	if( isset($_GET['empty']) ){		
		foreach ($data as $key => $value) {		
			for ($i=0; $i < count($value); $i++) { 	
				array_push($new_data, $value[$i]);
			}
		}
	}elseif ( isset($_GET['param'])) {
		foreach ($data as $key => $value) {
			for($i=0; $i < count($value); $i++){
				if (strtolower($value[$i]['Vari']) == strtolower($_GET['param']) || strtolower($value[$i]['Varikoodi']) == strtolower($_GET['param']) || strtolower($value[$i]['Lanka']) == strtolower($_GET['param'])) {
					array_push($new_data, $value[$i]);
				}
			}
		}
	}
	$new_json = json_encode($new_data, JSON_PRETTY_PRINT);

	print_r($new_json);
?>