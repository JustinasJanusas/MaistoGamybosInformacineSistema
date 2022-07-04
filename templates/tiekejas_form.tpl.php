<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Tiekėjai</a></li>
	<li><?php if(!empty($id)) echo "Tiekėjo redagavimas"; else echo "Naujas tiekėjas"; ?></li>
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
			<legend>Tiekėjo informacija</legend>
			<p>
				<label class="field" for="Pavadinimas">Pavadinimas<?php echo in_array('Pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Pavadinimas" name="Pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['Pavadinimas']) ? $data['Pavadinimas'] : ''; ?>" />
				<?php if(key_exists('Pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavadinimas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="Imones_kodas">Imonės kodas<?php echo in_array('Imones_kodas', $required) ? '<span> *</span>' : ''; ?></label>
				<?php if(!isset($data['editing'])) { ?>
						<input type="text" id="Imones_kodas" name="Imones_kodas" class="textbox textbox-150" value="<?php echo isset($data['Imones_kodas']) ? $data['Imones_kodas'] : ''; ?>" />
						<?php if(key_exists('Imones_kodas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Imones_kodas']} simb.)</span>"; ?>
				<?php } else { ?>
						<span class="input-value"><?php echo $data['Imones_kodas']; ?></span>
						<input type="hidden" name="editing" value="1" />
						<input type="hidden" name="Imones_kodas" value="<?php echo $data['Imones_kodas']; ?>" />
				<?php } ?>
			</p>
			<p>
				<label class="field" for="Miestas">Miestas<?php echo in_array('Miestas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Miestas" name="Miestas" class="textbox textbox-150" value="<?php echo isset($data['Miestas']) ? $data['Miestas'] : ''; ?>" />
				<?php if(key_exists('Miestas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Miestas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="Adresas">Adresas<?php echo in_array('Adresas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Adresas" name="Adresas" class="textbox textbox-150" value="<?php echo isset($data['Adresas']) ? $data['Adresas'] : ''; ?>" />
				<?php if(key_exists('Adresas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Adresas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="Vadovo_vardas">Vadovo vardas<?php echo in_array('Vadovo_vardas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Vadovo_vardas" name="Vadovo_vardas" class="textbox textbox-150" value="<?php echo isset($data['Vadovo_vardas']) ? $data['Vadovo_vardas'] : ''; ?>" />
				<?php if(key_exists('Vadovo_vardas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Vadovo_vardas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="Vadovo_pavarde">Vadovo pavardė<?php echo in_array('Vadovo_pavarde', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="Vadovo_pavarde" name="Vadovo_pavarde" class="textbox textbox-150" value="<?php echo isset($data['Vadovo_pavarde']) ? $data['Vadovo_pavarde'] : ''; ?>" />
				<?php if(key_exists('Vadovo_pavarde', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Vadovo_pavarde']} simb.)</span>"; ?>
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
		<?php if(isset($data['id_Tiekejas'])) { ?>
			<input type="hidden" name="id_Tiekejas" value="<?php echo $data['id_Tiekejas']; ?>" />
		<?php } ?>
	</form>
</div>