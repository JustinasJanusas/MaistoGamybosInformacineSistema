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
			<legend>Įveskite kriterijus</legend>
			<p>
			<label class="field" for="fk_Gamintojasid_Gamintojas">Gamintojas</label>
				<select id="fk_Gamintojasid_Gamintojas" name="fk_Gamintojasid_Gamintojas">
					<option value="">---------------</option>
					<?php
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
			<p><label class="field" for="dataNuo">Sutartys sudarytos nuo</label><input type="text" id="dataNuo" name="dataNuo" class="textbox textbox-100 date" value="<?php echo isset($fields['dataNuo']) ? $fields['dataNuo'] : ''; ?>" /></p>
			<p><label class="field" for="dataIki">Sutartys sudarytos iki</label><input type="text" id="dataIki" name="dataIki" class="textbox textbox-100 date" value="<?php echo isset($fields['dataIki']) ? $fields['dataIki'] : ''; ?>" /></p>
		</fieldset>
		<p><input type="submit" class="submit button float-right" name="submit" value="Sudaryti ataskaitą"></p>
	</form>
</div>