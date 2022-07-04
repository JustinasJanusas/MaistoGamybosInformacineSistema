<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class tiekejai {
	
	private $tiekejai_lentele = '';
	private $uzsakymaiTiekejui_lentele = '';
	
	public function __construct() {
		$this->tiekejai_lentele = config::DB_PREFIX . 'tiekejas';
		$this->uzsakymaiTiekejui_lentele = config::DB_PREFIX . 'uzsakymas_tiekejui';
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getTiekejas($id) {
		$query = "  SELECT *
					FROM `{$this->tiekejai_lentele}`
					WHERE `id_Tiekejas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getTiekejasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT `{$this->tiekejai_lentele}`.`id_Tiekejas`,
						   `{$this->tiekejai_lentele}`.`Pavadinimas`,
						    `{$this->tiekejai_lentele}`.`Imones_kodas`,
							`{$this->tiekejai_lentele}`.`Miestas`,
							`{$this->tiekejai_lentele}`.`Adresas`,
							`{$this->tiekejai_lentele}`.`Vadovo_vardas`,
							`{$this->tiekejai_lentele}`.`Vadovo_pavarde`
					FROM `{$this->tiekejai_lentele}`{$limitOffsetString}";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getTiekejasListCount() {
		$query = "  SELECT COUNT(`{$this->tiekejai_lentele}`.`id_Tiekejas`) as `kiekis`
					FROM `{$this->tiekejai_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	public function getUzsakymasTiekejuiCountOfTiekejas($id){
		$query = " SELECT COUNT(`{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui`) AS `kiekis`
		FROM `{$this->tiekejai_lentele}`
			INNER JOIN `{$this->uzsakymaiTiekejui_lentele}`
				ON `{$this->tiekejai_lentele}`.`id_Tiekejas`=`{$this->uzsakymasTiekejui_lentele}`.`fk_Tiekejasid_Tiekejas`
		WHERE `{$this->tiekejai_lentele}`.`id_Tiekejas`='{$id}'";
		$data = mysql::select($query);
		return $data[0]['kiekis'];
	}
	public function deleteTiekejas($id){
		$query = " DELETE FROM `{$this->tiekejai_lentele}`
					WHERE `id_Tiekejas`='{$id}'";
		mysql::query($query);
	}
	public function insertTiekejas($data) {
		$query = "  INSERT INTO `{$this->tiekejai_lentele}`
								(
									`Pavadinimas`,
									`Imones_kodas`,
									`Miestas`,
									`Adresas`,
									`Vadovo_vardas`,
									`Vadovo_pavarde`
								) 
								VALUES
								(
									'{$data['Pavadinimas']}',
									'{$data['Imones_kodas']}',
									'{$data['Miestas']}',
									'{$data['Adresas']}',
									'{$data['Vadovo_vardas']}',
									'{$data['Vadovo_pavarde']}'
								)";
		mysql::query($query);
	}
	public function updateTiekejas($data){
		$query = "  UPDATE `{$this->tiekejai_lentele}`
					SET    `Pavadinimas`='{$data['Pavadinimas']}',
						   `Miestas`='{$data['Miestas']}',
						   `Adresas`='{$data['Adresas']}',
						   `Vadovo_vardas`='{$data['Vadovo_vardas']}',
						   `Vadovo_pavarde`='{$data['Vadovo_pavarde']}'
					WHERE `id_Tiekejas`='{$data['id_Tiekejas']}'";
		mysql::query($query);
	}
}