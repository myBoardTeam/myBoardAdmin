<?php
/**
 * Acesso a Tabela de Tipos de Usuário no Banco de Dados
 */

require_once(PROJECT_PATH."/library/model/access/AbstractAccess.php");
require_once(PROJECT_PATH."/library/model/database/Usuario.php");
require_once(PROJECT_PATH."/library/model/database/TipoUsuario.php");

/**
 * Classe de acesso a Tabela de Tipos de Usuário no Banco de Dados
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class AccessTipoUsuario extends AbstractAccess {

	/**
	 * Obter um Tipo de Usuário específico no Banco de Dados
	 *
	 * @param $id Codigo do Tipo de Usuario
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function find( $id ) {
		$fname = "find()";
		
		if ( !$id > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_TP_USUARIO_NN_01); $this->setResult(false); }

		$query = "select * from tipo_usuario where id_tipo = '".$id."' limit 1";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_TP_USUARIO_FND_01);
			$this->setResult($result);
		} else {
			$tipo_usuario = new TipoUsuario();
			$tipo_usuario->setIDTipoUsuario($result[0]["id_tipo"]);
			$tipo_usuario->setDescricao($result[0]["descricao"]);
			
			$this->setResult($tipo_usuario);
		}
	}
	
	/**
	 * Obter uma lista de todos os Tipos de Usuário no Banco de Dados
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function listAll(){
		$fname = "listAll()";
		
		$query = "select * from tipo_usuario";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_TP_USUARIO_LST_01);
			$this->setResult($result);
		} else {
			foreach ( $result as $array_item ) {
				$tipo_usuario = new TipoUsuario();
				$tipo_usuario->setIDTipoUsuario($array_item["id_tipo"]);
				$tipo_usuario->setDescricao($array_item["descricao"]);
				
				$tipo_usuario_list[] = $tipo_usuario;
			}
			$this->setResult($tipo_usuario_list);
		}
	}
}
?>
