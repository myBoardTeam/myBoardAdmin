<?php
/**
 * Layout do Botão.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");

/**
 * Classe contendo o Layout do Botão.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutButton extends AbstractLayout {
	protected $label;
		
	/**
	 * Construtor da Classe
	 * 
	 * @param $p_size Tamanho do Campo
	 * @param $p_required Informa se o campo é obrigatório (true, false)
	 * @param $p_label Label do Campo
	 * @param $p_name Nome do Campo
	 * @param $p_value Valor do Campo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_label, $p_value = "" ) {
		$fname = "constructObject()";

		$this->setLabel($p_label);

		parent::__construct($p_value);
	}

	/**
	 * Define o Layout do Botão
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string  = "";
		$this->layout_string .= "<!-- <BUTTON> -->\n";
		$this->layout_string .= "<script type=\"text/javascript\" charset=\"utf-8\">\n";
		$this->layout_string .= "  \$(function() {\n";
		$this->layout_string .= "    \$('.button').borderImage( 'url(\"drawable/form/button/normal.png\") 15 20 20 15 stretch stretch' );\n";
		$this->layout_string .= "    \$('.button').hover( function(){ \$(this).borderImage( 'url(\"drawable/form/button/selected.png\") 15 20 20 15 stretch stretch' ); }, function(){ \$(this).borderImage( 'url(\"drawable/form/button/normal.png\") 15 20 20 15 stretch stretch' ); } );\n";
		$this->layout_string .= "  });\n";
		$this->layout_string .= "</script>\n";
		$this->layout_string .= "<a href=\"".$this->getContent()."\"><div class=\"button\"><b>".$this->getLabel()."</b></div></a>\n";
		$this->layout_string .= "<!-- </BUTTON> -->\n";
	}

	/**
	 * Define o Label do Botão
	 * 
	 * @param $p_value Label do Botão
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLabel( $p_value ) {
		$this->label = $p_value;
	}

	/**
	 * Obtem o Label do Botão
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getLabel() {
		return($this->label);
	}
}
?>