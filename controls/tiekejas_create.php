<?php
	
include 'libraries/tiekejai.class.php';
$tiekejaiObj = new tiekejai();

$formErrors = null;
$data = array();

// nustatome privalomus formos laukus
$required = array('Pavadinimas', 'Imones_kodas', 'Miestas', 'Adresas');

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
		'Vadovo_pavarde' => 'alfanum');

	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// įrašome naują klientą
		$tiekejaiObj->insertTiekejas($dataPrepared);

		// nukreipiame vartotoją į klientų puslapį
		common::redirect("index.php?module={$module}&action=list");
		die();
	}
	else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();

		// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
		$data = $_POST;
	}
}

// įtraukiame šabloną
include 'templates/tiekejas_form.tpl.php';

?>