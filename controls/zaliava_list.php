<?php

// sukuriame modelių klasės objektą
include 'libraries/zaliavos.class.php';
$zaliavosObject = new zaliavos();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $zaliavosObject->getZaliavaListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $zaliavosObject->getZaliavaList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/zaliava_list.tpl.php';
	
?>