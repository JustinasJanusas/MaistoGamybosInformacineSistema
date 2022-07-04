<?php
	
include 'libraries/darbuotojai.class.php';
$darbuotojaiObj = new darbuotojai();

include 'libraries/gamintojai.class.php';
$gamintojaiObj = new gamintojai();
$formErrors = null;
$data = array();

// nustatome privalomus formos laukus
$required = array('Vardas', 'Pavarde', 'Asmens_kodas', 'Gimimo_data', 'Alga', 'Pareigos',
					'Idarbinimo_data', 'fk_Gamintojasid_Gamintojas');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'Vardas' => 20,
	'Pavarde' => 20,
	'Asmens_kodas' => 11,
	'Alga' => 9,
	'Pareigos' => 20
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	include 'utils/validator.class.php';

	// nustatome laukų validatorių tipus
	$validations = array (
		'Vardas' => 'alfanum',
		'Pavarde' => 'alfanum',
		'Asmens_kodas' => 'positivenumber',
		'Gimimo_data' => 'date',
		'Alga' => 'price',
		'Pareigos' => 'alfanum',
		'Idarbinimo_data' => 'date',
		'fk_Gamintojasid_Gamintojas' => 'positivenumber');

	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// įrašome naują klientą
		$darbuotojaiObj->insertDarbuotojas($dataPrepared);

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
include 'templates/darbuotojas_form.tpl.php';

?>