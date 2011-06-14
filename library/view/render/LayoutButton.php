<?php
/**
 * Layout do Bot�o.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");

/**
 * Classe contendo o Layout do Bot�o.
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
	 * @param $p_disabled Informa est� ou n�o desabilitado (true, false)
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
	 * Define o Layout do Bot�o
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
	 * Define se o Bot�o estar� habilitado ou desabilitado
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
	 * Define o Label do Bot�o
	 * 
	 * @param $p_value Label do Bot�o
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLabel( $p_value ) {
		$this->label = $p_value;
	}

	/**
	 * Verifica se o Bot�o estar� habilitado ou desabilitado
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function getDisabled() {
		return($this->disabled);
	}

	/**
	 * Obtem o Label do Bot�o
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