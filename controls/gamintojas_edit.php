<?php
	
include 'libraries/gamintojai.class.php';
$gamintojaiObj = new gamintojai();

include	'libraries/produktai.class.php';
$produktaiObj = new produktai();

$formErrors = null;
$data = array();

// nustatome privalomus formos laukus
$required = array('Pavadinimas', 'Imones_kodas', 'Miestas', 'Adresas', 'Pavadinimai', 'Svoriai');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'Pavadinimas' => 20,
	'Imones_kodas' => 9,
	'Miestas' => 20,
	'Adresas' => 30,
	'Vadovo_vardas' => 20,
	'Vadovo_pavarde' => 20
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	include 'utils/validator.class.php';

	// nustatome laukų validatorių tipus
	$validations = array (
		'Pavadinimas' => 'alfanum',
		'Imones_kodas' => 'positivenumber',
		'Miestas' => 'alfanum',
		'Adresas' => 'alfanum',
		'Vadovo_vardas' => 'alfanum',
		'Vadovo_pavarde' => 'alfanum',
		'Svoriai' => 'positivenumber',
		'Pavadinimai' => 'anything',
		);

	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();
		// redaguojame klientą

		$gamintojaiObj->updateGamintojas($dataPrepared);
		$gamintojaiObj->deleteProduktas($dataPrepared['id_Gamintojas']);
		$gamintojaiObj->insertProduktas($dataPrepared);
		// nukreipiame vartotoją į klientų puslapį
		common::redirect("index.php?module={$module}&action=list");
		die();
	}
	else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();

		// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
		$data = $_POST;
		
		if(isset($_POST['Pavadinimai']) && sizeof($_POST['Pavadinimai']) > 0) {
			$i = 0;
			foreach($_POST['Pavadinimai'] as $key => $val) {
				$data['produktas'][$i]['Pavadinimas'] = $val;
				$data['produktas'][$i]['Svoris'] = $_POST['Svoriai'][$key];
				$data['produktas'][$i]['neaktyvus'] = $_POST['neaktyvus'][$key];
				$i++;

			}
		}
	}
} else {
	if(!empty($id)) {
		$data = $gamintojaiObj->getGamintojas($id);
		$tmp = $gamintojaiObj->getProduktas($id);
		if(sizeof($tmp) > 0) {
			foreach($tmp as $key => $val) {
				// jeigu paslaugos kaina yra naudojama, jos koreguoti neleidziame ir įvedimo laukelį padarome neaktyvų
				$uzsakymasCount = $produktaiObj->getProduktasCountInUzsakymas($val['id_Produktas']);
				if($uzsakymasCount > 0) {
					$val['neaktyvus'] = 1;
				}
				$data['produktas'][] = $val;
			}
		}
	}
}

$data['editing'] = 1;

// įtraukiame šabloną
include 'templates/gamintojas_form.tpl.php';

?>