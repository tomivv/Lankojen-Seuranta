<?php
	header('Content-Type: application/json');

	$File = "json/data.json";
	
	$json = file_get_contents($File);
	
	$data = json_decode($json, true);

	$tarkistus = true;

	if ( isset( $_POST ) ) {

		if ($formdata['Vari'][strlen($formdata['Vari']) - 1] == " " || $formdata['Lanka'][strlen($formdata['Lanka']) - 1] == " ") {
			header("Location: save.php?err");
			exit();
		}

		$formdata = array(
	      		'Lanka'=> $_POST['lanka'],
	     		'Vari'=> $_POST['vari'],
	     		'Varikoodi'=> (int)$_POST['vkoodi'],
	     		'Paino'=> (int)$_POST['paino']
		);

		foreach ($data as $key => $value) {
			for ($i=0; $i < count($value) ; $i++) { 
				if ($_REQUEST['vkoodi'] == $value[$i]['Varikoodi'] && $_REQUEST['lanka'] == $value[$i]['Lanka']) {
					$data[$key][$i]['Paino'] += $_REQUEST['paino'];
					print_r($data[$key][$i]['Paino']);
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