<?php
/**
 * Layout da Janela.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");

/**
 * Classe contendo o Layout da Janela.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutWindow extends AbstractLayout {
	private $title;
	
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
	function __construct( $t, $c = "" ) {
		$fname = "constructObject()";

		$this->setTitle($t);

		parent::__construct($c);
	}

	/**
	 * Define o Layout da Janela
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string .= "";
		$this->layout_string .= "<!-- <WINDOW> -->\n";
		$this->layout_string .= "<script type=\"text/javascript\" charset=\"utf-8\">\n";
		$this->layout_string .= "  \$(function() {\n";
		$this->layout_string .= "    \$('#closeWindow').hover( function(){ \$(this).attr( \"src\", \"drawable/window/close/pressed.png\"); }, function(){ \$(this).attr( \"src\", \"drawable/window/close/normal.png\"); } );\n";
		$this->layout_string .= "    \$('#formWindow').borderImage( 'url(\"drawable/window/background.png\") 25 50 50 50 stretch stretch' );\n";
		$this->layout_string .= "    \$('#scrollPane').each(\n";
		$this->layout_string .= "      function() {\n";
		$this->layout_string .= "        \$(this).jScrollPane();\n";
		$this->layout_string .= "        var api = \$(this).data('jsp');\n";
		$this->layout_string .= "        var throttleTimeout;\n";
		$this->layout_string .= "        \$(window).bind( 'resize',\n";
		$this->layout_string .= "          function() {\n";
		$this->layout_string .= "            if (\$.browser.msie) {\n";
		$this->layout_string .= "              if (!throttleTimeout) {\n";
		$this->layout_string .= "                throttleTimeout = setTimeout( function() { api.reinitialise(); throttleTimeout = null; }, 50 );\n";
		$this->layout_string .= "              }\n";
		$this->layout_string .= "            } else { api.reinitialise(); }\n";
		$this->layout_string .= "          }\n";
		$this->layout_string .= "        );\n";
		$this->layout_string .= "      }\n";
		$this->layout_string .= "    );\n";
		$this->layout_string .= "  });\n";
		$this->layout_string .= "</script>\n";
		$this->layout_string .= "<div class=\"windowHeader\">\n";
		$this->layout_string .= "  <div class=\"windowTitle\">".$this->getTitle()."</div>\n";
		$this->layout_string .= "  <a href=\"index.php\"><img id=\"closeWindow\" class=\"cornerButton\" alt=\"Fechar Janela\" src=\"drawable/window/close/normal.png\" /></a>\n";
		$this->layout_string .= "</div>\n";
		$this->layout_string .= "<div id=\"formWindow\" class=\"windowBackground\">\n";
		$this->layout_string .= "  <div id=\"scrollPane\" class=\"windowContent\">\n";
		$this->layout_string .=  $this->getContent()."\n";
		$this->layout_string .= "  </div>\n";
		$this->layout_string .= "</div>\n";
		$this->layout_string .= "<!-- </WINDOW> -->\n";
	}

	/**
	 * Define o Título da Janela
	 * 
	 * @param $value Título da Página
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setTitle( $value ) {
		$this->title = $value;
	}
	
	/**
	 * Obtem o Título da Janela
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getTitle() {
		return($this->title);
	}
}
?>