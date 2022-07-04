<?php

include 'libraries/produktai.class.php';
$produktaiObj = new produktai();

if(!empty($id)) {
	// patikriname, ar darbuotojas neturi sudarytų sutarčių
	$count = $produktaiObj->getUzsakymasCountOfProduktas($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname darbuotoją
		$produktaiObj->deleteProduktas($id);
	} else {
		// nepašalinome, nes darbuotojas sudaręs bent vieną sutartį, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į darbuotojų puslapį
	common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>