<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class darbuotojai {
	
	private $darbuotojai_lentele = '';
	private $gamintojai_lentele = '';
	
	public function __construct() {
		$this->darbuotojai_lentele = config::DB_PREFIX . 'darbuotojas';
		$this->gamintojai_lentele = config::DB_PREFIX . 'gamintojas';
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getDarbuotojas($id) {
		$query = "  SELECT *
					FROM `{$this->darbuotojai_lentele}`
					WHERE `id_Darbuotojas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getDarbuotojasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT `{$this->darbuotojai_lentele}`.`id_Darbuotojas`,
						   `{$this->darbuotojai_lentele}`.`Vardas`,
                            `{$this->darbuotojai_lentele}`.`Pavarde`,
                            `{$this->darbuotojai_lentele}`.`Asmens_kodas`,
                            `{$this->darbuotojai_lentele}`.`Gimimo_data`,
                            `{$this->darbuotojai_lentele}`.`Alga`,
                            `{$this->darbuotojai_lentele}`.`Pareigos`,
                            `{$this->darbuotojai_lentele}`.`Idarbinimo_data`,
						    `{$this->gamintojai_lentele}`.`Pavadinimas` AS `Darbdavys`
					FROM `{$this->darbuotojai_lentele}`
						LEFT JOIN `{$this->gamintojai_lentele}`
							ON `{$this->darbuotojai_lentele}`.`fk_Gamintojasid_Gamintojas`=`{$this->gamintojai_lentele}`.`id_Gamintojas`{$limitOffsetString}";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getDarbuotojasListCount() {
		$query = "  SELECT COUNT(`{$this->darbuotojai_lentele}`.`id_Darbuotojas`) as `kiekis`
					FROM `{$this->darbuotojai_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	public function deleteDarbuotojas($id){
		$query = " DELETE FROM `{$this->darbuotojai_lentele}`
					WHERE `id_Darbuotojas`='{$id}'";
		mysql::query($query);
	}

	public function insertDarbuotojas($data) {
	
		$query = "  INSERT INTO `{$this->darbuotojai_lentele}`
								(
									`Vardas`,
									`Pavarde`,
									`Asmens_kodas`,
									`Gimimo_data`,
									`Alga`,
									`Pareigos`,
									`Idarbinimo_data`,
									`fk_Gamintojasid_Gamintojas`
								) 
								VALUES
								(
									'{$data['Vardas']}',
									'{$data['Pavarde']}',
									'{$data['Asmens_kodas']}',
									'{$data['Gimimo_data']}',
									'{$data['Alga']}',
									'{$data['Pareigos']}',
									'{$data['Idarbinimo_data']}',
									'{$data['fk_Gamintojasid_Gamintojas']}'
								)";
		mysql::query($query);
	}
	public function updateDarbuotojas($data){
		$query = "  UPDATE `{$this->darbuotojai_lentele}`
					SET    `Vardas`='{$data['Vardas']}',
							`Pavarde`='{$data['Pavarde']}',
							`Asmens_kodas`='{$data['Asmens_kodas']}',
							`Gimimo_data`='{$data['Gimimo_data']}',
							`Alga`='{$data['Alga']}',
							`Pareigos`='{$data['Pareigos']}',
							`Idarbinimo_data`='{$data['Idarbinimo_data']}',
							`fk_Gamintojasid_Gamintojas`='{$data['fk_Gamintojasid_Gamintojas']}'
					WHERE `id_Darbuotojas`='{$data['id_Darbuotojas']}'";
		mysql::query($query);
	}
}