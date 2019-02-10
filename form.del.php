<?php
	header('Content-Type: application/json');

	$File = "json/data.json";
	
	$json = file_get_contents($File);
	
	$data = json_decode($json, true);

	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	if ( $_SERVER["REQUEST_METHOD"] == "POST") {
		$formdata = array(
			'Lanka'=> test_input($_POST['lanka']),
			'Vari'=> test_input($_POST['vari']),
			'Varikoodi'=> (int)test_input($_POST['vkoodi']),
			'Paino'=> (int)test_input($_POST['paino'])
	  	);

	  	foreach ($formdata as $key => $value) {
	   		if ($value == "") {
	   			header("Location: poista.php?empty");
				exit();
			}
		}

		if ($_POST['kokopoisto']) {
			foreach ($data as $key => $value) {
				for ($i=0; $i < count($value); $i++) {
					if ($_REQUEST['vkoodi'] == $value[$i]['Varikoodi'] && $_REQUEST['lanka'] == $value[$i]['Lanka']) {
						print_r($data[$key][$i]);
						unset($data[$key][$i]);
					}
				}
			}
		}else{
			foreach ($data as $key => $value) {
				for ($i=0; $i < count($value) ; $i++) {
					if ($_REQUEST['vkoodi'] == $value[$i]['Varikoodi'] && $_REQUEST['lanka'] == $value[$i]['Lanka']) {
						$data[$key][$i]['Paino'] -= $_REQUEST['paino'];
					}
				}
			}
		}

		$jsondata = json_encode($data, JSON_PRETTY_PRINT);

		file_put_contents($File, $jsondata);
		
	}

	header("Location: poista.php?done");
	exit();
?>