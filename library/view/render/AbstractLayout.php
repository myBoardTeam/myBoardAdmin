<?php
/**
 * Layout Web para Página padrão.
 */

require_once(PROJECT_PATH."/library/util/AbstractMessageLog.php");

/**
 * Classe contendo o Layout Web externo da página.
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
	 * @param $p_content Conteúdo a ser incluído no Objeto
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
	 * Define o Conteúdo
	 * 
	 * @param $p_value Conteúdo
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
	 * Obtem o Conteúdo
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
