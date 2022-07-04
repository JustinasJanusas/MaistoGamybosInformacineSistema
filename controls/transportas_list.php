<?php

// sukuriame modelių klasės objektą
include 'libraries/transportas.class.php';
$transportasObject = new transportas();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $transportasObject->getTransportasListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $transportasObject->getTransportasList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/transportas_list.tpl.php';
	
?>