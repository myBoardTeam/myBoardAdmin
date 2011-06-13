<?php
/**
 * Layout do Popup.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");

/**
 * Classe contendo o Layout do Popup.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutPopup extends AbstractLayout {
	private $title;
	
	/**
	 * Construtor da Classe
	 * 
	 * @param $t Titulo da P�gina
	 * @param $scr Lista de Scripts para a P�gina
	 * @param $css Lista de Estilos para a P�gina
	 * @param $c Conte�do a ser inclu�do na P�gina
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_title, $p_content = "" ) {
		$fname = "constructObject()";

		$this->setTitle($p_title);

		parent::__construct($p_content);
	}

	/**
	 * Define o Layout do Popup
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string .= "";
		$this->layout_string .= "<!-- <POPUP> -->\n";
		$this->layout_string .= "<div class=\"popupOverlay\"></div>\n";
		$this->layout_string .= "<div class=\"popupBackground\">\n";
		$this->layout_string .=  $this->getContent()."\n";
		$this->layout_string .= "</div>\n";
		$this->layout_string .= "<!-- </POPUP> -->\n";
	}

	/**
	 * Define o T�tulo da Janela
	 * 
	 * @param $value T�tulo da P�gina
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setTitle( $p_value ) {
		$this->title = $p_value;
	}
	
	/**
	 * Obtem o T�tulo da Janela
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