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
		$req = $this->_db->prepare('SELECT id, name, situation, lastModif, linkBugReport, comment FROM dkQuest WHERE zone LIKE :zone ORDER BY id');
		$req->bindValue(':zone', $zone,PDO::PARAM_STR);
		$req->execute();
		while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
			$quests[] = new Quest($donnees);
		}

		$req->closeCursor();
		return $quests;
	}

		//Add a quest in DB
	public function addQuest($quest)
	{
		$sql = "INSERT INTO dkQuest (id, name, situation, zone, lastModif, linkBugReport, comment)
			VALUES (:id, :name, :situation, :zone, :lastModif, :linkBugReport, :comment)";
		$req = $this->_db->prepare($sql);                     
		$req->bindParam(':id', $quest->getId(), PDO::PARAM_INT);
		$req->bindParam(':name', $quest->getName(), PDO::PARAM_STR);
		$req->bindParam(':situation', $quest->getSituation(), PDO::PARAM_STR);
		$req->bindParam(':zone', $quest->getZone(), PDO::PARAM_STR);
		$req->bindParam(':lastModif', Date("d/m/Y", strtotime($quest->getLastModif())), PDO::PARAM_STR);
		$req->bindParam(':linkBugReport', $quest->getLinkBugReport(), PDO::PARAM_STR);
		$req->bindParam(':comment', $quest->getComment(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
}
?>