<?php
/**
 * Layout da Área de Texto.
 */

require_once(PROJECT_PATH."/library/view/render/LayoutTextInput.php");

/**
 * Classe contendo o Layout da Área de Texto.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutTextInput extends LayoutTextInput {
	private $rows;
		
	/**
	 * Construtor da Classe
	 * 
	 * @param $l Label do Campo
	 * @param $n Nome do Campo
	 * @param $v Valor do Campo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_size, $p_required, $p_label, $p_name, $p_rows, $p_value = "" ) {
		$fname = "constructObject()";

		$this->setRows($p_rows);

		parent::__construct($p_size, $p_required, $p_label, $p_name, $p_value);
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
		$this->layout_string .= "<!-- <TEXTAREA> -->\n";
		$this->layout_string .= "<script type=\"text/javascript\" charset=\"utf-8\">\n";
		$this->layout_string .= "  $(function() {\n";
		$this->layout_string .= "    $('.textArea').borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' );\n";
		$this->layout_string .= "    $('.textArea').focus( function(){ $(this).borderImage( 'url(\"drawable/form/textbox/selected.png\") 15 20 20 15 stretch stretch' ); } );\n";
		$this->layout_string .= "    $('.textArea').focusout( function(){ $(this).borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' ); } );\n";
		$this->layout_string .= "  });\n";
		$this->layout_string .= "</script>\n";
		$this->layout_string .= "<div style=\"width: ".$this->getSize()."; margin-right: 40px; margin-bottom: 10px; float: left\"><b>".$this->getLabel()."</b><br /><textarea class=\"textArea\" rows=\"".$this->getRows()."\" name=\"".$this->getName()."\">".$this->getContent()."</textarea></div>\n";
		$this->layout_string .= "<!-- </TEXTAREA> -->\n";
	}

	/**
	 * Define a Quantidade de Linhas do Campo
	 * 
	 * @param $value Título da Página
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setRows( $p_value ) {
		$this->rows = $p_value;
	}

	/**
	 * Obtem a Quantidade de Linhas do Campo
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getRows() {
		return($this->rows);
	}
}
?>