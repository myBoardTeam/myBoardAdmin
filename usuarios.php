<?php
/**
 * Controlador do Cadastro de Usuários
 */

require_once("settings/configuration.php");
require_once(PROJECT_PATH."/settings/localization/".PROJECT_LANGUAGE.".php");

require_once(PROJECT_PATH."/library/model/database/Usuario.php");
require_once(PROJECT_PATH."/library/model/access/AccessUsuario.php");
require_once(PROJECT_PATH."/library/model/access/AccessPermissao.php");

require_once(PROJECT_PATH."/library/view/render/LayoutPage.php");
require_once(PROJECT_PATH."/library/view/render/LayoutMenu.php");
require_once(PROJECT_PATH."/library/view/render/LayoutWindow.php");
require_once(PROJECT_PATH."/library/view/render/LayoutList.php");
require_once(PROJECT_PATH."/library/view/render/LayoutForm.php");
require_once(PROJECT_PATH."/library/view/render/LayoutHidden.php");
require_once(PROJECT_PATH."/library/view/render/LayoutTextInput.php");
//require_once(PROJECT_PATH."/library/view/render/LayoutDate.php");
require_once(PROJECT_PATH."/library/view/render/LayoutRadioButton.php");
require_once(PROJECT_PATH."/library/view/render/LayoutPassword.php");
require_once(PROJECT_PATH."/library/view/render/LayoutButton.php");

$fname = "Usuarios()";

$action = isset( $_POST["action"] ) ? $_POST["action"] : ( isset( $_GET["action"] ) ? $_GET["action"] : "" );

$title = LOC_USUARIO_WINDOW_TITLE;

$array_stylesheet = array(
	"styles/general.css",
	"styles/component.visual.sky.css",
	"styles/component.visual.floor.css",
	"styles/component.interactive.topmenu.css",
	"styles/component.interactive.menu.css",
	"styles/component.interactive.window.css",
	"styles/component.interactive.list.css",
	"styles/component.interactive.form.input.css",
	"styles/component.interactive.form.textarea.css",
	"styles/component.interactive.form.checkbox.css",
	"styles/component.interactive.form.radiobutton.css",
	"styles/component.interactive.form.button.css",
	"styles/external/jquery.jscrollpane.css"
);

$array_script = array(
	"scripts/jquery.gradient.js",
	"scripts/jquery.borderImage.js",
	"scripts/jquery.mousewheel.js",
	"scripts/jquery.jscrollpane.js"
);

