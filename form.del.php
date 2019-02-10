<?php
	header('Content-Type: application/json');

	$File = "json/data.json";
	
	$json = file_get_contents($File);
	
	$data = json_decode($json, true);

	if ( isset( $_POST ) ) {

		$formdata = array(
	      'Lanka'=> $_POST['lanka'],
	      'Vari'=> $_POST['vari'],
	      'Varikoodi'=> (int)$_POST['vkoodi'],
	      'Paino'=> (int)$_POST['paino']
	   );

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

	header("Location: poista.php");
	exit();
?>