<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class uzsakovai {
	
	private $uzsakovai_lentele = '';
	
	public function __construct() {
		$this->uzsakovai_lentele = config::DB_PREFIX . 'uzsakovas';
		
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getUzsakovas($id) {
		$query = "  SELECT *
					FROM `{$this->uzsakovai_lentele}`
					WHERE `id_Uzsakovas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getUzsakovasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT `{$this->uzsakovai_lentele}`.`id_Uzsakovas`,
						   `{$this->uzsakovai_lentele}`.`Pavadinimas`,
						    `{$this->uzsakovai_lentele}`.`Imones_kodas`,
							`{$this->uzsakovai_lentele}`.`Miestas`,
							`{$this->uzsakovai_lentele}`.`Adresas`,
							`{$this->uzsakovai_lentele}`.`Vadovo_vardas`,
							`{$this->uzsakovai_lentele}`.`Vadovo_pavarde`
					FROM `{$this->uzsakovai_lentele}`{$limitOffsetString}";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getUzsakovasListCount() {
		$query = "  SELECT COUNT(`{$this->uzsakovai_lentele}`.`id_Uzsakovas`) as `kiekis`
					FROM `{$this->uzsakovai_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
}