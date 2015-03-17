<?php
	/* General controller */

	require_once("./private/config.php");
	require_once("./views/IndexView.class.php");
	require_once("./models/IndexModel.class.php");


	$view = new IndexView();
	$model = new IndexModel($db);

	$view->header("DK-Quest - Accueil");
		$view->topBar();

		$view->messageIndex();

		$view->footer();
	$view->closeBody();
	$view->closeHTML();
?>