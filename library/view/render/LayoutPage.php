<?php
/**
 * Layout Web para Página padrão.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");

/**
 * Classe contendo o Layout Web externo da página.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutPage extends AbstractLayout {
	private $title;
	private $scripts;
	private $stylesheets;
	
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
	function __construct( $p_title, $p_scripts, $p_stylesheets, $p_content = "" ) {
		$fname = "constructObject()";

		$this->setTitle(PROJECT_NAME." - ".$p_title);
		$this->setScripts($p_scripts);
		$this->setStyleSheets($p_stylesheets);

		parent::__construct($p_content);
	}

	/**
	 * Define o Layout da Página
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string  = "";
		$this->layout_string .= "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n";
		$this->layout_string .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"\n";
		$this->layout_string .= "  \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
		$this->layout_string .= "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"pt\" lang=\"pt\">\n";
		$this->layout_string .= "  <head>\n";
		$this->layout_string .= "    <title>".$this->getTitle()."</title>\n";
		$this->layout_string .= "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\n";
		$this->layout_string .= "    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=7\" />\n";
		$this->layout_string .= "    <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js\"></script>\n";
		
		foreach ( $this->scripts as $name )
			$this->layout_string .= "    <script type=\"text/javascript\" src=\"".$name."\"></script>\n";
		
		foreach ( $this->stylesheets as $name )
			$this->layout_string .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"".$name."\" media=\"screen\" />\n";

		$this->layout_string .= "  </head>\n";
		$this->layout_string .= "  <body>\n";
		$this->layout_string .= "    <!-- <BACKGROUND> -->\n";
		$this->layout_string .= "    <script type=\"text/javascript\" charset=\"utf-8\">\n";
		$this->layout_string .= "      \$(function() {\n";
		$this->layout_string .= "        \$('#gradientSky').gradient({ from: '052041', to: '00BAFF', direction: 'horizontal' });\n";
		$this->layout_string .= "        \$('#gradientFloor').gradient({ from: '8BC132', to: '1F3F02', direction: 'horizontal' });\n";
		$this->layout_string .= "      });\n";
		$this->layout_string .= "    </script>\n";
		$this->layout_string .= "    <div id=\"gradientSky\" class=\"sky\">\n";
		$this->layout_string .= "      <img class=\"horizon\" alt=\"\" src=\"drawable/horizon.png\" />\n";
		$this->layout_string .= "      <img class=\"sun\" alt=\"\" src=\"drawable/sun.png\" />\n";
		$this->layout_string .= "    </div>\n";
		$this->layout_string .= "    <div id=\"gradientFloor\" class=\"floor\"></div>\n";
		$this->layout_string .= "    <img class=\"logo\" alt=\"\" src=\"drawable/logo.png\" />\n";
		$this->layout_string .= "    <img class=\"grass01\" alt=\"\" src=\"drawable/grass/01.png\" />\n";
		$this->layout_string .= "    <img class=\"grass02\" alt=\"\" src=\"drawable/grass/02.png\" />\n";
		$this->layout_string .= "    <img class=\"grass03\" alt=\"\" src=\"drawable/grass/03.png\" />\n";
		$this->layout_string .= "    <img class=\"grass04\" alt=\"\" src=\"drawable/grass/04.png\" />\n";
		$this->layout_string .= "    <!-- </BACKGROUND> -->\n";
		$this->layout_string .= $this->getContent()."\n";
		$this->layout_string .= "  </body>\n";
		$this->layout_string .= "</html>";
	}

	/**
	 * Define o Título da Página
	 * 
	 * @param $value Título da Página
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setTitle( $p_value ) {
		$this->title = $p_value;
	}
	
	/**
	 * Define os Estilos da Página
	 * 
	 * @param $value Estilos da Página
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setStyleSheets( $p_value ) {
		$this->stylesheets = $p_value;
	}
	
	/**
	 * Define oss Scripts da Página
	 * 
	 * @param $value Scripts da Página
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setScripts( $p_value ) {
		$this->scripts = $p_value;
	}
	
	/**
	 * Obtem o Título da Página
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getTitle() {
		return($this->title);
	}

	/**
	 * Obtem os Estilos da Página
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getStyleSheets() {
		return($this->stylesheets);
	}

	/**
	 * Obtem os Scripts da Página
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getScripts() {
		return($this->scripts);
	}

	/**
	 * Obtem os Headers para a Página
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getHeaders() {
		header( "Expires: Sat, 26 Jul 1997 05:00:00 GMT" ); 
		header( "Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . " GMT" ); 
		header( "Cache-Control: no-store, no-cache, must-revalidate" ); 
		header( "Cache-Control: post-check=0, pre-check=0", false ); 
		header( "Pragma: no-cache" );
		header( "Content-Type: text/html; charset=iso-8859-1" );
	}
}
?>