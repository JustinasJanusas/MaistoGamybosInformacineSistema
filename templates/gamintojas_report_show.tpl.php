<ul id="reportInfo">
	<li class="title">Gamintojo sutarčių ataskaita</li>
	<li>Sudarymo data: <span><?php echo date("Y-m-d"); ?></span></li>
	<li>Sutarčių sudarymo laikotarpis:
		<span>
		<?php
			if(!empty($data['dataNuo'])) {
				if(!empty($data['dataIki'])) {
					echo "nuo {$data['dataNuo']} iki {$data['dataIki']}";
				} else {
					echo "nuo {$data['dataNuo']}";
				}
			} else {
				if(!empty($data['dataIki'])) {
					echo "iki {$data['dataIki']}";
				} else {
					echo "nenurodyta";
				}
			}
		?>
		</span>
	</li>
	<li>Gamintojas: 
		<span>
		<?php
			if(!empty($data['fk_Gamintojasid_Gamintojas']))
				echo " {$data['gamintojas']['Pavadinimas']}";
			else 
				echo "nenurodyta"
		?>
		</span>
	</li>
</ul>



<?php
	if(sizeof($gamintojaiData) > 0) { ?>
		<table class="reportTable">
			<tr>
				<th >Sutartis</th>
				<th >Data</th>
				<th >Tiekėjas</th>
				<th class="width150">Sudarytų sutarčių vertė</th>
				<th class="width150">Skirtingų žaliavų sk.</th>
				<th class="width150">Bendras svoris</th>
			</tr>

			<?php
				// suformuojame lentelę
				for($i = 0; $i < sizeof($gamintojaiData); $i++) {
					
					if($i == 0 || $gamintojaiData[$i]['id_Gamintojas'] != $gamintojaiData[$i-1]['id_Gamintojas']) {
						echo
							  "<tr>"
								. "<td class='groupSeparator' colspan='6'>{$gamintojaiData[$i]['Pavadinimas']}, {$gamintojaiData[$i]['Miestas']}, darbuotojų skaičius: {$gamintojaiData[$i]['darbuotoju_skaicius']}</td>"
							. "</tr>";
						if($gamintojaiData[$i]['vardas'] != '' && $gamintojaiData[$i]['pavarde']){
							echo
								"<tr>"
									. "<td class='groupSeparator' colspan='6'>Vadovas: {$gamintojaiData[$i]['vardas']} {$gamintojaiData[$i]['pavarde']}</td>"
								. "</tr>";}
					}
					
					

					
					if(isset($gamintojaiData[$i]['id_Uzsakymas_tiekejui']))
					echo
						"<tr>"
							. "<td>#{$gamintojaiData[$i]['id_Uzsakymas_tiekejui']}</td>"
							. "<td>{$gamintojaiData[$i]['Data']}</td>"
							. "<td>{$gamintojaiData[$i]['tiekejas']}</td>"
							. "<td>{$gamintojaiData[$i]['kaina']} &euro;</td>"
							. "<td>{$gamintojaiData[$i]['zaliavu_sk']}</td>"
							. "<td>{$gamintojaiData[$i]['bendras_svoris']} kg</td>"
						. "</tr>";
					if($i == (sizeof($gamintojaiData) - 1) || $gamintojaiData[$i]['id_Gamintojas'] != $gamintojaiData[$i+1]['id_Gamintojas']) {
						echo 
							"<tr class='aggregate'>"
								. "<td colspan='3'></td>"
								. "<td class='border'>{$gamintojaiData[$i]['bendra_kaina']} &euro;</td>"
								. "<td class='border'>{$gamintojaiData[$i]['zaliavu_sk_suma']}</td>"
								. "<td class='border'>{$gamintojaiData[$i]['bendras_svoris_suma']} kg</td>"
							. "</tr>";
					}
				}
			?>
			

		  	<tr>
				<td class='groupSeparator' colspan='6'>Bendra suma</td>
			</tr>
			
			<tr class="aggregate">
				<td class="label" style="text-align: right" colspan="3"></td>
				<td class="border"><?php echo $totalPrice[0]['bendra_kaina']; ?> &euro;</td>
				<td ></td>
				<td class="border"><?php echo $totalWeight[0]['bendras_svoris']; ?> kg</td>
			</tr>

		</table>
		<a href="index.php?module=gamintojas&action=report" title="Nauja ataskaita" style="margin-bottom: 15px" class="button large float-right">nauja ataskaita</a>
<?php   
	} else {
?>
		<div class="warningBox">
			Nurodytu laikotartpiu sutarčių sudaryta nebuvo.
		</div>
<?php
	}
?>