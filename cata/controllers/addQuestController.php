<?php
	/*
		addQuestController.php Controleur of the page who allow you to add some quest to the list 

		Author : Karakayn
	*/

	require_once("./views/IndexView.class.php");
	require_once("./views/FormView.class.php");


	$viewG = new IndexView();
	$view = new FormView();

	$viewG->header("DK-Quest - Accueil");
		$viewG->topBar();
		//if the button of the form is not set
		if(!isset($_POST['buttonFormAddQuest'])){
			$view->title();
			//show form for adding quest
			$view->formAddQuest();
		}else{

			require_once("./private/config.php");
			require_once("./models/IndexModel.class.php");
			$model = new IndexModel($db);

			$infoForm = array();

			//formatting data
			$infoForm["id"] = htmlspecialchars($_POST['id']);
			$infoForm["name"] = htmlspecialchars($_POST['nom']);	
			$infoForm["situation"] = htmlspecialchars($_POST['situation']);
			$infoForm["zone"] = htmlspecialchars($_POST['zone']);
			$infoForm["lastModif"] = htmlspecialchars($_POST['date']);
			$infoForm["comment"] = htmlspecialchars($_POST['commentaire']);
			$infoForm["linkBugReport"] = htmlspecialchars($_POST['lien']);	
			
			//Create a new quest with information on form
			$quest = new Quest($infoForm);

			//Add the quest to the database
			$model->addQuest($quest);

			//Confirmation message
			$view->successMessage();
			
		}
	$viewG->closeBody();
	$viewG->closeHTML();


?>