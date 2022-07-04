<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Darbuotojai</a></li>
	<li><?php if(!empty($id)) echo "Darboutojo redagavimas"; else echo "Naujas darbuotojas"; ?></li>
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
			<legend>Darbuotojo informacija</legend>
			<p>
				<label class="field" for="Vardas">Vardas<?php echo in_array('Vardas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Vardas" name="Vardas" class="textbox textbox-150" value="<?php echo isset($data['Vardas']) ? $data['Vardas'] : ''; ?>" />
				<?php if(key_exists('Vardas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Vardas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="Pavarde">Pavardė<?php echo in_array('Pavarde', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Pavarde" name="Pavarde" class="textbox textbox-150" value="<?php echo isset($data['Pavarde']) ? $data['Pavarde'] : ''; ?>" />
				<?php if(key_exists('Pavarde', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavarde']} simb.)</span>"; ?>
			</p>
			<p>
					<label class="field" for="Asmens_kodas">Asmens kodas<?php echo in_array('Asmens_kodas', $required) ? '<span> *</span>' : ''; ?></label>
					<?php if(!isset($data['editing'])) { ?>
						<input type="text" id="Asmens_kodas" name="Asmens_kodas" class="textbox textbox-150" value="<?php echo isset($data['Asmens_kodas']) ? $data['Asmens_kodas'] : ''; ?>" />
						<?php if(key_exists('Asmens_kodas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Asmens_kodas']} simb.)</span>"; ?>
					<?php } else { ?>
						<span class="input-value"><?php echo $data['Asmens_kodas']; ?></span>
						<input type="hidden" name="editing" value="1" />
						<input type="hidden" name="Asmens_kodas" value="<?php echo $data['Asmens_kodas']; ?>" />
					<?php } ?>
			</p>
			<p>
				<label class="field" for="Gimimo_data">Gimimo data<?php echo in_array('Gimimo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Gimimo_data" name="Gimimo_data" class="textbox textbox-70 date" value="<?php echo isset($data['Gimimo_data']) ? $data['Gimimo_data'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="Alga">Alga<?php echo in_array('Alga', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Alga" name="Alga" class="textbox textbox-150" value="<?php echo isset($data['Alga']) ? $data['Alga'] : ''; ?>" />
				<?php if(key_exists('Alga', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Alga']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="Pareigos">Pareigos<?php echo in_array('Pareigos', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Pareigos" name="Pareigos" class="textbox textbox-150" value="<?php echo isset($data['Pareigos']) ? $data['Pareigos'] : ''; ?>" />
				<?php if(key_exists('Pareigos', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pareigos']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="Idarbinimo_data">Įdarbinimo data<?php echo in_array('Idarbinimo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Idarbinimo_data" name="Idarbinimo_data" class="textbox textbox-70 date" value="<?php echo isset($data['Idarbinimo_data']) ? $data['Idarbinimo_data'] : ''; ?>" />
			</p>
			<p>
			<label class="field" for="fk_Gamintojasid_Gamintojas">Darbovietė<?php echo in_array('fk_Gamintojasid_Gamintojas', $required) ? '<span> *</span>' : ''; ?></label>
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
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
		<?php if(isset($data['id_Darbuotojas'])) { ?>
			<input type="hidden" name="id_Darbuotojas" value="<?php echo $data['id_Darbuotojas']; ?>" />
		<?php } ?>
	</form>
</div>