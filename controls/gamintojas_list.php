<?php

// sukuriame modelių klasės objektą
include 'libraries/gamintojai.class.php';
$gamintojaiObject = new gamintojai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $gamintojaiObject->getGamintojasListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $gamintojaiObject->getGamintojasList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/gamintojas_list.tpl.php';
	
?>