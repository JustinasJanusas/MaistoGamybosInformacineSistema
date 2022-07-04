<?php
	
include 'libraries/gamintojai.class.php';
$gamintojaiObj = new gamintojai();

include 'libraries/transportas.class.php';
$transportasObj = new transportas();

include 'libraries/uzsakymaiTiekejui.class.php';
$uzsakymaiTiekejuiObj = new uzsakymaiTiekejui();

include 'libraries/uzsakoZaliavas.class.php';
$uzsakoZaliavasObj = new uzsakoZaliavas();

include 'libraries/zaliavos.class.php';
$zaliavosObj = new zaliavos();

include 'libraries/Tiekejai.class.php';
$tiekejaiObj = new tiekejai();

$formErrors = null;
$data = array();

// nustatome privalomus formos laukus
$required = array('Data', 'Kaina', 'Terminas', 'fk_Reisasid_Reisas', 'fk_Tiekejasid_Tiekejas', 'fk_Gamintojasid_Gamintojas', 'Zaliavos', 'Svoriai');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'Kaina' => 9
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	include 'utils/validator.class.php';

	// nustatome laukų validatorių tipus
	$validations = array (
		'Data' => 'date',
		'Kaina' => 'price',
		'Terminas' => 'date',
		'fk_Reisasid_Reisas' => 'positivenumber',
		'fk_Tiekejasid_Tiekejas' => 'positivenumber',
		'fk_Gamintojasid_Gamintojas' => 'positivenumber',
		'Svoriai' => 'positivenumber',
		'Zaliavos' => 'positivenumber');

	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();
		// įrašome naują klientą
		
		$dataPrepared['id_Uzsakymas_tiekejui'] = $uzsakymaiTiekejuiObj->insertUzsakymasTiekejui($dataPrepared);
		$uzsakoZaliavasObj->deleteUzsakymas($dataPrepared['id_Uzsakymas_tiekejui']);
		$uzsakoZaliavasObj->insertUzsakymasList($dataPrepared);
		// nukreipiame vartotoją į klientų puslapį
		common::redirect("index.php?module={$module}&action=list");
		die();
	}
	else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();

		// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
		$data = $_POST;
		
		if(isset($_POST['Zaliavos']) && sizeof($_POST['Zaliavos']) > 0) {
			$i = 0;

			foreach($_POST['Zaliavos'] as $key => $val) {
				$data['uzsako2'][$i]['fk_Zaliavosid_Zaliavos'] = $val;
				$data['uzsako2'][$i]['Svoris'] = $_POST['Svoriai'][$key];
				$i++;

			}

		}
	}
}

// įtraukiame šabloną
include 'templates/uzsakymasTiekejui_form.tpl.php';

?>