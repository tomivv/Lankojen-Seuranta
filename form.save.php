<?php
	header('Content-Type: application/json');

	$File = "json/data.json";
	
	$json = file_get_contents($File);
	
	$data = json_decode($json, true);

	$tarkistus = true;

	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

		$formdata = array(
	      		'Lanka'=> test_input($_POST['lanka']),
	     		'Vari'=> test_input($_POST['vari']),
	     		'Varikoodi'=> (int)test_input($_POST['vkoodi']),
	     		'Paino'=> (int)test_input($_POST['paino'])
		);

		//print_r( substr ($formdata['Vari'], 0, 1 ));

		if ( substr ($formdata['Vari'], strlen($formdata['Vari']) - 1, 1 ) == " " || substr ($formdata['Lanka'], strlen($formdata['Lanka']) - 1, 1 ) == " ") {
			header("Location: save.php?err");
			exit();
		}elseif ( substr ($formdata['Vari'], 0, 1 ) == " " || substr ($formdata['Lanka'], 0, 1 ) == " " ) {
			header("Location: save.php?err");
			exit();
		}

		foreach ($formdata as $key => $value) {
			if ($value == "") {
				header("Location: save.php?empty");
				exit();
			}
		}

		foreach ($data as $key => $value) {
			for ($i=0; $i < count($value) ; $i++) { 
				if ($_REQUEST['vkoodi'] == $value[$i]['Varikoodi'] && $_REQUEST['lanka'] == $value[$i]['Lanka']) {
					$data[$key][$i]['Paino'] += $_REQUEST['paino'];
					//print_r($data[$key][$i]['Paino']);
					$tarkistus = false;
				}
			}
			if ($tarkistus) {
				array_push($data[$key], $formdata);
			}
		}

		$jsondata = json_encode($data, JSON_PRETTY_PRINT);

		file_put_contents($File, $jsondata);
	}

	header("Location: save.php?done");
	exit();
?>