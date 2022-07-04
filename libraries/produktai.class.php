<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class produktai {
	
	private $produktai_lentele = '';
	private $gamintojai_lentele = '';
	private $uzsakymai_lentele = '';
	
	public function __construct() {
		$this->produktai_lentele = config::DB_PREFIX . 'produktas';
		$this->gamintojai_lentele = config::DB_PREFIX . 'gamintojas';
		$this->uzsakymai_lentele = config::DB_PREFIX . 'uzsako1';
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getProduktas($id) {
		$query = "  SELECT *
					FROM `{$this->produktai_lentele}`
					WHERE `id_Produktas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getProduktasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT `{$this->produktai_lentele}`.`id_Produktas`,
						   `{$this->produktai_lentele}`.`Pavadinimas`,
						    `{$this->produktai_lentele}`.`Svoris`,
							`{$this->gamintojai_lentele}`.`Pavadinimas` AS `Gamintojas`
					FROM `{$this->produktai_lentele}` 
						LEFT JOIN `{$this->gamintojai_lentele}`
							ON `{$this->produktai_lentele}`.`fk_Gamintojasid_Gamintojas`=`{$this->gamintojai_lentele}`.`id_Gamintojas`{$limitOffsetString}";
		$data = mysql::select($query);
		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getProduktasListCount() {
		$query = "  SELECT COUNT(`{$this->produktai_lentele}`.`id_Produktas`) as `kiekis`
					FROM `{$this->produktai_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	public function deleteProduktas($id){
		$query = " DELETE FROM `{$this->produktai_lentele}`
					WHERE `id_Produktas`='{$id}'";

		mysql::query($query);
	}
	public function insertProduktas($data){
		$query = " INSERT INTO `{$this->produktai_lentele}`
								(
									`Pavadinimas`,
									`Svoris`,
									`fk_Gamintojasid_Gamintojas`
								)
								Values
								(
									'{$data['Pavadinimas']}',
									'{$data['Svoris']}',
									'{$data['fk_Gamintojasid_Gamintojas']}'
								)";
		mysql::query($query);
	}
	public function getProduktasListByGamintojas($id){
		$query = " SELECT *
					FROM `{$this->produktai_lentele}`
					WHERE `fk_Gamintojasid_Gamintojas`='{$id}'";
		$data = mysql::select($query);
		return $data;
	}
	public function getUzsakymasCountOfProduktas($id){
		$query = " SELECT COUNT(`{$this->produktai_lentele}`.`id_Produktas`) AS `kiekis`
					FROM `{$this->produktai_lentele}`
						INNER JOIN `{$this->uzsakymai_lentele}`
							ON `{$this->produktai_lentele}`.`id_Produktas`=`{$this->uzsakymai_lentele}`.`fk_Produktasid_Produktas`
							WHERE `{$this->produktai_lentele}`.`id_Produktas`='{$id}'";
		$data = mysql::select($query);
		return $data[0]['kiekis'];
	}
	public function getProduktasCountInUzsakymas($id){
		$query = " SELECT COUNT(`fk_Produktasid_Produktas`) AS `kiekis`
					FROM `{$this->uzsakymai_lentele}`
					WHERE `fk_Produktasid_Produktas`='{$id}'";
		$data = mysql::select($query);
		return $data[0]['kiekis'];
	}
}