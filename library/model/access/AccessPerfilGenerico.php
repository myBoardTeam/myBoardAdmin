<?php
/**
 * Acesso a Tabela de Perfis Genéricos no Banco de Dados
 */

require_once(PROJECT_PATH."/library/model/access/AbstractAccess.php");
require_once(PROJECT_PATH."/library/model/database/Usuario.php");
require_once(PROJECT_PATH."/library/model/database/PerfilGenerico.php");

/**
 * Classe de acesso a Tabela de Perfis Genéricos no Banco de Dados
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class AccessPerfilGenerico extends AbstractAccess {

	/**
	 * Inserir Perfil Genérico no Banco de Dados
	 *
	 * @param $item PerfilGenerico a ser incluido
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function insertItem( $item ) {
		$fname = "insertItem()";
		
		if ( $item->getDescricao() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_PERFIL_01); $this->setResult(false); }
			
		$query  = "insert into perfil_generico(";
		$query .= " descricao";
		$query .= " ) values (";
		$query .= " '".addslashes($item->getDescricao())."'";
		$query .= " )";
			
		if (!$result = $this->database_connection->runQuery( $query, DB_INSERT ))
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERFIL_INS_01);

		$this->setResult($result);
	}
	
	/**
	 * Atualizar Perfil Genérico no Banco de Dados
	 *
	 * @param $item PerfilGenerico a ser atualizado
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function updateItem( $item ) {
		$fname = "updateItem()";
		
		if ( $item->getDescricao() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_PERFIL_01); $this->setResult(false); }
			
		$query  = "update perfil_generico set";
		$query .= " descricao = '".addslashes($item->getDescricao())."'";
		$query .= " where id_perfil_generico = ".$item->getIDPerfilGenerico();
			
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERFIL_UPD_01);
			
		$this->setResult($result);		
	}
	
	/**
	 * Excluir Perfil Genérico no Banco de Dados
	 *
	 * @param $id Codigo do Perfil Genérico a ser excluido
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function deleteItem( $id ) {
		$fname = "deleteItem()";

		if ( !$id > 0 ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_PERFIL_01); $this->setResult(false); }
		
		$query = "delete from usuario_perfil where id_perfil_generico = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_PERFIL_DEL_01);

		$query = "delete from perfil_generico where id_perfil_generico = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERFIL_DEL_02);
			
		$this->setResult($result);
	}
	
	/**
	 * Obter um Perfil Genérico específico no Banco de Dados
	 *
	 * @param $id Codigo do Perfil Genérico
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function find( $id ) {
		$fname = "find()";
		
		if ( !$id > 0 ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_PERFIL_01); $this->setResult(false); }

		$query = "select * from perfil_generico where id_perfil_generico = ".$id." limit 1";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERFIL_FND_01);
			$this->setResult($result);
		} else {
			$perfil_generico = new PerfilGenerico();
			$perfil_generico->setIDPerfilGenerico($result[0]["id_perfil_generico"]);
			$perfil_generico->setDescricao($result[0]["descricao"]);
			
			$this->setResult($perfil_generico);
		}
	}
	
	/**
	 * Obter uma lista de todos os Perfis Genéricos no Banco de Dados
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function listAll(){
		$fname = "listAll()";
		
		$query = "select * from perfil_generico";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERFIL_LST_01);
			$this->setResult($result);
		} else {
			foreach ( $result as $array_item ) {
				$perfil_generico = new PerfilGenerico();
				$perfil_generico->setIDPerfilGenerico($array_item["id_perfil_generico"]);
				$perfil_generico->setDescricao($array_item["descricao"]);
				
				$perfil_generico_list[] = $perfil_generico;
			}
			$this->setResult($perfil_generico_list);
		}
	}
}
?>
