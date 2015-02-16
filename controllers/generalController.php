<?php
	/* General controller */

	include_once("views/generalView");

	$view = new generalView();

	$view->header("Accueil");
		$view->topBar();
	$view->closeBody();
	$view->closeHTML();
?>