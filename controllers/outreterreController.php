<?php
	/* Outreterre quest controller */

	require_once("./private/config.php");
	require_once("./views/IndexView.class.php");
	require_once("./models/IndexModel.class.php");


	$view = new IndexView();
	$model = new IndexModel($db);

	$view->header("DK-Quest - Outreterre");
		$view->topBar();

		$questsOutreterre = array();
		
		$questsOutreterre[] = $model->getQuestList("Outreterre - Forêt de Terokkar");
		$questsOutreterre[] = $model->getQuestList("Outreterre - Les Tranchantes");
		$questsOutreterre[] = $model->getQuestList("Outreterre - Marécage de Zangar");
		$questsOutreterre[] = $model->getQuestList("Outreterre - Nagrand");
		$questsOutreterre[] = $model->getQuestList("Outreterre - Péninsule des Flammes infernales");
		$questsOutreterre[] = $model->getQuestList("Outreterre - Raz-de-Néant");
		$questsOutreterre[] = $model->getQuestList("Outreterre - Vallée d'Ombrelune");


		$view->tabOutreterre($questsOutreterre);

		$view->footer();
	$view->closeBody();
	$view->closeHTML();
?>