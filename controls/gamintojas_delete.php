<?php

include 'libraries/gamintojai.class.php';
$gamintojaiObj = new gamintojai();

if(!empty($id)) {
	// patikriname, ar darbuotojas neturi sudarytų sutarčių
	$count = $gamintojaiObj->getRelatedCountOfGamintojas($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname darbuotoją
		$gamintojaiObj->deleteGamintojas($id);
	} else {
		// nepašalinome, nes darbuotojas sudaręs bent vieną sutartį, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į darbuotojų puslapį
	common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>