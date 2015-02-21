<?php
	/* General controller */

	require_once("./private/config.php");
	require_once("./views/generalView.class.php");
	require_once("./models/GeneralModel.class.php");


	$view = new generalView();
	$model = new GeneralModel($db);

	$view->header("DK-Quest - Accueil");
		$view->topBar();

		/*$view->tabList(); //beginTab
		$view->tabContentClass(); //begin div class="tabs-content"
			$view->tabContentActive("#panel1");*/
				$view->beginTable();
					$view->tr();
						$quests = $model->getQuestList();
						foreach ($quests as $listQuest => $quest) {
							foreach ($quest as $elementQuest => $eltQuest) {
								//find all element of the quest and fill the table
								$view->celTd($eltQuest);
							}
							//close line
							$view->endTr();
						}
				$view->endTable();
			//$view->closeDiv(); //end of the content of the pannel

			/*$view->tabContentClass("#panel2");

			$view->closeDiv();

			$view->tabContentClass("#panel3");
			$view->closeDiv();

			$view->tabContentClass("#panel4");
			$view->closeDiv();

		$view->closeDiv(); //end div class="tabs-content"*/
	$view->closeBody();
	$view->closeHTML();
?>