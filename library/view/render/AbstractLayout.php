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
	 * @param $c Conteúdo a ser incluído no Objeto
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $c = "" ) {
		$fname = "constructObject()";

		$this->setContent($c);
		
		$this->setLayout();
	}

	public abstract function setLayout();
	
	/**
	 * Define o Conteúdo
	 * 
	 * @param $value Conteúdo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setContent( $value ) {
		$this->content = $value;
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
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_LAYOUT_EMPTY);
			
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
