<?php
	include("inc/global.php");
	echo "Welcome to Magrathea!";

	MagratheaController::IncludeAllControllers();
	MagratheaModel::IncludeAllModels();

	// css & javascript
	try{
		MagratheaView::Instance()
			->IncludeCSS("css/style.css")
			->IncludeJavascript("javascript/scripts.js");
	} catch(Exception $ex){
		BaseControl::DisplayError($ex);
	}
	
	MagratheaRoute::Instance()
		->Route($control, $action, $params);

	try{
		// looooooaad!
		MagratheaController::Load($control, $action, $params);
	} catch (Exception $ex) {
		BaseControl::Go404();
	}
?>
