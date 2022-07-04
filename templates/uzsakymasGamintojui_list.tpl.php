<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Užsakymai gamintojams</li>
</ul>

<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Užsakymas gamintojams nebuvo pašalintas.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Data</th>
		<th>Kaina</th>
        <th>Terminas</th>
        <th>Užsakovas</th>
        <th>Pervežėjas</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Uzsakymas_gamintojui']}</td>"
					. "<td>{$val['Data']}</td>"
					. "<td>{$val['Kaina']}</td>"
                    . "<td>{$val['Terminas']}</td>"
                    . "<td>{$val['Uzsakovas']}</td>"
                    . "<td>{$val['Imone']}</td>"
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