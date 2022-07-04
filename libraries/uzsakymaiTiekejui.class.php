<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class uzsakymaiTiekejui {
	
	private $uzsakymaiTiekejui_lentele = '';
	private $tiekejai_lentele = '';
	private $transportas_lentele = '';
	private $gamintojai_lentele = '';
	
	public function __construct() {
		$this->uzsakymaiTiekejui_lentele = config::DB_PREFIX . 'uzsakymas_Tiekejui';
		$this->tiekejai_lentele = config::DB_PREFIX . 'tiekejas';
		$this->transportas_lentele = config::DB_PREFIX . 'transportas';
		$this->gamintojai_lentele = config::DB_PREFIX . 'gamintojas';
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getUzsakymasTiekejui($id) {
		$query = "  SELECT *
					FROM `{$this->uzsakymaiTiekejui_lentele}`
					WHERE `id_Uzsakymas_tiekejui`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getUzsakymasTiekejuiList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT `{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui`,
						   `{$this->uzsakymaiTiekejui_lentele}`.`Data`,
                            `{$this->uzsakymaiTiekejui_lentele}`.`Kaina`,
                            `{$this->uzsakymaiTiekejui_lentele}`.`Terminas`,
						    `{$this->tiekejai_lentele}`.`Pavadinimas` AS `Tiekejas`,
							`{$this->transportas_lentele}`.`Transportuojanti_imone` AS `Imone`,
							`{$this->gamintojai_lentele}`.`Pavadinimas` AS `Gamintojas`
					FROM `{$this->uzsakymaiTiekejui_lentele}`
						LEFT JOIN `{$this->tiekejai_lentele}`
							ON `{$this->uzsakymaiTiekejui_lentele}`.`fk_Tiekejasid_Tiekejas`=`{$this->tiekejai_lentele}`.`id_Tiekejas`
							LEFT JOIN `{$this->transportas_lentele}`
							ON `{$this->uzsakymaiTiekejui_lentele}`.`fk_Reisasid_Reisas`=`{$this->transportas_lentele}`.`id_Reisas`
							LEFT JOIN `{$this->gamintojai_lentele}`
							ON `{$this->uzsakymaiTiekejui_lentele}`.`fk_Gamintojasid_Gamintojas`=`{$this->gamintojai_lentele}`.`id_Gamintojas`{$limitOffsetString}";
		$data = mysql::select($query);
		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getUzsakymasTiekejuiListCount() {
		$query = "  SELECT COUNT(`{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui`) as `kiekis`
					FROM `{$this->uzsakymaiTiekejui_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	public function deleteUzsakymasTiekejui($id){
		$query = " DELETE FROM `{$this->uzsakymaiTiekejui_lentele}`
					WHERE `id_Uzsakymas_tiekejui`='{$id}'";
		mysql::query($query);
	}
	public function insertUzsakymasTiekejui($data){
		
		$query = "  INSERT INTO `{$this->uzsakymaiTiekejui_lentele}`
								(
									`Data`,
									`Kaina`,
									`Terminas`,
									`fk_Reisasid_Reisas`,
									`fk_Tiekejasid_Tiekejas`,
									`fk_Gamintojasid_Gamintojas`
								) 
								VALUES
								(
									'{$data['Data']}',
									'{$data['Kaina']}',
									'{$data['Terminas']}',
									'{$data['fk_Reisasid_Reisas']}',
									'{$data['fk_Tiekejasid_Tiekejas']}',
									'{$data['fk_Gamintojasid_Gamintojas']}'
								)";
								
		mysql::query($query);
		return mysql::getLastInsertedId();
	}

	public function updateUzsakymasTiekejui($data){
		$query = "  UPDATE `{$this->uzsakymaiTiekejui_lentele}`
					SET    `Data`='{$data['Data']}',
						   `Kaina`='{$data['Kaina']}',
						   `Terminas`='{$data['Terminas']}',
						   `fk_Tiekejasid_Tiekejas`='{$data['fk_Tiekejasid_Tiekejas']}',
						   `fk_Gamintojasid_Gamintojas`='{$data['fk_Gamintojasid_Gamintojas']}'
					WHERE `id_Uzsakymas_tiekejui`='{$data['id_Uzsakymas_tiekejui']}'";
		mysql::query($query);
	}

	
	
}