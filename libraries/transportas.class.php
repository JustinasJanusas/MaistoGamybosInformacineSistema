<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class transportas {
	
	private $transportas_lentele = '';
	
	public function __construct() {
		$this->transportas_lentele = config::DB_PREFIX . 'transportas';
		
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getTransportas($id) {
		$query = "  SELECT *
					FROM `{$this->transportas_lentele}`
					WHERE `id_Reisas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getTransportasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT `{$this->transportas_lentele}`.`id_Reisas`,
						   `{$this->transportas_lentele}`.`Transportuojanti_imone`,
						    `{$this->transportas_lentele}`.`Vairuotojo_vardas`,
							`{$this->transportas_lentele}`.`Vairuotojo_pavarde`
					FROM `{$this->transportas_lentele}`{$limitOffsetString}";
		$data = mysql::select($query);
		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getTransportasListCount() {
		$query = "  SELECT COUNT(`{$this->transportas_lentele}`.`id_Reisas`) as `kiekis`
					FROM `{$this->transportas_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
}