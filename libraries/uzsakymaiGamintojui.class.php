<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class uzsakymaiGamintojui {
	
	private $uzsakymaiGamintojui_lentele = '';
	private $uzsakovai_lentele = '';
	private $transportas_lentele = '';
	
	public function __construct() {
		$this->uzsakymaiGamintojui_lentele = config::DB_PREFIX . 'uzsakymas_gamintojui';
		$this->uzsakovai_lentele = config::DB_PREFIX . 'uzsakovas';
		$this->transportas_lentele = config::DB_PREFIX . 'transportas';
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getUzsakymasGamintojui($id) {
		$query = "  SELECT *
					FROM `{$this->uzsakymaiGamintojui_lentele}`
					WHERE `id_Uzsakymas_gamintojui`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getUzsakymasGamintojuiList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT `{$this->uzsakymaiGamintojui_lentele}`.`id_Uzsakymas_gamintojui`,
						   `{$this->uzsakymaiGamintojui_lentele}`.`Data`,
                            `{$this->uzsakymaiGamintojui_lentele}`.`Kaina`,
                            `{$this->uzsakymaiGamintojui_lentele}`.`Terminas`,
						    `{$this->uzsakovai_lentele}`.`Pavadinimas` AS `Uzsakovas`,
							`{$this->transportas_lentele}`.`Transportuojanti_imone` AS `Imone`
					FROM `{$this->uzsakymaiGamintojui_lentele}`
						LEFT JOIN `{$this->uzsakovai_lentele}`
							ON `{$this->uzsakymaiGamintojui_lentele}`.`fk_Uzsakovasid_Uzsakovas`=`{$this->uzsakovai_lentele}`.`id_Uzsakovas`
							LEFT JOIN `{$this->transportas_lentele}`
							ON `{$this->uzsakymaiGamintojui_lentele}`.`fk_Reisasid_Reisas`=`{$this->transportas_lentele}`.`id_Reisas`{$limitOffsetString}";
		$data = mysql::select($query);
		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getUzsakymasGamintojuiListCount() {
		$query = "  SELECT COUNT(`{$this->uzsakymaiGamintojui_lentele}`.`id_Uzsakymas_gamintojui`) as `kiekis`
					FROM `{$this->uzsakymaiGamintojui_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	

	
	
}