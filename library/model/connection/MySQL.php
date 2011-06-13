<?php
/**
 * Conexão com o Banco de Dados MySQL
 */

require_once(PROJECT_PATH."/library/util/AbstractMessageLog.php");

/**
 * Classe de conexão com o Banco de Dados MySQL
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class MySQL extends AbstractMessageLog {
	private $database_name;
	private $host_name;
	private $host_port;
	private $user_name;
	private $database_connection;
	private $query;

	/**
	 * Construtor da Classe
	 * 
	 * @param $db Nome da Base de Dados
	 * @param $host Nome do Servidor
	 * @param $port Porta de acesso a Base de Dados
	 * @param $login Nome do Usuário de acesso a Base de Dados
	 * @param $pwd Senha para acesso a Base de Dados
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct($db, $host, $port, $login, $pwd) {
		$fname = "constructObject()";
		$this->setDatabase($db);
		$this->setHostName($host);
		$this->setHostPort($port);
		$this->setUserName($login);
		$this->setPassword($pwd);

		$this->connect();
	}

	/**
	 * Destruidor da Classe
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __destruct() {
		$fname = "destructObject()";
		
		if ($this->database_connection)
			mysql_close($this->database_connection);
		else
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_DB_MYSQL_CLOSE, mysql_error());
	}

	/**
	 * Conecta a Base de Dados
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function connect( ) {
		$fname = "connect()";
		$this->database_connection = mysql_connect($this->getHostName().":".$this->getHostPort(), $this->getUserName(), $this->getPassword());

		if (!$this->database_connection)
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_DB_MYSQL_CONNECT, mysql_error());
		else
			if (!mysql_select_db($this->getDatabase(), $this->database_connection))
				$this->addMessage(get_class($this), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_DB_MYSQL_SELECT, mysql_error());
	}

	/**
	 * Executa Query SQL na Base de Dados
	 * 
	 * @param $q Query a ser executada
	 * @param $type Tipo de Resultado (DB_INSERT, DB_UPDATE, DB_SELECT)
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function runQuery( $q, $type = DB_SELECT ) {
		$fname = "runQuery()";
		
		if ( $q != "" ) {
			if (!$this->database_connection) $this->connect();
			
			if ($this->database_connection) {
				if (!$this->resultset = mysql_query( $q, $this->database_connection ))
					$this->addMessage(get_class($this), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_DB_MYSQL_QUERY_SYNTAX, mysql_error());
				else {
					$this->query = $q;
					if ( $type != DB_UPDATE ) return($this->getResult($type));
					return(true);
				}
			} else
				$this->addMessage(get_class($this), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_DB_MYSQL_QUERY_CONNECT, $q);
		} else
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_DB_MYSQL_QUERY_EMPTY);
		return(false);
	}

	/**
	 * Obtem resultado da última query executada com sucesso na Base de Dados.
	 * 
	 * @param $type Tipo de Resultado (DB_INSERT, DB_UPDATE, DB_SELECT)
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	private function getResult( $type ) {
		$fname = "getResult()";
		
		if ( $this->query != "" ) {
			if ($type == DB_INSERT) {
				if (!$return = mysql_insert_id()) {
					$this->addMessage(get_class($this), $fname, MB_WARNING, MB_HIDDEN, LOC_EMSG_DB_MYSQL_INSERT_EMPTY);
				} else return($return);
			} else if ($type == DB_SELECT) {
				while ( $array_item = mysql_fetch_array($this->resultset, $type) ) $return[] = $array_item;
				if ( is_array($return) ) return($return);
				else $this->addMessage(get_class($this), $fname, MB_WARNING, MB_HIDDEN, LOC_EMSG_DB_MYSQL_RS_EMPTY);
			}
		}
		return(false);
	}
	
	/**
	 * Define o Nome da Base de Dados
	 * 
	 * @param $value Nome da Base de Dados
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setDatabase( $value ) {
		$this->database_name = $value;
	}
	
	/**
	 * Define o Nome do Host
	 * 
	 * @param $value Nome do Host
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setHostName( $value ) {
		$this->host_name = $value;
	}
	
	/**
	 * Define a Porta do Host
	 * 
	 * @param $value Porta do Host
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setHostPort( $value ) {
		$this->host_port = $value;
	}
	
	/**
	 * Define o Nome do Usuário
	 * 
	 * @param $value Nome do Usuário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setUserName( $value ) {
		$this->user_name = $value;
	}
	
	/**
	 * Define a Senha do Usuário
	 * 
	 * @param $value Senha do Usuário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function setPassword( $value ) {
		$this->password = $value;
	}
	
	/**
	 * Obtem o Nome da Base de Dados
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getDatabase() {
		return($this->database_name);
	}
	
	/**
	 * Obtem o Nome do Host
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getHostName() {
		return($this->host_name);
	}
	
	/**
	 * Obtem a Porta do Host
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getHostPort() {
		return($this->host_port);
	}
	
	/**
	 * Obtem o Nome do Usuário
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getUserName() {
		return($this->user_name);
	}
	
	/**
	 * Obtem a Senha do Usuário
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getPassword() {
		return($this->password);
	}
}
?>
