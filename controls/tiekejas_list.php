<?php

// sukuriame modelių klasės objektą
include 'libraries/tiekejai.class.php';
$tiekejaiObject = new tiekejai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $tiekejaiObject->getTiekejasListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $tiekejaiObject->getTiekejasList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/tiekejas_list.tpl.php';
	
?>