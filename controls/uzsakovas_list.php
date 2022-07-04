<?php

// sukuriame modelių klasės objektą
include 'libraries/uzsakovai.class.php';
$uzsakovaiObject = new uzsakovai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $uzsakovaiObject->getUzsakovasListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $uzsakovaiObject->getUzsakovasList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/uzsakovas_list.tpl.php';
	
?>