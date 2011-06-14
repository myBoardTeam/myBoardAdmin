<?php
/**
 * Controlador do Menu Principal (DashBoard)
 */

require_once("settings/configuration.php");
require_once(PROJECT_PATH."/settings/localization/".PROJECT_LANGUAGE.".php");

require_once(PROJECT_PATH."/library/model/access/AccessUsuario.php");
require_once(PROJECT_PATH."/library/model/access/AccessPermissao.php");

require_once(PROJECT_PATH."/library/view/render/LayoutPage.php");
require_once(PROJECT_PATH."/library/view/render/LayoutMenu.php");
require_once(PROJECT_PATH."/library/view/render/LayoutPopup.php");
require_once(PROJECT_PATH."/library/view/render/LayoutForm.php");
require_once(PROJECT_PATH."/library/view/render/LayoutTextInput.php");
require_once(PROJECT_PATH."/library/view/render/LayoutPassword.php");
require_once(PROJECT_PATH."/library/view/render/LayoutButton.php");


$fname = "DashBoard()";

$action = isset( $_POST["action"] ) ? $_POST["action"] : ( isset( $_GET["action"] ) ? $_GET["action"] : "" );

$array_stylesheet = array(
	"styles/general.css",
	"styles/component.visual.sky.css",
	"styles/component.visual.floor.css",
	"styles/component.interactive.topmenu.css",
	"styles/component.interactive.dashboard.css",
	"styles/component.interactive.popup.css",
	"styles/component.interactive.form.input.css",
	"styles/component.interactive.form.button.css",
);

$array_script = array(
	"scripts/jquery.gradient.js",
	"scripts/jquery.borderImage.js",
	"scripts/jquery.customInput.js"
);

/**
 * Função de montagem do Formulário de Login
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
function createForm( $name, $object = "" ){
	$form_type = FORM_LOGIN;
	$fields_content = "";
	
	$input_content = new LayoutTextInput( FIELD_LARGE, true, false, LOC_LOGIN_LBL_LOGIN, "login", "" ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutPassword( FIELD_LARGE, false, false, LOC_LOGIN_LBL_PWD, "senha", "" ); $fields_content .= $input_content->getLayout();
	
	$form_content = new LayoutForm( false, "./index.php", $name, $form_type, "javascript:submit".$name."()", "./index.php", $fields_content );

	return($form_content->getLayout());
}

/**
 * Função de Construção das Permissões
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
function buildPermissions( $user_id ) {
	$access = new AccessPermissao();
	$access->listUser( $user_id );
	
	foreach ( $access->getResult() as $item )
		setcookie("permission_".$item->getNome(), $item->getNivel());
}


/**
 * Função de Exclusão das Permissões
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
function destroyPermissions() {
	setcookie("logged", "");
	setcookie("user_id", "");
	setcookie("user_name", "");

	$access = new AccessPermissao();
	$access->listAll();
	
	foreach ( $access->getResult() as $item )
		setcookie("permission_".$item->getNome(), "");
}
?>
<?php
switch ($action) {
	case "logout":
		destroyPermissions();
		header("Location: ".PROJECT_ADDRESS."/index.php");
		exit;
	case "login":
		$access = new AccessUsuario();
		if ( $access->checkLogin($_POST["login"], $_POST["senha"]) ) {
			$object = $access->getResult();
			setcookie("logged", true);
			setcookie("user_id", $object->getIDUsuario());
			setcookie("user_name", $object->getNome());
			buildPermissions( $object->getIDUsuario() );
		} else {
			destroyPermissions();
		}
		header("Location: ".PROJECT_ADDRESS."/index.php");
		exit;
	default:
		if ( !isset($_COOKIE["logged"] ) ) {
			destroyPermissions();
		} elseif ( $_COOKIE["permission_admin"] < PERM_LEVEL_ACCESS) {
			destroyPermissions();
			header("Location: ".PROJECT_ADDRESS."/index.php");
			exit;	
		}
}

if ( isset($_COOKIE["logged"] ) && $_COOKIE["permission_admin"] >= PERM_LEVEL_ACCESS  ) {
	$title = LOC_DASHBOARD_TITLE;

	$menu_content = new LayoutMenu();
	$page_content = new LayoutPage($title, $array_script, $array_stylesheet, $menu_content->getLayout());
} else {
	$title = LOC_LOGIN_TITLE;
	
	$html_content = createForm("FormLogin");
	$popup_content = new LayoutPopup($title, $html_content);
	$page_content = new LayoutPage($title, $array_script, $array_stylesheet, $popup_content->getLayout());
}

$page_content->getHeaders();
echo($page_content->getLayout());
?>
