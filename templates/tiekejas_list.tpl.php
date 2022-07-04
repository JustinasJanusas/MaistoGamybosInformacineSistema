<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Tiekėjai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas tiekėjas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Tiekėjas nebuvo pašalintas, nes yra įtrauktas į užsakymą(-us).
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
					. "<td>{$val['id_Tiekejas']}</td>"
					. "<td>{$val['Pavadinimas']}</td>"
					. "<td>{$val['Imones_kodas']}</td>"
					. "<td>{$val['Miestas']}</td>"
                    . "<td>{$val['Adresas']}</td>"
                    . "<td>{$val['Vadovo_vardas']}</td>"
                    . "<td>{$val['Vadovo_pavarde']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Tiekejas']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_Tiekejas']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>