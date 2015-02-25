<?php
/*
*	Quest.class.php : Quest object
*
*	Author : Karakayn
*/
class Quest{

	private $_id;				//quest id
	private $_name;				//quest name
	private $_situation;		//debug/fonctionnelle/bug
	private $_zone;				//zone ex : uldum
	private $_comment;			//to specify something
	private $_lastModif;		//date of the last modif or test
	private $_linkBugReport;	//link to the bug report if existing
	
	
	/*Constructeur*/
	public function __construct($donnees){
		$this->hydrate($donnees);
	}

	/***************************
		Accesseur de la classe
	****************************/

	public function getId(){
		return $this->_id;
	}

	public function getName(){
		return $this->_name;
	}

	public function getSituation(){
		return $this->_situation;
	}

	public function getZone(){
		return $this->_zone;
	}

	public function getComment(){
		return $this->_comment;
	}

	public function getLastModif(){
		return $this->_lastModif;
	}

	public function getLinkBugReport(){
		return $this->_linkBugReport;
	}

	/************************/

	public function setId($id){
		$this->_id = $id;
	}

	public function setName($name){
		$this->_name = htmlspecialchars($name);	
	}

	public function setSituation($situation){
		$this->_situation = htmlspecialchars($situation);	
	}

	public function setZone($zone){
		$this->_zone = htmlspecialchars($zone);	
	}

	public function setComment($comment){
		$this->_comment = htmlspecialchars($comment);	
	}

	public function setLastModif($lastModif){
		$this->_lastModif = htmlspecialchars($lastModif);	
	}

	public function setLinkBugReport($linkBugReport){
		$this->_linkBugReport = htmlspecialchars($linkBugReport);
	}

	/************************/

	public function hydrate($donnees)
	{
		foreach($donnees as $key => $value)
		{
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);

			// Si le setter correspondant existe.
			if(method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
	}
}
?>