<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Žaliavos</li>
</ul>

<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		žaliava nebuvo pašalintas.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Zaliavos']}</td>"
					. "<td>{$val['Pavadinimas']}</td>"
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