<?php
/**
 * Controlador do Cadastro de Usuários
 */

require_once("settings/configuration.php");
require_once(PROJECT_PATH."/settings/localization/".PROJECT_LANGUAGE.".php");
require_once(PROJECT_PATH."/library/util/AbstractMessageLog.php");
require_once(PROJECT_PATH."/library/view/render/LayoutPage.php");
require_once(PROJECT_PATH."/library/view/render/LayoutMenu.php");
require_once(PROJECT_PATH."/library/view/render/LayoutWindow.php");

$fname = "Perfis()";

$action = isset( $_POST["action"] ) ? $_POST["action"] : ( isset( $_GET["action"] ) ? $_GET["action"] : "" );

$title = LOC_PERFIL_WINDOW_TITLE;

$array_stylesheet = array(
	"styles/general.css",
	"styles/component.visual.sky.css",
	"styles/component.visual.floor.css",
	"styles/component.interactive.menu.css",
	"styles/component.interactive.window.css",
	"styles/component.interactive.form.input.css",
	"styles/component.interactive.form.textarea.css",
	"styles/component.interactive.form.checkbox.css",
	"styles/component.interactive.form.radiobutton.css",
	"styles/external/jquery.jscrollpane.css"
);

$array_script = array(
	"scripts/jquery.gradient.js",
	"scripts/jquery.borderImage.js",
	"scripts/jquery.mousewheel.js",
	"scripts/jquery.jscrollpane.js",
	"scripts/jquery.customInput.js"
);
		
$window_content = new LayoutWindow($title, "");
$menu_content = new LayoutMenu();
$page_content = new LayoutPage($title, $array_script, $array_stylesheet, $menu_content->getLayout().$window_content->getLayout());

$page_content->getHeaders();
echo($page_content->getLayout());
?>
