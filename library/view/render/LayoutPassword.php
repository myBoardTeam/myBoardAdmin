<?php
/**
 * Layout do Campo de Senha.
 */

require_once(PROJECT_PATH."/library/view/render/LayoutTextInput.php");

/**
 * Classe contendo o Layout do Campo de Senha.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutPassword extends LayoutTextInput {

	/**
	 * Define o Layout do Campo de Senha
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string  = "";
		$this->layout_string .= "<!-- <PASSWORD> -->\n";
		$this->layout_string .= "<script type=\"text/javascript\" charset=\"utf-8\">\n";
		$this->layout_string .= "  \$(function() {\n";
		$this->layout_string .= "    \$('.inputText').borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' );\n";
		$this->layout_string .= "    \$('.inputText').focus( function(){ \$(this).borderImage( 'url(\"drawable/form/textbox/selected.png\") 15 20 20 15 stretch stretch' ); } );\n";
		$this->layout_string .= "    \$('.inputText').focusout( function(){ \$(this).borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' ); } );\n";
		$this->layout_string .= "  });\n";
		$this->layout_string .= "</script>\n";
		$this->layout_string .= "<div style=\"width: ".$this->getSize()."; margin-right: 40px; margin-bottom: 10px; float: left\"><b>".$this->getLabel()."</b><br /><input type=\"password\"".$this->getDisabled()." class=\"inputText\" name=\"".$this->getName()."\" value=\"".$this->getContent()."\" /></div>\n";
		$this->layout_string .= "<!-- </PASSWORD> -->\n";
	}
}
?>