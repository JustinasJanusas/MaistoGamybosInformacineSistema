<?php

// sukuriame modelių klasės objektą
include 'libraries/uzsakymaiGamintojui.class.php';
$uzsakymaiGamintojuiObj = new uzsakymaiGamintojui();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $uzsakymaiGamintojuiObj->getUzsakymasGamintojuiListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $uzsakymaiGamintojuiObj->getUzsakymasGamintojuiList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/uzsakymasGamintojui_list.tpl.php';
	
?>