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
	protected $disabled;
	protected $label;
		
	/**
	 * Construtor da Classe
	 * 
	 * @param $p_disabled Informa está ou não desabilitado (true, false)
	 * @param $p_label Label do Campo
	 * @param $p_value Valor do Campo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_disabled, $p_label, $p_value = "" ) {
		$fname = "constructObject()";

		$this->setDisabled($p_disabled);
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
		
		if ( $this->getDisabled() )
			$this->layout_string .= "<div class=\"button\"><b>".$this->getLabel()."</b></div>\n";
		else
			$this->layout_string .= "<a href=\"".$this->getContent()."\"><div class=\"button\"><b>".$this->getLabel()."</b></div></a>\n";
			
		$this->layout_string .= "<!-- </BUTTON> -->\n";
	}

	/**
	 * Define se o Botão estará habilitado ou desabilitado
	 * 
	 * @param $p_value Status
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDisabled( $p_value ) {
		$this->disabled = $p_value;
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
	 * Verifica se o Botão estará habilitado ou desabilitado
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function getDisabled() {
		return($this->disabled);
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