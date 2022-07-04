<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Užsakovas</li>
</ul>

<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Užsakovas nebuvo pašalintas.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
		<th>Imonės kodas</th>
		<th>Miestas</th>
		<th>Adresas</th>
        <th>Vadovo vardas</th>
        <th>Vadovo pavarde</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Uzsakovas']}</td>"
					. "<td>{$val['Pavadinimas']}</td>"
					. "<td>{$val['Imones_kodas']}</td>"
					. "<td>{$val['Miestas']}</td>"
                    . "<td>{$val['Adresas']}</td>"
                    . "<td>{$val['Vadovo_vardas']}</td>"
                    . "<td>{$val['Vadovo_pavarde']}</td>"
					. "<td>"
						
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>