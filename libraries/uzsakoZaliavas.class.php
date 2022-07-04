<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class uzsakoZaliavas {
	
	private $uzsakymai_lentele = '';
	
	public function __construct() {
		$this->uzsakymai_lentele = config::DB_PREFIX . 'uzsako2';
		
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getUzsakymas($id1, $id2) {
		$query = "  SELECT *
					FROM `{$this->uzsakymai_lentele}`
					WHERE `fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui`='{$id1}'
					AND `fk_Zaliavosid_Zaliavos`='{$id2}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getUzsakymasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT *
					FROM `{$this->uzsakymai_lentele}`{$limitOffsetString}";
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getZaliavaListCount() {
		$query = "  SELECT COUNT(`{$this->uzsakymai_lentele}`.`fk_Zaliavosid_Zaliavos`) as `kiekis`
					FROM `{$this->uzsakymai_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	public function getUzsakymasByID($id){
		$query = " SELECT *
					FROM `{$this->uzsakymai_lentele}`
					WHERE `fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui`='{$id}'";
					
		$data = mysql::select($query);
		return $data;
	}
	public function insertUzsakymas($data) {
		$query = "  INSERT INTO `{$this->uzsakymai_lentele}`
								(
									`fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui`,
									`fk_Zaliavosid_Zaliavos`,
									`Svoris`
								) 
								VALUES
								(
									'{$data['fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui']}',
									'{$data['fk_Zaliavosid_Zaliavos']}',
									'{$data['Svoris']}'
								)";
		mysql::query($query);
	}
	public function deleteUzsakymas($id){
		$query = " DELETE FROM `{$this->uzsakymai_lentele}`
					WHERE `fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui`='{$id}'";
		mysql::query($query);
	}
	public function insertUzsakymasList($data) {
		
		if(isset($data['Zaliavos']) && sizeof($data['Zaliavos']) > 0) {
			
			foreach($data['Zaliavos'] as $key=>$val) {
				
				$query = "  INSERT INTO `{$this->uzsakymai_lentele}`
										(
											`fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui`,
											`Svoris`,
											`fk_Zaliavosid_Zaliavos`
										)
										VALUES
										(
											'{$data['id_Uzsakymas_tiekejui']}',
											'{$data['Svoriai'][$key]}',
											'{$val}'
										)";
				mysql::query($query);
				
			}
		}
	}
}