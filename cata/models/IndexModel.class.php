<?php
/*
*	GeneralModel.class.php : Manage all
*	
*	Author : Karakayn
*/

class GeneralModel{
	
	private $_db;

	public function __construct($db){
		$this->setDb($db);
	}

	public function setDb(PDO $db){
		$this->_db = $db;
	}

	public function getQuestList(){
		$quests = array();
		$req = $this->_db->query('SELECT id, name, situation, lastModif, linkBugReport, comment FROM dkQuest ORDER BY id');
		while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
			//$kreaturs[] = new Kreatur($donnees);
			$quests[] = $donnees;
		}

		$req->closeCursor();
		//var_dump($quests);
		return $quests;
	}
}
?>