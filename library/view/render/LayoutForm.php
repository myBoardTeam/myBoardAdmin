<?php
/**
 * Layout do Formulário.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");
require_once(PROJECT_PATH."/library/view/render/LayoutHidden.php");
require_once(PROJECT_PATH."/library/view/render/LayoutButton.php");

/**
 * Classe contendo o Layout do Formulário.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutForm extends AbstractLayout {
	private $action;
	private $name;
	private $type;
	private $confirm;
	private $cancel;
		
	/**
	 * Construtor da Classe
	 * 
	 * @param $p_action Ação a ser executada pelo Formulário
	 * @param $p_name Nome do Formulário
	 * @param $p_type Tipo do Formulário
	 * @param $p_confirm Confirmação do Formulário
	 * @param $p_cancel Cancelamento do Formulário
	 * @param $p_fields Campos do Formulário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_action, $p_name, $p_type, $p_confirm, $p_cancel, $p_fields = "" ) {
		$fname = "constructObject()";

		$this->setAction($p_action);
		$this->setName($p_name);
		$this->setFormType($p_type);
		$this->setConfirmAction($p_confirm);
		$this->setCancelAction($p_cancel);

		parent::__construct($p_fields);
	}

	/**
	 * Define o Layout do Formulário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string  = "";
		$this->layout_string .= "<!-- <FORM> -->\n";
		$this->layout_string .= "<script type=\"text/javascript\" language=\"JavaScript\">\n";
		$this->layout_string .= "  function submit".$this->getName()."() { document.".$this->getName().".submit(); }\n";
		$this->layout_string .= "</script>\n";
		$this->layout_string .= "<form name=\"".$this->getName()."\" action=\"".$this->getAction()."\" method=\"post\" enctype=\"multipart/form-data\">\n";
		$this->layout_string .= "  <table width=\"100%\">\n";
		$this->layout_string .= "    <tr>\n";
		$this->layout_string .= "      <td colspan=2>\n";
		
		$input_content = new LayoutHidden( "action", ($this->getFormType() == FORM_UPDATE ) ? "update" : ($this->getFormType() == FORM_LOGIN ) ? "login" : "insert" );

		$this->layout_string .= $input_content->getLayout();
		$this->layout_string .= $this->getContent();
		$this->layout_string .= "      </td>\n";
		$this->layout_string .= "    </tr>\n";
		$this->layout_string .= "    <tr>\n";
		$this->layout_string .= "      <td width=\"50%\">\n";
		
		$input_content = new LayoutButton( LOC_GENERIC_BTN_CONFIRM, $this->getConfirmAction() );

		$this->layout_string .= $input_content->getLayout();
		$this->layout_string .= "      </td>\n";
		$this->layout_string .= "      <td width=\"50%\">\n";
		
		$input_content = new LayoutButton( LOC_GENERIC_BTN_CANCEL, $this->getCancelAction() );
		
		$this->layout_string .= $input_content->getLayout();
		$this->layout_string .= "      </td>\n";
		$this->layout_string .= "    </tr>\n";
		$this->layout_string .= "  </table>\n";
		$this->layout_string .= "</form>\n";
		$this->layout_string .= "<!-- </FORM> -->";
	}

	/**
	 * Define a Ação Principal do Formulário
	 * 
	 * @param $p_value Ação do Formulário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setAction( $p_value ) {
		$this->action = $p_value;
	}

	/**
	 * Define o Nome do Formulário
	 * 
	 * @param $p_value Nome do Formulário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setName( $p_value ) {
		$this->name = $p_value;
	}
	
	/**
	 * Define o Tipo do Formulário
	 * 
	 * @param $p_value Tipo do Formulário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setFormType( $p_value ) {
		$this->type = $p_value;
	}
	
	/**
	 * Define a Ação de Confirmação do Formulário
	 * 
	 * @param $p_value Ação do Formulário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setConfirmAction( $p_value ) {
		$this->confirm = $p_value;
	}
	
	/**
	 * Define a Ação de Cancelamento do Formulário
	 * 
	 * @param $p_value Ação do Formulário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setCancelAction( $p_value ) {
		$this->cancel = $p_value;
	}

	/**
	 * Obtem a Ação Principal do Formulário
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getAction() {
		return($this->action);
	}

	/**
	 * Obtem o Nome do Formulário
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
	 * Obtem Tipo do Formulário
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function getFormType() {
		return(($this->type != "") ? $this->type : FORM_INSERT);
	}

	/**
	 * Obtem a Ação de Confirmação do Formulário
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function getConfirmAction() {
		return($this->confirm);
	}
	
	/**
	 * Obtem a Ação de Cancelamento do Formulário
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function getCancelAction() {
		return($this->cancel);
	}
}
?>