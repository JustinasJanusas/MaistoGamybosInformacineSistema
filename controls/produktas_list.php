<?php

// sukuriame modelių klasės objektą
include 'libraries/produktai.class.php';
$produktaiObj = new produktai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $produktaiObj->getProduktasListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $produktaiObj->getProduktasList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/produktas_list.tpl.php';
	
?>