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
	 * @param $t Titulo da Página
	 * @param $scr Lista de Scripts para a Página
	 * @param $css Lista de Estilos para a Página
	 * @param $c Conteúdo a ser incluído na Página
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
	 * Define o Título da Janela
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