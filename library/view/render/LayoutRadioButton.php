<?php
/**
 * Layout do Radio Button.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");

/**
 * Classe contendo o Layout do Radio Button.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutRadioButton extends AbstractLayout {
	protected $disabled;
	protected $label;
	protected $name;
	protected $p_checked;
		
	/**
	 * Construtor da Classe
	 * 
	 * @param $p_disabled Informa está ou não desabilitado (true, false)
	 * @param $p_label Label do Campo
	 * @param $p_name Nome do Campo
	 * @param $p_checked Campo está ou não selecionado
	 * @param $p_value Valor do Campo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_disabled, $p_label, $p_name, $p_checked, $p_value = "" ) {
		$fname = "constructObject()";

		$this->setDisabled($p_disabled);
		$this->setLabel($p_label);
		$this->setChecked($p_checked);
		$this->setName($p_name);

		parent::__construct($p_value);
	}

	/**
	 * Define o Layout do Radio Button
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string  = "";
		$this->layout_string .= "<!-- <RADIOBUTTON> -->\n";
//		$this->layout_string .= "  <input type=\"radio\" name=\"".$this->getName()."\" class=\"styled\"".$this->getDisabled()." value=\"".$this->getContent()."\"".$this->getChecked()."/>".$this->getLabel()."</input>\n";
		$this->layout_string .= "  <input type=\"radio\" name=\"".$this->getName()."\"".$this->getDisabled()." value=\"".$this->getContent()."\"".$this->getChecked().">".$this->getLabel()."</input>\n";
		$this->layout_string .= "<!-- </RADIOBUTTON> -->\n";
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
	 * Define o Status do Campo 
	 * 
	 * @param $p_value Status
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setChecked( $p_value ) {
		$this->checked = ($p_value == true) ? " checked" : "";
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

	/**
	 * Obtem o Status do Campo
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getChecked() {
		return($this->checked);
	}
}
?>