<?php
/**
 * Acesso as Tabelas do Banco de Dados
 */

require_once(PROJECT_PATH."/library/util/AbstractMessageLog.php");
require_once(PROJECT_PATH."/library/model/connection/MySQL.php");

/**
 * Interface de acesso as Tabelas do Banco de Dados
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
abstract class AbstractAccess extends AbstractMessageLog {
	protected $database_connection;
	protected $result;
	
	/**
	 * Construtor da Classe
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct() {
		$fname = "constructObject()";

		$this->database_connection = new MySQL(DATABASE_NAME, DATABASE_HOST, DATABASE_PORT, DATABASE_USER, DATABASE_PASSWORD);
		
		$this->result = false;
	}
	
	/**
	 * Define o Resultado do Objeto
	 * 
	 * @param $value Resultado do Objeto
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setResult( $value ) {
		$this->result = $value;
	}
	
	/**
	 * Obtem o Resultado do Objeto
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getResult() {
		return($this->result);
	}

	public abstract function insertItem( $item );
	public abstract function updateItem( $item );
	public abstract function deleteItem( $id );
	public abstract function find( $id );
	public abstract function listAll();
}
?>
