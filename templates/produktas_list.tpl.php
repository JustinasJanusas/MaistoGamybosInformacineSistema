<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Produktai</li>
</ul>

<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Produktas nebuvo pašalintas.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
		<th>Svoris</th>
        <th>Gamintojas</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Produktas']}</td>"
					. "<td>{$val['Pavadinimas']}</td>"
					. "<td>{$val['Svoris']}</td>"
                    . "<td>{$val['Gamintojas']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Produktas']}\"); return false;' title=''>šalinti</a>&nbsp;"

					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>