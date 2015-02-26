<?php
/*
*	IndexModel.class.php : Manage request for index
*	
*	Author : Karakayn
*/

require_once('Quest.class.php');

class IndexModel{
	
	private $_db;

	public function __construct($db){
		$this->setDb($db);
	}

	public function setDb(PDO $db){
		$this->_db = $db;
	}

	public function getQuestList($zone){
		$quests = array();
		$req = $this->_db->query('SELECT id, name, situation, lastModif, linkBugReport, comment FROM dkQuestCata WHERE zone = \''.$zone.'\' ORDER BY id');
		while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
			//$kreaturs[] = new Kreatur($donnees);
			$quests[] = new Quest($donnees);
		}

		$req->closeCursor();
		//var_dump($quests);
		return $quests;
	}
}
?>