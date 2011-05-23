<?php
/**
 * Mensagem do Sistema
 */

/**
 * Artefato de Mensagem do Sistema
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class Message {
	private $class_name;
	private $method_name;
	private $level; // Valores Válidos: MB_ERROR, MB_WARNING, MB_NOTICE
	private $show; // Valores Válidos: MB_SHOW, MB_HIDDEN
	private $message;
	private $detail;

	/**
	 * Define o Nome da Classe
	 * 
	 * @param $value Nome da Classe
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setClassName( $value ) {
		$this->class_name = $value;
	}

	/**
	 * Define o Nome do Metodo
	 * 
	 * @param $value Nome do Metodo
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setMethodName( $value ) {
		$this->method_name = $value;
	}
	
	/**
	 * Define o Nivel de Criticidade
	 * 
	 * @param $value Nivel de Criticidade
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setMessageLevel( $value ) {
		$this->level = $value;
	}
	
	/**
	 * Define o Nivel de Exibição
	 * 
	 * @param $value Nivel de Exibição
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setMessageShow( $value ) {
		$this->show = $value;
	}
	
	/**
	 * Define a Mensagem
	 * 
	 * @param $value Mensagem
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setMessage( $value ) {
		$this->message = $value;
	}
	
	/**
	 * Define os Detalhes da Mensagem
	 * 
	 * @param $value Detalhes da Mensagem
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setDetail( $value ) {
		$this->detail = $value;
	}
	
	/**
	 * Obtem o Nome da Classe
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getClassName() {
		return($this->class_name);
	}
	
	/**
	 * Obtem o Nome do Metodo
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getMethodName() {
		return($this->method_name);
	}
	
	/**
	 * Obtem o Nivel de Criticidade
	 * 
	 * @return [MB_ERROR|MB_WARNING|MB_NOTICE]
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getMessageLevel() {
		return($this->level);
	}
	
	/**
	 * Obtem o Nivel de Exibição
	 * 
	 * @return [MB_SHOW|MB_HIDDEN]
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getMessageShow() {
		return($this->show);
	}
	
	/**
	 * Obtem a Mensagem
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getMessage() {
		return($this->message);
	}
	
	/**
	 * Obtem os Detalhes da Mensagem
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getDetail() {
		return($this->detail);
	}	
}
?>
