<?php
	/* General controller */

	include_once("views/generalView");

	$view = new generalView();

	$view->header("Acceuil");
		$view->topBar();
	$view->closeBody();
	$view->closeHTML();
?>