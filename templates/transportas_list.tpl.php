<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Pervežėjai</li>
</ul>

<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Pervežėjas nebuvo pašalintas.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Imones pavadinimas</th>
        <th>Vairuotojo vardas</th>
        <th>Vairuotojo pavarde</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Reisas']}</td>"
					. "<td>{$val['Transportuojanti_imone']}</td>"
                    . "<td>{$val['Vairuotojo_vardas']}</td>"
                    . "<td>{$val['Vairuotojo_pavarde']}</td>"
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