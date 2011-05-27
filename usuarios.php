<?php
/**
 * Controlador do Cadastro de Usuários
 */

require_once("settings/configuration.php");
require_once(PROJECT_PATH."/settings/localization/".PROJECT_LANGUAGE.".php");

require_once(PROJECT_PATH."/library/model/database/Usuario.php");
require_once(PROJECT_PATH."/library/model/access/AccessUsuario.php");

require_once(PROJECT_PATH."/library/view/render/LayoutPage.php");
require_once(PROJECT_PATH."/library/view/render/LayoutMenu.php");
require_once(PROJECT_PATH."/library/view/render/LayoutWindow.php");
require_once(PROJECT_PATH."/library/view/render/LayoutList.php");
//require_once(PROJECT_PATH."/library/view/render/LayoutForm.php");
require_once(PROJECT_PATH."/library/view/render/LayoutHidden.php");
require_once(PROJECT_PATH."/library/view/render/LayoutTextInput.php");
//require_once(PROJECT_PATH."/library/view/render/LayoutDate.php");
require_once(PROJECT_PATH."/library/view/render/LayoutPassword.php");

$fname = "Usuarios()";

$action = isset( $_POST["action"] ) ? $_POST["action"] : ( isset( $_GET["action"] ) ? $_GET["action"] : "" );

$title = LOC_USUARIO_WINDOW_TITLE;

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

/**
 * Função de montagem da Lista de Usuários
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
function createList(){
	$access = new AccessUsuario();
	$access->listAll();
	foreach ($access->getResult() as $item) {
		$list_item[] = array(
			"login" => array( "value" => $item->getUsuario(), "link" => "./usuarios.php?action=view&id=".$item->getIDUsuario() ),
			"name" => array( "value" => $item->getNome() ),
			"email" => array( "value" => $item->getEMail() ),
			"delete" => array( "value" => "X", "link" => "./usuarios.php?action=delete&id=".$item->getIDUsuario() )
		);
	}
	$list_content = new LayoutList(LOC_USUARIO_LIST_TITLE);
	$list_content->addColumn("login", "15%", LOC_USUARIO_COL_LOGIN);
	$list_content->addColumn("name", "35%", LOC_USUARIO_COL_NAME);
	$list_content->addColumn("email", "45%", LOC_USUARIO_COL_EMAIL);
	$list_content->addColumn("delete", "5%", "&nbsp;");
	$list_content->setList($list_item);
	
	return($list_content->getLayout());
}

/**
 * Função de montagem do Formulário de Usuários
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
function createForm( $object = "" ){
	if ($object != "") {
		$form_type = FORM_UPDATE;
		$form_title = LOC_USUARIO_FORM_UPDATE_TITLE;
	} else {
		$form_type = FORM_INSERT;
		$form_title = LOC_USUARIO_FORM_INSERT_TITLE;
		$object = new Usuario();
	}	

	$fields_content = "";
	
	$input_content = new LayoutHidden( "id_usuario", $object->getIDUsuario() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_MEDIUM, true, LOC_USUARIO_LBL_NAME, "nome", $object->getNome() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_MEDIUM, true, LOC_USUARIO_LBL_LOGIN, "usuario", $object->getUsuario() ); $fields_content .= $input_content->getLayout();
//	$input_content = new LayoutDate( FIELD_MEDIUM, false, LOC_USUARIO_LBL_BIRTH, "dt_nascimento", $object->getDataNascimento() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_MEDIUM, false, LOC_USUARIO_LBL_BIRTH, "dt_nascimento", $object->getDataNascimento() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_MEDIUM, true, LOC_USUARIO_LBL_USER_TYPE, "id_tipo_usuario", $object->getIDTipoUsuario() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_LARGE, true, LOC_USUARIO_LBL_EMAIL, "email", $object->getEMail() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutPassword( FIELD_MEDIUM, false, LOC_USUARIO_LBL_PWD_NEW, "senha_nova", $object->getSenhaNova() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutPassword( FIELD_MEDIUM, false, LOC_USUARIO_LBL_PWD_CONF, "senha_confirma", $object->getSenhaConfirma() ); $fields_content .= $input_content->getLayout();
	
//	$form_content = new LayoutForm($form_title, "usuarios.php", $form_type, $fields_content);

//	$permissao_content = createListPermissao();

//	return($form_content->getContent());
	return("<!-- <FORM> -->\n".$fields_content."<!-- </FORM> -->\n");
}
?>
<?php
switch ($action) {
	case "insert":
		$obj_usuario = new Usuario();
		$obj_usuario->setNome(isset( $_POST["nome"] ) ? $_POST["nome"] : "");
		$obj_usuario->setDataNascimento(isset( $_POST["dt_nascimento"] ) ? $_POST["dt_nascimento"] : "");
		$obj_usuario->setIDTipoUsuario(isset( $_POST["id_tipo_usuario"] ) ? $_POST["id_tipo_usuario"] : "");
		$obj_usuario->setEMail(isset( $_POST["email"] ) ? $_POST["email"] : "");
		$obj_usuario->setUsuario(isset( $_POST["usuario"] ) ? $_POST["usuario"] : "");
		$obj_usuario->setSenhaNova(isset( $_POST["senha_nova"] ) ? $_POST["senha_nova"] : "");
		$obj_usuario->setSenhaConfirma(isset( $_POST["senha_confirma"] ) ? $_POST["senha_confirma"] : "");

		$access_usuario = new AccessUsuario();
		$access_usuario->insertItem($obj_usuario);
		$obj_usuario->setIDUsuario($access_usuario->getResult());

		$html_content = createForm($obj_usuario);
		break;
	case "update":
		$obj_usuario = new Usuario();
		$obj_usuario->setIDUsuario(isset( $_POST["id_usuario"] ) ? $_POST["id_usuario"] : "");
		$obj_usuario->setNome(isset( $_POST["nome"] ) ? $_POST["nome"] : "");
		$obj_usuario->setDataNascimento(isset( $_POST["dt_nascimento"] ) ? $_POST["dt_nascimento"] : "");
		$obj_usuario->setIDTipoUsuario(isset( $_POST["id_tipo_usuario"] ) ? $_POST["id_tipo_usuario"] : "");
		$obj_usuario->setEMail(isset( $_POST["email"] ) ? $_POST["email"] : "");
		$obj_usuario->setUsuario(isset( $_POST["usuario"] ) ? $_POST["usuario"] : "");
		$obj_usuario->setSenhaNova(isset( $_POST["senha_nova"] ) ? $_POST["senha_nova"] : "");
		$obj_usuario->setSenhaConfirma(isset( $_POST["senha_confirma"] ) ? $_POST["senha_confirma"] : "");

		$access_usuario = new AccessUsuario();
		$access_usuario->updateItem($obj_usuario);
		
		$html_content = createForm($obj_usuario);
		break;
	case "delete":
		$access_usuario = new AccessUsuario();
		$access_usuario->deleteItem(isset( $_GET["id"] ) ? $_GET["id"] : "");
		
		$html_content = createList();
		break;
	case "view":
		$access_usuario = new AccessUsuario();
		$access_usuario->find(isset( $_GET["id"] ) ? $_GET["id"] : "");
		
		$html_content = createForm($access_usuario->getResult());
		break;
	case "new":
		$html_content = createForm();
		break;
	case "list":
	default:
		$html_content = createList();
}

$window_content = new LayoutWindow($title, $html_content);
$menu_content = new LayoutMenu();
$page_content = new LayoutPage($title, $array_script, $array_stylesheet, $menu_content->getLayout().$window_content->getLayout());

$page_content->getHeaders();
echo($page_content->getLayout());
?>