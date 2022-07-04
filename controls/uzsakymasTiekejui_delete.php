<?php

include 'libraries/uzsakymaiTiekejui.class.php';
$uzsakymaiTiekejuiObj = new uzsakymaiTiekejui();

include 'libraries/uzsakoZaliavas.class.php';
	$uzsakoZaliavasObj = new uzsakoZaliavas();

if(!empty($id)) {

	$uzsakoZaliavasObj->deleteUzsakymas($id);
	$uzsakymaiTiekejuiObj->deleteUzsakymasTiekejui($id);


	// nukreipiame į darbuotojų puslapį
	common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>