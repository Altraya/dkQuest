<?php
	/* General controller */

	require_once("./views/generalView.class.php");

	$view = new generalView();

	$view->header("DK-Quest - Accueil");
		$view->topBar();
	$view->closeBody();
	$view->closeHTML();
?>