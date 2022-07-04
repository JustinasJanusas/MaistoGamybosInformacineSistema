<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Gamintojai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=report'>Ataskaita</a>
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas gamintojas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Gamintojas nebuvo pašalintas, nes turi susijusių darbuotojų/produktų/užsakymų tiekėjui.
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
					. "<td>{$val['id_Gamintojas']}</td>"
					. "<td>{$val['Pavadinimas']}</td>"
					. "<td>{$val['Imones_kodas']}</td>"
					. "<td>{$val['Miestas']}</td>"
                    . "<td>{$val['Adresas']}</td>"
                    . "<td>{$val['Vadovo_vardas']}</td>"
                    . "<td>{$val['Vadovo_pavarde']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Gamintojas']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_Gamintojas']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>