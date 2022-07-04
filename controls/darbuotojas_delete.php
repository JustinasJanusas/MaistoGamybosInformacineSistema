<?php

include 'libraries/darbuotojai.class.php';
$darbuotojaiObj = new darbuotojai();

if(!empty($id)) {


	$darbuotojaiObj->deleteDarbuotojas($id);


	// nukreipiame į darbuotojų puslapį
	common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>