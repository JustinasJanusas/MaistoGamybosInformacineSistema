<?php

include 'libraries/tiekejai.class.php';
$tiekejaiObj = new tiekejai();

if(!empty($id)) {
	// patikriname, ar darbuotojas neturi sudarytų sutarčių
	$count = $tiekejaiObj->getUzsakymasTiekejuiCountOfTiekejas($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname darbuotoją
		$tiekejaiObj->deleteTiekejas($id);
	} else {
		// nepašalinome, nes darbuotojas sudaręs bent vieną sutartį, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į darbuotojų puslapį
	common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>