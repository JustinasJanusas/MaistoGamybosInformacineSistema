<?php

// sukuriame modelių klasės objektą
include 'libraries/uzsakymaiTiekejui.class.php';
$uzsakymaiTiekejuiObj = new uzsakymaiTiekejui();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $uzsakymaiTiekejuiObj->getUzsakymasTiekejuiListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $uzsakymaiTiekejuiObj->getUzsakymasTiekejuiList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/uzsakymasTiekejui_list.tpl.php';
	
?>