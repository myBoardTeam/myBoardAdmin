<?php
/**
 * Layout do Campo de Texto.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");

/**
 * Classe contendo o Layout do Campo de Texto.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutTextInput extends AbstractLayout {
	protected $size;
	protected $required;
	protected $disabled;
	protected $label;
	protected $name;
		
	/**
	 * Construtor da Classe
	 * 
	 * @param $p_size Tamanho do Campo
	 * @param $p_required Informa se o campo é obrigatório (true, false)
	 * @param $p_disabled Informa está ou não desabilitado (true, false)
	 * @param $p_label Label do Campo
	 * @param $p_name Nome do Campo
	 * @param $p_value Valor do Campo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_size, $p_required, $p_disabled, $p_label, $p_name, $p_value = "" ) {
		$fname = "constructObject()";

		$this->setSize($p_size);
		$this->setRequired($p_required);
		$this->setDisabled($p_disabled);
		$this->setLabel($p_label);
		$this->setName($p_name);

		parent::__construct($p_value);
	}

	/**
	 * Define o Layout do Campo de Texto
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string  = "";
		$this->layout_string .= "<!-- <TEXTINPUT> -->\n";
		$this->layout_string .= "<script type=\"text/javascript\" charset=\"utf-8\">\n";
		$this->layout_string .= "  \$(function() {\n";
		$this->layout_string .= "    \$('.inputText').borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' );\n";
		$this->layout_string .= "    \$('.inputText').focus( function(){ \$(this).borderImage( 'url(\"drawable/form/textbox/selected.png\") 15 20 20 15 stretch stretch' ); } );\n";
		$this->layout_string .= "    \$('.inputText').focusout( function(){ \$(this).borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' ); } );\n";
		$this->layout_string .= "  });\n";
		$this->layout_string .= "</script>\n";
		$this->layout_string .= "<div style=\"width: ".$this->getSize()."; margin-right: 40px; margin-bottom: 10px; float: left\"><b>".$this->getLabel()."</b><br /><input type=\"text\"".$this->getDisabled()." class=\"inputText\" name=\"".$this->getName()."\" value=\"".$this->getContent()."\" /></div>\n";
		$this->layout_string .= "<!-- </TEXTINPUT> -->\n";
	}

	/**
	 * Define o Tamanho do Campo
	 * 
	 * @param $p_value Tamanho do Campo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setSize( $p_value ) {
		$this->size = $p_value;
	}

	/**
	 * Define a Obrigatoriedade do Campo
	 * 
	 * @param $p_value Obrigatoriedade
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setRequired( $p_value ) {
		$this->required = $p_value;
	}

	/**
	 * Define se o Campo estará habilitado ou desabilitado
	 * 
	 * @param $p_value Status
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDisabled( $p_value ) {
		$this->disabled = ($p_value == true) ? " disabled" : "";
	}

	/**
	 * Define o Label do Campo
	 * 
	 * @param $p_value Label do Campo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLabel( $p_value ) {
		$this->label = $p_value;
	}
	
	/**
	 * Define o Nome do Campo
	 * 
	 * @param $p_value Nome do Campo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setName( $p_value ) {
		$this->name = $p_value;
	}
	
	/**
	 * Obtem o Tamanho do Campo
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function getSize() {
		return(($this->size != "")? $this->size : FIELD_LARGE);
	}

	/**
	 * Obtem a Obrigatoriedade do Campo
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function getRequired() {
		return(($this->required != "")? $this->required : false);
	}

	/**
	 * Verifica se o Campo estará habilitado ou desabilitado
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function getDisabled() {
		return($this->disabled);
	}

	/**
	 * Obtem o Label do Campo
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getLabel() {
		return($this->label);
	}

	/**
	 * Obtem o Nome do Campo
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getName() {
		return($this->name);
	}
}
?>