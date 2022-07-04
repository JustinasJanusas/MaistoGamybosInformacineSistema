<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class gamintojai {
	
	private $gamintojai_lentele = '';
	private $darbuotojai_lentele = '';
	private $produktai_lentele = '';
	private $uzsakymaiTiekejui_lentele = '';
	private $produktuUzsakymai_lentele = '';
	private $tiekejai_lentele = '';
	private $zaliavos_lentele = '';
	private $uzsako_lentele = '';
	public function __construct() {
		$this->gamintojai_lentele = config::DB_PREFIX . 'gamintojas';
		$this->darbuotojai_lentele = config::DB_PREFIX . 'darbuotojas';
		$this->produktai_lentele = config::DB_PREFIX . 'produktas';
		$this->uzsakymaiTiekejui_lentele = config::DB_PREFIX . 'uzsakymas_tiekejui';
		$this->produktuUzsakymai_lentele = config::DB_PREFIX . 'uzsako1';
		$this->tiekejai_lentele = config::DB_PREFIX . 'tiekejas';
		$this->zaliavos_lentele = config::DB_PREFIX . 'zaliavos';
		$this->uzsako_lentele = config::DB_PREFIX . 'uzsako2';
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getGamintojas($id) {
		$query = "  SELECT *
					FROM `{$this->gamintojai_lentele}`
					WHERE `id_Gamintojas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getGamintojasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT *
					FROM `{$this->gamintojai_lentele}`{$limitOffsetString}";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getGamintojasListCount() {
		$query = "  SELECT COUNT(`{$this->gamintojai_lentele}`.`id_Gamintojas`) as `kiekis`
					FROM `{$this->gamintojai_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

	public function getRelatedCountOfGamintojas($id){
		$query = " SELECT COUNT(`{$this->darbuotojai_lentele}`.`id_Darbuotojas`) AS `kiekis`
		FROM `{$this->gamintojai_lentele}`
			INNER JOIN `{$this->darbuotojai_lentele}`
				ON `{$this->gamintojai_lentele}`.`id_Gamintojas`=`{$this->darbuotojai_lentele}`.`fk_Gamintojasid_Gamintojas`
				WHERE `{$this->gamintojai_lentele}`.`id_Gamintojas`='{$id}'";
		$query2 = " SELECT COUNT(`{$this->produktai_lentele}`.`id_Produktas`) AS `kiekis`
			FROM `{$this->gamintojai_lentele}`
			INNER JOIN `{$this->produktai_lentele}`
				ON `{$this->gamintojai_lentele}`.`id_Gamintojas`=`{$this->produktai_lentele}`.`fk_Gamintojasid_Gamintojas`
				WHERE `{$this->gamintojai_lentele}`.`id_Gamintojas`='{$id}'";
		
		$query3 = " SELECT COUNT(`{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui`) AS `kiekis`
				FROM `{$this->gamintojai_lentele}`
				INNER JOIN `{$this->uzsakymaiTiekejui_lentele}`
				ON `{$this->gamintojai_lentele}`.`id_Gamintojas`=`{$this->uzsakymaiTiekejui_lentele}`.`fk_Gamintojasid_Gamintojas`
					WHERE `{$this->gamintojai_lentele}`.`id_Gamintojas`='{$id}'";
		$data = mysql::select($query);
		$data2 = mysql::select($query2);
		$data3 = mysql::select($query3);
		return $data[0]['kiekis']+$data2[0]['kiekis']+$data3[0]['kiekis'];
	}
	public function deleteGamintojas($id){
		$query = " DELETE FROM `{$this->gamintojai_lentele}`
					WHERE `id_Gamintojas`='{$id}'";
		mysql::query($query);
	}
	public function insertGamintojas($data) {
		$query = "  INSERT INTO `{$this->gamintojai_lentele}`
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
		return mysql::getLastInsertedId();
	}
	public function updateGamintojas($data){
		$query = "  UPDATE `{$this->gamintojai_lentele}`
					SET    `Pavadinimas`='{$data['Pavadinimas']}',
						   `Miestas`='{$data['Miestas']}',
						   `Adresas`='{$data['Adresas']}',
						   `Vadovo_vardas`='{$data['Vadovo_vardas']}',
						   `Vadovo_pavarde`='{$data['Vadovo_pavarde']}'
					WHERE `id_Gamintojas`='{$data['id_Gamintojas']}'";
		mysql::query($query);
	}
	public function insertProduktas($data) {
		
		if(isset($data['Pavadinimai']) && sizeof($data['Pavadinimai']) > 0) {
			
			foreach($data['Pavadinimai'] as $key=>$val) {
				if($data['neaktyvus'] == array() || $data['neaktyvus'][$key] == 0) {
					$query = "  INSERT INTO `{$this->produktai_lentele}`
											(
												`fk_Gamintojasid_Gamintojas`,
												`Svoris`,
												`Pavadinimas`
											)
											VALUES
											(
												'{$data['id_Gamintojas']}',
												'{$data['Svoriai'][$key]}',
												'{$val}'
											)";
					mysql::query($query);
				}
			}
		}
	}
	public function getProduktas($id){
		$query = " SELECT *
					FROM `{$this->produktai_lentele}`
					WHERE `fk_Gamintojasid_Gamintojas`='{$id}'";
		$data = mysql::select($query);
		return $data;

	}
	public function deleteProduktas($id){
		$query = " (SELECT `id_Produktas`
					FROM `{$this->produktai_lentele}`
					WHERE `fk_Gamintojasid_Gamintojas`='{$id}')
					EXCEPT
					(SELECT `fk_Produktasid_Produktas`
					FROM `{$this->produktuUzsakymai_lentele}`)
						";
		$array = mysql::select($query);
		foreach($array as $key => $val){
			$query = " DELETE FROM `{$this->produktai_lentele}`
						WHERE `id_Produktas`='{$val['id_Produktas']}'";
			mysql::query($query);
		}
	}
	public function getGamintojasUzsakymai($id, $dateFrom, $dateTo){
		$whereClauseString = "";
		if(!empty($id)){
			$whereClauseString .= "WHERE `{$this->gamintojai_lentele}`.`id_Gamintojas` = '{$id}'";
			if(!empty($dateFrom))
				$whereClauseString .= "AND `{$this->uzsakymaiTiekejui_lentele}`.`Data` >= '{$dateFrom}'";
				if(!empty($dateTo))
					$whereClauseString .= "AND `{$this->uzsakymaiTiekejui_lentele}`.`Data` <= '{$dateTo}'";
		}
		elseif(!empty($dateFrom)){
			$whereClauseString .= "WHERE `{$this->uzsakymaiTiekejui_lentele}`.`Data` >= '{$dateFrom}'";
			if(!empty($dateTo))
				$whereClauseString .= "AND `{$this->uzsakymaiTiekejui_lentele}`.`Data` <= '{$dateTo}'";
		}
		elseif(!empty($dateTo))
			$whereClauseString .= "WHERE `{$this->uzsakymaiTiekejui_lentele}`.`Data` <= '{$dateTo}'";
		$query = "SELECT
				`{$this->gamintojai_lentele}`.`id_Gamintojas`,
				`{$this->gamintojai_lentele}`.`Pavadinimas`,
				`{$this->gamintojai_lentele}`.`Miestas`,
				IFNULL(`{$this->gamintojai_lentele}`.`Vadovo_vardas`, '') AS `vardas`,
				IFNULL(`{$this->gamintojai_lentele}`.`Vadovo_pavarde`, '') AS `pavarde`,
				`{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui`,
				`{$this->uzsakymaiTiekejui_lentele}`.`Data`,
				ROUND(`{$this->uzsakymaiTiekejui_lentele}`.`Kaina`, 2) AS `kaina`,
				`{$this->tiekejai_lentele}`.`Pavadinimas` AS `tiekejas`,
				`t`.`darbuotoju_skaicius`,
				`s`.`bendra_kaina`,
				`k`.`zaliavu_sk`,
				`k`.`bendras_svoris`,
				`a`.`zaliavu_sk_suma`,
				`a`.`bendras_svoris_suma`
				FROM `{$this->gamintojai_lentele}`
					LEFT JOIN `{$this->uzsakymaiTiekejui_lentele}`
						ON `{$this->gamintojai_lentele}`.`id_Gamintojas` = `{$this->uzsakymaiTiekejui_lentele}`.`fk_Gamintojasid_Gamintojas`
					LEFT JOIN `{$this->tiekejai_lentele}`
						ON `{$this->tiekejai_lentele}`.`id_Tiekejas` = `{$this->uzsakymaiTiekejui_lentele}`.`fk_Tiekejasid_Tiekejas`
					INNER JOIN (SELECT `id_Gamintojas`, COUNT(`{$this->darbuotojai_lentele}`.`fk_Gamintojasid_Gamintojas`) AS `darbuotoju_skaicius`
						FROM `{$this->darbuotojai_lentele}` RIGHT JOIN `{$this->gamintojai_lentele}` 
						ON `{$this->gamintojai_lentele}`.`id_Gamintojas` =  `{$this->darbuotojai_lentele}`.`fk_Gamintojasid_Gamintojas`
						GROUP BY `id_Gamintojas`) `t` ON `t`.`id_Gamintojas` = `{$this->gamintojai_lentele}`.`id_Gamintojas`
					INNER JOIN (SELECT `id_Gamintojas`, IFNULL(ROUND(SUM(`{$this->uzsakymaiTiekejui_lentele}`.`Kaina`), 2), 0) AS `bendra_kaina`
						FROM `{$this->gamintojai_lentele}` LEFT JOIN `{$this->uzsakymaiTiekejui_lentele}`
						ON `{$this->gamintojai_lentele}`.`id_Gamintojas` = `{$this->uzsakymaiTiekejui_lentele}`.`fk_Gamintojasid_Gamintojas`
						{$whereClauseString}
						GROUP BY `id_Gamintojas`) `s` ON `s`.`id_Gamintojas` = `{$this->gamintojai_lentele}`.`id_Gamintojas`
					LEFT JOIN (SELECT `{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui`, IFNULL(COUNT(`{$this->uzsako_lentele}`.`fk_Zaliavosid_Zaliavos`), 0) AS `zaliavu_sk`, 
										IFNULL(ROUND(SUM(`{$this->uzsako_lentele}`.`Svoris`), 2), 0) AS `bendras_svoris`
						FROM `{$this->uzsakymaiTiekejui_lentele}` INNER JOIN `{$this->uzsako_lentele}`
						ON `{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui` = `{$this->uzsako_lentele}`.`fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui`
						GROUP BY `id_Uzsakymas_tiekejui`) `k` ON `k`.`id_Uzsakymas_tiekejui` = `{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui`
					INNER JOIN (SELECT `id_Gamintojas`, IFNULL(COUNT(DISTINCT(`{$this->uzsako_lentele}`.`fk_Zaliavosid_Zaliavos`)), 0) AS `zaliavu_sk_suma`, IFNULL(ROUND(SUM(`{$this->uzsako_lentele}`.`Svoris`), 2), 0) AS `bendras_svoris_suma`
						FROM `{$this->gamintojai_lentele}` LEFT JOIN `{$this->uzsakymaiTiekejui_lentele}` ON `{$this->uzsakymaiTiekejui_lentele}`.`fk_Gamintojasid_Gamintojas` = `{$this->gamintojai_lentele}`.`id_Gamintojas`
							LEFT JOIN `{$this->uzsako_lentele}` ON `{$this->uzsako_lentele}`.`fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui` = `{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui`
						{$whereClauseString}
						GROUP BY `id_Gamintojas`) `a` ON `a`.`id_Gamintojas` = `{$this->gamintojai_lentele}`.`id_Gamintojas`
				{$whereClauseString}
				ORDER BY `{$this->gamintojai_lentele}`.`Pavadinimas` ASC, `{$this->uzsakymaiTiekejui_lentele}`.`Kaina` DESC";
		$data = mysql::select($query);
		
		return $data;
	}
	public function getSumWeight($id, $dateFrom, $dateTo){
		$whereClauseString = "";
		if(!empty($id)){
			$whereClauseString .= "WHERE `{$this->gamintojai_lentele}`.`id_Gamintojas` = '{$id}'";
			if(!empty($dateFrom))
				$whereClauseString .= "AND `{$this->uzsakymaiTiekejui_lentele}`.`Data` >= '{$dateFrom}'";
				if(!empty($dateTo))
					$whereClauseString .= "AND `{$this->uzsakymaiTiekejui_lentele}`.`Data` <= '{$dateTo}'";
		}
		elseif(!empty($dateFrom)){
			$whereClauseString .= "WHERE `{$this->uzsakymaiTiekejui_lentele}`.`Data` >= '{$dateFrom}'";
			if(!empty($dateTo))
				$whereClauseString .= "AND `{$this->uzsakymaiTiekejui_lentele}`.`Data` <= '{$dateTo}'";
		}
		elseif(!empty($dateTo))
			$whereClauseString .= "WHERE `{$this->uzsakymaiTiekejui_lentele}`.`Data` <= '{$dateTo}'";
		$query = "SELECT ROUND(SUM(`{$this->uzsako_lentele}`.`Svoris`), 2) AS `bendras_svoris`
				FROM `{$this->uzsakymaiTiekejui_lentele}` INNER JOIN `{$this->gamintojai_lentele}`
					ON `{$this->gamintojai_lentele}`.`id_Gamintojas` = `{$this->uzsakymaiTiekejui_lentele}`.`fk_Gamintojasid_Gamintojas`
					INNER JOIN `{$this->uzsako_lentele}` ON `{$this->uzsako_lentele}`.`fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui` = `{$this->uzsakymaiTiekejui_lentele}`.`id_Uzsakymas_tiekejui`
					{$whereClauseString}";
		$data = mysql::select($query);
		
		return $data;
	}	
	public function getSumPrice($id, $dateFrom, $dateTo){
		$whereClauseString = "";
		if(!empty($id)){
			$whereClauseString .= "WHERE `{$this->gamintojai_lentele}`.`id_Gamintojas` = '{$id}'";
			if(!empty($dateFrom))
				$whereClauseString .= "AND `{$this->uzsakymaiTiekejui_lentele}`.`Data` >= '{$dateFrom}'";
				if(!empty($dateTo))
					$whereClauseString .= "AND `{$this->uzsakymaiTiekejui_lentele}`.`Data` <= '{$dateTo}'";
		}
		elseif(!empty($dateFrom)){
			$whereClauseString .= "WHERE `{$this->uzsakymaiTiekejui_lentele}`.`Data` >= '{$dateFrom}'";
			if(!empty($dateTo))
				$whereClauseString .= "AND `{$this->uzsakymaiTiekejui_lentele}`.`Data` <= '{$dateTo}'";
		}
		elseif(!empty($dateTo))
			$whereClauseString .= "WHERE `{$this->uzsakymaiTiekejui_lentele}`.`Data` <= '{$dateTo}'";
		$query = "SELECT ROUND(SUM(`{$this->uzsakymaiTiekejui_lentele}`.`Kaina`), 2) AS `bendra_kaina`
				FROM `{$this->uzsakymaiTiekejui_lentele}` INNER JOIN `{$this->gamintojai_lentele}`
					ON `{$this->gamintojai_lentele}`.`id_Gamintojas` = `{$this->uzsakymaiTiekejui_lentele}`.`fk_Gamintojasid_Gamintojas`
					{$whereClauseString}";
		$data = mysql::select($query);
		
		return $data;
	}
}