<?php

// sukuriame modelių klasės objektą
include 'libraries/darbuotojai.class.php';
$darbuotojaiObj = new darbuotojai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $darbuotojaiObj->getDarbuotojasListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $darbuotojaiObj->getDarbuotojasList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/darbuotojas_list.tpl.php';
	
?>