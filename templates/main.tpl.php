<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="noindex">
		<title>Maisto gamybos IS</title>
		<link rel="stylesheet" type="text/css" href="scripts/datetimepicker/jquery.datetimepicker.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style/mainmain.css" media="screen" />
		<script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
	</head>
	<body>
		<div id="body">
			<div id="header">
				<h3 id="slogan"><a href="index.php">Maisto gamybos IS</a></h3>
			</div>
			<div id="content">
				<div id="topMenu">
					<ul class="float-left">
						<li><a href="index.php?module=darbuotojas&action=list" title="Darbuotojai"<?php if($module == 'darbuotojas') { echo 'class="active"'; } ?>>Darbuotojai</a></li>
						<li><a href="index.php?module=gamintojas&action=list" title="Gamintojai"<?php if($module == 'gamintojas') { echo 'class="active"'; } ?>>Gamintojai</a></li>
						<li><a href="index.php?module=produktas&action=list" title="Produktai"<?php if($module == 'produktas') { echo 'class="active"'; } ?>>Produktai</a></li>
						<li><a href="index.php?module=tiekejas&action=list" title="Tiekėjai"<?php if($module == 'tiekejas') { echo 'class="active"'; } ?>>Tiekėjai</a></li>
						<li><a href="index.php?module=uzsakovas&action=list" title="Užsakovai"<?php if($module == 'uzsakovas') { echo 'class="active"'; } ?>>Užsakovai</a></li>
						<li><a href="index.php?module=zaliava&action=list" title="Žaliavos"<?php if($module == 'zaliava') { echo 'class="active"'; } ?>>Žaliavos</a></li>
						<li><a href="index.php?module=transportas&action=list" title="Pervežėjai"<?php if($module == 'transportas') { echo 'class="active"'; } ?>>Pervežėjai</a></li>
						<li><a href="index.php?module=uzsakymasGamintojui&action=list" title="Užsakymai gamintojams"<?php if($module == 'uzsakymasGamintojui') { echo 'class="active"'; } ?>>Užsakymai gamintojams</a></li>
						<li><a href="index.php?module=uzsakymasTiekejui&action=list" title="Užsakymai tiekėjams"<?php if($module == 'uzsakymasTiekejui') { echo 'class="active"'; } ?>>Užsakymai tiekėjams</a></li>
					</ul>
				</div>
				<div id="contentMain">
					<?php
						// įtraukiame veiksmų failą
						if(file_exists($actionFile)) {
							include $actionFile;
						}
					?>
					<div class="float-clear"></div>
				</div>
			</div>
			<div id="footer">

			</div>
		</div>
	</body>
</html>