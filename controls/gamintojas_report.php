<?php

include 'libraries/gamintojai.class.php';
$gamintojaiObj = new gamintojai();

$formErrors = null;
$fields = array();

$data = array();
if(empty($_POST['submit'])) {
	// rodome ataskaitos parametrų įvedimo formą
	include 'templates/gamintojas_report_form.tpl.php';
} else {
	// nustatome laukų validatorių tipus
	$validations = array (
		'fk_Gamintojasid_Gamintojas' => 'positivenumber',
		'dataNuo' => 'date',
		'dataIki' => 'date'
	);

	// sukuriame validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations);

	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$data = $validator->preparePostFieldsForSQL();
		
		// išrenkame ataskaitos duomenis
		$gamintojaiData = $gamintojaiObj->getGamintojasUzsakymai($data['fk_Gamintojasid_Gamintojas'], $data['dataNuo'], $data['dataIki']);
		if(!empty($data['fk_Gamintojasid_Gamintojas'])){
			$data['gamintojas'] = $gamintojaiObj->getGamintojas($data['fk_Gamintojasid_Gamintojas']);}
		$totalWeight = $gamintojaiObj->getSumWeight($data['fk_Gamintojasid_Gamintojas'], $data['dataNuo'], $data['dataIki']);
		$totalPrice = $gamintojaiObj->getSumPrice($data['fk_Gamintojasid_Gamintojas'], $data['dataNuo'], $data['dataIki']);
		// rodome ataskaitą
		include 'templates/gamintojas_report_show.tpl.php';
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();
		// gauname įvestus laukus
		$fields = $_POST;

		// rodome ataskaitos parametrų įvedimo formą su klaidomis
		include 'templates/gamintojas_report_form.tpl.php';
	}
}