<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class zaliavos {
	
	private $zaliavos_lentele = '';
	
	public function __construct() {
		$this->zaliavos_lentele = config::DB_PREFIX . 'zaliavos';
		
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getZaliava($id) {
		$query = "  SELECT *
					FROM `{$this->zaliavos_lentele}`
					WHERE `id_Zaliavos`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getZaliavaList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT `{$this->zaliavos_lentele}`.`id_Zaliavos`,
						   `{$this->zaliavos_lentele}`.`Pavadinimas`
					FROM `{$this->zaliavos_lentele}`{$limitOffsetString}";
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getZaliavaListCount() {
		$query = "  SELECT COUNT(`{$this->zaliavos_lentele}`.`id_Zaliavos`) as `kiekis`
					FROM `{$this->zaliavos_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
}