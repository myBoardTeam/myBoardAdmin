<?php
/**
 * Layout Web para P�gina padr�o.
 */

require_once(PROJECT_PATH."/library/util/AbstractMessageLog.php");

/**
 * Classe contendo o Layout Web externo da p�gina.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
abstract class AbstractLayout extends AbstractMessageLog {
	protected $layout_string;
	protected $content;
	
	/**
	 * Construtor da Classe
	 * 
	 * @param $p_content Conte�do a ser inclu�do no Objeto
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_content = "" ) {
		$fname = "constructObject()";

		$this->setContent($p_content);
		
		$this->setLayout();
	}

	public abstract function setLayout();
	
	/**
	 * Define o Conte�do
	 * 
	 * @param $p_value Conte�do
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setContent( $p_value ) {
		$this->content = $p_value;
	}
	
	/**
	 * Obtem o Layout do Objeto
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getLayout() {
		$fname = "getLayout()";
		
		if ( $this->layout_string == "" )
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_LAYOUT_EMPTY);
			
		return $this->layout_string;
	}

	/**
	 * Obtem o Conte�do
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getContent() {
		return($this->content);
	}
}
?>
