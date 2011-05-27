<?php
/**
 * Layout do Campo Escondido.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");

/**
 * Classe contendo o Layout do Campo Escondido.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutHidden extends AbstractLayout {
	private $name;
	
	/**
	 * Construtor da Classe
	 * 
	 * @param $p_name Nome do Campo
	 * @param $p_value Valor do Campo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_name, $p_value = "" ) {
		$fname = "constructObject()";

		$this->setName($p_name);

		parent::__construct($p_value);
	}

	/**
	 * Define o Layout do Campo Escondido
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string  = "";
		$this->layout_string .= "<!-- <HIDDEN> -->\n";
		$this->layout_string .= "<input type=\"hidden\" name=\"".$this->getName()."\" value=\"".$this->getContent()."\" />\n";
		$this->layout_string .= "<!-- </HIDDEN> -->\n";
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