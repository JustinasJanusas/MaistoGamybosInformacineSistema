<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Užsakymai tiekėjams</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas užsakymas tiekėjams</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Užsakymas tiekėjams nebuvo pašalintas.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Data</th>
		<th>Kaina</th>
        <th>Terminas</th>
        <th>Tiekėjas</th>
		<th>Užsakovas</th>
        <th>Pervežėjas</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Uzsakymas_tiekejui']}</td>"
					. "<td>{$val['Data']}</td>"
					. "<td>{$val['Kaina']}</td>"
                    . "<td>{$val['Terminas']}</td>"
                    . "<td>{$val['Tiekejas']}</td>"
                    . "<td>{$val['Gamintojas']}</td>"
					. "<td>{$val['Imone']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Uzsakymas_tiekejui']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_Uzsakymas_tiekejui']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>