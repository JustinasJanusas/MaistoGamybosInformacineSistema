<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Užsakymai tiekėjui</a></li>
	<li><?php if(!empty($id)) echo "Užsakymo tiekėjui redagavimas"; else echo "Naujas užsakymas tiekėjui"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
	<?php if($formErrors != null) { ?>
		<div class="errorBox">
			Neįvesti arba neteisingai įvesti šie laukai:
			<?php 
				echo $formErrors;
			?>
		</div>
	<?php } ?>
	<form action="" method="post">
		<fieldset>
			<legend>Užsakymo tiekėjui informacija</legend>
			<p>
				<label class="field" for="Data">Sudarymo data<?php echo in_array('Data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Data" name="Data" class="textbox textbox-70 date" value="<?php echo isset($data['Data']) ? $data['Data'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="Kaina">Kaina<?php echo in_array('Kaina', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Kaina" name="Kaina" class="textbox textbox-150" value="<?php echo isset($data['Kaina']) ? $data['Kaina'] : ''; ?>" />
				<?php if(key_exists('Kaina', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Kaina']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="Terminas">Terminas<?php echo in_array('Terminas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Terminas" name="Terminas" class="textbox textbox-70 date" value="<?php echo isset($data['Terminas']) ? $data['Terminas'] : ''; ?>" />
			</p>
			<p>
			<label class="field" for="fk_Reisasid_Reisas">Transportas<?php echo in_array('fk_Reisasid_Reisas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_Reisasid_Reisas" name="fk_Reisasid_Reisas">
					<option value="">---------------</option>
					<?php
						// išrenkame klientus
						
						$transportas = $transportasObj->getTransportasList();
						foreach($transportas as $key => $val) {
							$selected = "";
							if(isset($data['fk_Reisasid_Reisas']) && $data['fk_Reisasid_Reisas'] == $val['id_Reisas']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_Reisas']}'>{$val['Transportuojanti_imone']}, {$val['Vairuotojo_vardas']} {$val['Vairuotojo_pavarde']}</option>";
						}
					?>
					</p>
				</select>
				<p>
				<label class="field" for="fk_Tiekejasid_Tiekejas">Tiekejas<?php echo in_array('fk_Tiekejasid_Tiekejas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_Tiekejasid_Tiekejas" name="fk_Tiekejasid_Tiekejas">
					<option value="">---------------</option>
					<?php
						// išrenkame klientus
						
						$tiekejai = $tiekejaiObj->getTiekejasList();
						foreach($tiekejai as $key => $val) {
							$selected = "";
							if(isset($data['fk_Tiekejasid_Tiekejas']) && $data['fk_Tiekejasid_Tiekejas'] == $val['id_Tiekejas']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_Tiekejas']}'>{$val['Pavadinimas']}</option>";
						}
					?>
				</select>
				</p>
				<p>
				<label class="field" for="fk_Gamintojasid_Gamintojas">Užsakovas<?php echo in_array('fk_Gamintojasid_Gamintojas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_Gamintojasid_Gamintojas" name="fk_Gamintojasid_Gamintojas">
					<option value="">---------------</option>
					<?php
						// išrenkame klientus
						
						$gamintojai = $gamintojaiObj->getGamintojasList();
						foreach($gamintojai as $key => $val) {
							$selected = "";
							if(isset($data['fk_Gamintojasid_Gamintojas']) && $data['fk_Gamintojasid_Gamintojas'] == $val['id_Gamintojas']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_Gamintojas']}'>{$val['Pavadinimas']}</option>";
						}
					?>
				</select>
			</p>
		</fieldset>
		<fieldset>
			<legend>Užsakomos žaliavos</legend>
			<div class="childRowContainer">
				<div class="labelLeft other1<?php if(empty($data['uzsako2']) || sizeof($data['uzsako2']) == 0) echo ' hidden'; ?>">Svoris (kg)<?php echo in_array('Svoriai', $required) ? '<span> *</span>' : ''; ?></div>
				<div class="labelRight<?php if(empty($data['uzsako2']) || sizeof($data['uzsako2']) == 0) echo ' hidden'; ?>">Žaliava<?php echo in_array('Zaliavos', $required) ? '<span> *</span>' : ''; ?></div>
				<div class="float-clear"></div>
				<?php
					if(empty($data['uzsako2']) || sizeof($data['uzsako2']) == 0) {
						
				?>
					<div class="childRow hidden">
					<input type="text" name="Svoriai[]" class="textbox textbox-70" value="" disabled="disabled" />
					<select class="elementSelector" name="Zaliavos[]" disabled="disabled">
					<option value="">---------------</option>
							<?php
								$zaliavos = $zaliavosObj->getZaliavaList();
								foreach($zaliavos as $key => $val) {
									$selected = "";
									
									echo "<option{$selected} value='{$val['id_Zaliavos']}'>{$val['Pavadinimas']}</option>";
								}
							?>
						</select>
						
						<a href="#" title="" class="removeChild">šalinti</a>
					</div>
					<div class="float-clear"></div>

				<?php
					} else {
						foreach($data['uzsako2'] as $key => $val) {
							
				?>
					<div class="childRow">
					<input type="text" name="Svoriai[]" value="<?php echo $val['Svoris']; ?>" class="textbox textbox-70"  />
					<select class="elementSelector" name="Zaliavos[]">
					<option value="">---------------</option>
							<?php
								$zaliavos = $zaliavosObj->getZaliavaList();
								foreach($zaliavos as $key => $val1) {
									$selected = "";
									if($val['fk_Zaliavosid_Zaliavos'] == $val1['id_Zaliavos']) {
										$selected = " selected='selected'";
									}
									echo "<option{$selected} value='{$val1['id_Zaliavos']}'>{$val1['Pavadinimas']}</option>";
								}
							?>
					</select>
							
							<a href="#" title="" class="removeChild">šalinti</a>
						</div>
						<div class="float-clear"></div>
				<?php 
					
						}

					}
				?>
			</div>
			<p id="newItemButtonContainer">
				<a href="#" title="" class="addChild">Pridėti</a>
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
		<?php if(isset($data['id_Uzsakymas_tiekejui'])) { ?>
			<input type="hidden" name="id_Uzsakymas_tiekejui" value="<?php echo $data['id_Uzsakymas_tiekejui']; ?>" />
		<?php } ?>
	</form>
</div>