/**
 * Função de montagem da Lista de Usuários
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
function createList(){
	if ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_INSERT )
		$button = new LayoutButton( false, LOC_USUARIO_BTN_INSERT, "./usuarios.php?action=new" );

	$access = new AccessUsuario();
	$access->listAll();
	foreach ($access->getResult() as $item) {
		$list_item[] = array(
			"login" => ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_VIEW ) ? array( "value" => $item->getUsuario(), "link" => "./usuarios.php?action=view&id=".$item->getIDUsuario() ) : array( "value" => $item->getUsuario() ),
			"name" => array( "value" => $item->getNome() ),
			"email" => array( "value" => $item->getEMail() ),
			"delete" => ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_DELETE ) ? array( "value" => "X", "link" => "./usuarios.php?action=delete&id=".$item->getIDUsuario() ) : array( "value" => "&nbsp;" )
		);
	}
	$list_content = new LayoutList();
	$list_content->addColumn("login", "17%", LOC_USUARIO_COL_LOGIN);
	$list_content->addColumn("name", "35%", LOC_USUARIO_COL_NAME);
	$list_content->addColumn("email", "45%", LOC_USUARIO_COL_EMAIL);
	$list_content->addColumn("delete", "3%", "&nbsp;");
	$list_content->setList($list_item);

	if ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_INSERT )
		return($button->getLayout().$list_content->getLayout());
	else
		return($list_content->getLayout());
}

/**
 * Função de montagem do Formulário de Usuários
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
function createForm( $name, $object = "" ){
	if ($object != "") {
		$form_type = FORM_UPDATE;
		$form_perm_level = ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true;
	} else {
		$form_type = FORM_INSERT;
		$form_perm_level = ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_INSERT ) ? false : true;
		$object = new Usuario();
	}	

	$fields_content = "";
	
	$input_content = new LayoutHidden( "id_usuario", $object->getIDUsuario() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_MEDIUM, true, ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, LOC_USUARIO_LBL_NAME, "nome", $object->getNome() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_MEDIUM, true, ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, LOC_USUARIO_LBL_LOGIN, "usuario", $object->getUsuario() ); $fields_content .= $input_content->getLayout();
//	$input_content = new LayoutDate( FIELD_MEDIUM, false, ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, LOC_USUARIO_LBL_BIRTH, "dt_nascimento", $object->getDataNascimento() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_MEDIUM, false, ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, LOC_USUARIO_LBL_BIRTH, "dt_nascimento", $object->getDataNascimento() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_MEDIUM, true, ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, LOC_USUARIO_LBL_USER_TYPE, "id_tipo_usuario", $object->getIDTipoUsuario() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutTextInput( FIELD_LARGE, true, ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, LOC_USUARIO_LBL_EMAIL, "email", $object->getEMail() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutPassword( FIELD_MEDIUM, false, ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, LOC_USUARIO_LBL_PWD_NEW, "senha_nova", $object->getSenhaNova() ); $fields_content .= $input_content->getLayout();
	$input_content = new LayoutPassword( FIELD_MEDIUM, false, ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, LOC_USUARIO_LBL_PWD_CONF, "senha_confirma", $object->getSenhaConfirma() ); $fields_content .= $input_content->getLayout();
	
	$access = new AccessPermissao();
	if ( $form_type == FORM_UPDATE ) $access->listUser( $object->getIDUsuario() );
	else $access->listAll();
	foreach ($access->getResult() as $item) {
		$radio_none = new LayoutRadioButton( ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, "", "user_permission[".$item->getIDPermissao()."]", ($item->getNivel() == PERM_LEVEL_DENIED)? true : false,  PERM_LEVEL_DENIED );
		$radio_access = new LayoutRadioButton( ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) ? false : true, "", "user_permission[".$item->getIDPermissao()."]", ($item->getNivel() == PERM_LEVEL_ACCESS)? true : false, PERM_LEVEL_ACCESS );
		$radio_list = new LayoutRadioButton( ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE && $item->getTipo() == PERM_TYPE_KEEP ) ? false : true, "", "user_permission[".$item->getIDPermissao()."]", ($item->getNivel() == PERM_LEVEL_KEEP_LIST)? true : false, PERM_LEVEL_KEEP_LIST );
		$radio_view = new LayoutRadioButton( ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE && $item->getTipo() == PERM_TYPE_KEEP ) ? false : true, "", "user_permission[".$item->getIDPermissao()."]", ($item->getNivel() == PERM_LEVEL_KEEP_VIEW)? true : false, PERM_LEVEL_KEEP_VIEW );
		$radio_update = new LayoutRadioButton( ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE && $item->getTipo() == PERM_TYPE_KEEP ) ? false : true, "", "user_permission[".$item->getIDPermissao()."]", ($item->getNivel() == PERM_LEVEL_KEEP_UPDATE)? true : false, PERM_LEVEL_KEEP_UPDATE );
		$radio_insert = new LayoutRadioButton( ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE && $item->getTipo() == PERM_TYPE_KEEP ) ? false : true, "", "user_permission[".$item->getIDPermissao()."]", ($item->getNivel() == PERM_LEVEL_KEEP_INSERT)? true : false, PERM_LEVEL_KEEP_INSERT );
		$radio_delete = new LayoutRadioButton( ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE && $item->getTipo() == PERM_TYPE_KEEP ) ? false : true, "", "user_permission[".$item->getIDPermissao()."]", ($item->getNivel() == PERM_LEVEL_KEEP_DELETE)? true : false, PERM_LEVEL_KEEP_DELETE );
		$list_item[] = array(
			"descricao" => array( "value" => $item->getDescricao() ),
			"none" => array( "value" => $radio_none->getLayout() ),
			"access" => array( "value" => $radio_access->getLayout() ),
			"list" => array( "value" => $radio_list->getLayout() ),
			"view" => array( "value" => $radio_view->getLayout() ),
			"update" => array( "value" => $radio_update->getLayout() ),
			"insert" => array( "value" => $radio_insert->getLayout() ),
			"delete" => array( "value" => $radio_delete->getLayout() )
		);
	}
	$list_content = new LayoutList(LOC_PERMISSAO_LIST_TITLE);
	$list_content->addColumn("descricao", "44%", LOC_PERMISSAO_COL_DESCRICAO);
	$list_content->addColumn("none", "8%", LOC_PERMISSAO_COL_NONE);
	$list_content->addColumn("access", "8%", LOC_PERMISSAO_COL_ACCESS);
	$list_content->addColumn("list", "8%", LOC_PERMISSAO_COL_LIST);
	$list_content->addColumn("view", "8%", LOC_PERMISSAO_COL_VIEW);
	$list_content->addColumn("update", "8%", LOC_PERMISSAO_COL_UPDATE);
	$list_content->addColumn("insert", "8%", LOC_PERMISSAO_COL_INSERT);
	$list_content->addColumn("delete", "8%", LOC_PERMISSAO_COL_DELETE);
	$list_content->setList($list_item);

	$fields_content .= $list_content->getLayout();
	
	$form_content = new LayoutForm( $form_perm_level, "./usuarios.php", $name, $form_type, "javascript:submit".$name."()", "./usuarios.php", $fields_content );

	return($form_content->getLayout());
}
?>
<?php
if ( isset($_COOKIE["logged"] ) && $_COOKIE["permission_admin"] >= PERM_LEVEL_ACCESS ) {
	switch ($action) {
		case "insert":
			if ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_INSERT ) {
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
				
				$obj_usuario->setSenhaNova("");
				$obj_usuario->setSenhaConfirma("");
		
				$access_permissao = new AccessPermissao();
				foreach ( $_POST["user_permission"] as $key => $value )
					if ( $value > 0 ) $access_permissao->refreshUsuarioPermissao($obj_usuario->getIDUsuario(), $key, $value);

				$subtitle = LOC_USUARIO_FORM_UPDATE_TITLE;
				$html_content = createForm("FormUsuario", $obj_usuario);
			} else { header("Location: ".PROJECT_ADDRESS."/usuarios.php"); exit; }
			break;
		case "update":
			if ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_UPDATE ) {
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
		
				$obj_usuario->setSenhaNova("");
				$obj_usuario->setSenhaConfirma("");
				
				$access_permissao = new AccessPermissao();
				$access_permissao->clearUsuarioPermissao($obj_usuario->getIDUsuario());
				foreach ( $_POST["user_permission"] as $key => $value )
					if ( $value > 0 ) $access_permissao->refreshUsuarioPermissao($obj_usuario->getIDUsuario(), $key, $value);

				$subtitle = LOC_USUARIO_FORM_UPDATE_TITLE;
				$html_content = createForm("FormUsuario", $obj_usuario);
			} else { header("Location: ".PROJECT_ADDRESS."/usuarios.php"); exit; }
			break;
		case "delete":
			if ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_DELETE ) {
				$access_usuario = new AccessUsuario();
				$access_usuario->deleteItem(isset( $_GET["id"] ) ? $_GET["id"] : "");
				
				$subtitle = LOC_USUARIO_LIST_TITLE;
				$html_content = createList();
			} else { header("Location: ".PROJECT_ADDRESS."/usuarios.php"); exit; }
			break;
		case "view":
			if ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_VIEW ) {
				$access_usuario = new AccessUsuario();
				$access_usuario->find(isset( $_GET["id"] ) ? $_GET["id"] : "");
				
				$subtitle = LOC_USUARIO_FORM_UPDATE_TITLE;
				$html_content = createForm("FormUsuario", $access_usuario->getResult());
			} else { header("Location: ".PROJECT_ADDRESS."/usuarios.php"); exit; }
			break;
		case "new":
			if ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_INSERT ) {
				$subtitle = LOC_USUARIO_FORM_INSERT_TITLE;
				$html_content = createForm("FormUsuario");
			} else { header("Location: ".PROJECT_ADDRESS."/usuarios.php"); exit; }
			break;
		case "list":
		default:
			if ( $_COOKIE["permission_usuarios"] >= PERM_LEVEL_KEEP_LIST ) {
				$subtitle = LOC_USUARIO_LIST_TITLE;
				$html_content = createList();
			} else { header("Location: ".PROJECT_ADDRESS."/usuarios.php"); exit; }
	}

	$window_content = new LayoutWindow($title.(($subtitle != "")? " - ".$subtitle : ""), $html_content);
	$menu_content = new LayoutMenu();
	$page_content = new LayoutPage($title.(($subtitle != "")? " - ".$subtitle : ""), $array_script, $array_stylesheet, $menu_content->getLayout().$window_content->getLayout());
	$page_content->getHeaders();
	echo($page_content->getLayout());
} else {
	header("Location: ".PROJECT_ADDRESS."/index.php");
}
?>