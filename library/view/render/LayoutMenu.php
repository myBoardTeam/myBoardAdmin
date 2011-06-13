<?php
/**
 * Layout do Menu.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");
require_once(PROJECT_PATH."/library/model/access/AccessUsuario.php");

/**
 * Classe contendo o Layout do Menu.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutMenu extends AbstractLayout {

	/**
	 * Construtor da Classe
	 * 
	 * @param $t Titulo da Página
	 * @param $scr Lista de Scripts para a Página
	 * @param $css Lista de Estilos para a Página
	 * @param $c Conteúdo a ser incluído na Página
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct() {
		$fname = "constructObject()";
		$this->setLayout();
	}

	/**
	 * Define o Layout do Menu
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		global $_COOKIE;
		
		$fname = "setLayout()";

		$this->layout_string  = "";
		$this->layout_string .= "    <!-- <DASHBOARD> -->\n";
		if ( isset($_COOKIE["logged"]) && isset($_COOKIE["user_name"]) ) {
			$this->layout_string .= "    <div class=\"topOverlay\"></div>\n";
			$this->layout_string .= "    <div class=\"topMenu\">\n";
			$this->layout_string .= "      ".LOC_LOGIN_LBL_HELLO.", <b>".$_COOKIE["user_name"]."</b> [<a href=\"index.php?action=logout\">".LOC_LOGIN_LBL_LOGOUT."</a>]\n";
			$this->layout_string .= "    </div>\n";
		}
		$this->layout_string .= "    <div class=\"menu\">\n";
		$this->layout_string .= "      <script type=\"text/javascript\" charset=\"utf-8\">\n";
		$this->layout_string .= "        \$(function() {\n";
		$this->layout_string .= "          \$('#tileUsuarios').hover( function(){ \$(this).attr( \"src\", \"drawable/tiles/usuarios/pressed.png\"); }, function(){ \$(this).attr( \"src\", \"drawable/tiles/usuarios/normal.png\"); } );\n";
		$this->layout_string .= "          \$('#tilePerfis').hover( function(){ \$(this).attr( \"src\", \"drawable/tiles/perfis/pressed.png\"); }, function(){ \$(this).attr( \"src\", \"drawable/tiles/perfis/normal.png\"); } );\n";
		$this->layout_string .= "          \$('#tileMaterias').hover( function(){ \$(this).attr( \"src\", \"drawable/tiles/materias/pressed.png\"); }, function(){ \$(this).attr( \"src\", \"drawable/tiles/materias/normal.png\"); } );\n";
		$this->layout_string .= "          \$('#tileFerramentas').hover( function(){ \$(this).attr( \"src\", \"drawable/tiles/ferramentas/pressed.png\"); }, function(){ \$(this).attr( \"src\", \"drawable/tiles/ferramentas/normal.png\"); } );\n";
		$this->layout_string .= "        });\n";
		$this->layout_string .= "      </script>\n";
		$this->layout_string .= "      <a href=\"usuarios.php\"><img id=\"tileUsuarios\" class=\"item\" alt=\"Usuários\" src=\"drawable/tiles/usuarios/normal.png\" /></a>\n";
		$this->layout_string .= "      <a href=\"perfis.php\"><img id=\"tilePerfis\" class=\"item\" alt=\"Perfis\" src=\"drawable/tiles/perfis/normal.png\" /></a>\n";
		$this->layout_string .= "      <a href=\"materias.php\"><img id=\"tileMaterias\" class=\"item\" alt=\"Matérias\" src=\"drawable/tiles/materias/normal.png\" /></a>\n";
		$this->layout_string .= "      <a href=\"ferramentas.php\"><img id=\"tileFerramentas\" class=\"item\" alt=\"Ferramentas\" src=\"drawable/tiles/ferramentas/normal.png\" /></a>\n";
		$this->layout_string .= "    </div>\n";
		$this->layout_string .= "    <!-- </DASHBOARD> -->\n";
	}
}
?>