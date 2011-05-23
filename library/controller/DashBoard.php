<?php
/**
 * Controlador do Menu Principal (DashBoard)
 */

require_once("../../settings/Configuration.php");
require_once(PROJECT_PATH."/library/util/AbstractMessageLog.php");
require_once(PROJECT_PATH."/library/view/render/LayoutPage.php");

$fname = "DashBoard()";

$action = isset( $_POST["action"] ) ? $_POST["action"] : ( isset( $_GET["action"] ) ? $_GET["action"] : "" );

$title = "Dashboard";

$array_stylesheet = array(
    "styles/general.css",
    "styles/component.visual.sky.css",
    "styles/component.visual.floor.css",
    "styles/component.interactive.dashboard.css"
);

$array_script = array(
	"scripts/jquery.gradient.js"
);

$page_content = new LayoutMenu();
$page_content = new LayoutPage($title, $array_script, $array_stylesheet, $menu_content->getLayout());
echo($page_content->getLayout());
?>
