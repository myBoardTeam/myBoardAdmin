<?php
/**
 * Acesso a Tabela de Permissões no Banco de Dados
 */

require_once(PROJECT_PATH."/library/model/access/AbstractAccess.php");
require_once(PROJECT_PATH."/library/model/database/Usuario.php");
require_once(PROJECT_PATH."/library/model/database/Permissao.php");

/**
 * Classe de acesso a Tabela de Permissões no Banco de Dados
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class AccessPermissao extends AbstractAccess {

	/**
	 * Inserir Permissão no Banco de Dados
	 *
	 * @param $item Permissao a ser incluida
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function insertItem( $item ) {
		$fname = "insertItem()";
		
		if ( $item->getDescricao() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_PERMISSAO_01); $this->setResult(false); }
			
		$query  = "insert into permissao(";
		$query .= " descricao";
		$query .= " ) values (";
		$query .= " '".addslashes($item->getDescricao())."'";
		$query .= " )";
			
		if (!$result = $this->database_connection->runQuery( $query, DB_INSERT ))
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_INS_01);

		$this->setResult($result);
	}
	
	/**
	 * Atualizar Permissão no Banco de Dados
	 *
	 * @param $item Permissao a ser atualizada
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function updateItem( $item ) {
		$fname = "updateItem()";
		
		if ( $item->getDescricao() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_PERMISSAO_01); $this->setResult(false); }
			
		$query  = "update permissao set";
		$query .= " descricao = '".addslashes($item->getDescricao())."'";
		$query .= " where id_permissao = ".$item->getIDPermissao();
			
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_UPD_01);
			
		$this->setResult($result);		
	}
	
	/**
	 * Excluir Permissão no Banco de Dados
	 *
	 * @param $id Codigo da Permissão a ser excluido
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function deleteItem( $id ) {
		$fname = "deleteItem()";

		if ( !$id > 0 ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_PERMISSAO_01); $this->setResult(false); }
		
		$query = "delete from usuario_permissao where id_permissao = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_DEL_01);

		$query = "delete from permissao where id_permissao = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_DEL_02);
			
		$this->setResult($result);
	}
	
	/**
	 * Obter uma Permissão específica no Banco de Dados
	 *
	 * @param $id Codigo da Permissão
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function find( $id ) {
		$fname = "find()";
		
		if ( !$id > 0 ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_PERMISSAO_01); $this->setResult(false); }

		$query = "select * from permissao where id_permissao = ".$id." limit 1";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_FND_01);
			$this->setResult($result);
		} else {
			$permissao = new Permissao();
			$permissao->setIDPermissao($result[0]["id_permissao"]);
			$permissao->setDescricao($result[0]["descricao"]);
			
			$this->setResult($permissao);
		}
	}
	
	/**
	 * Obter uma lista de todas as Permissões no Banco de Dados
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function listAll(){
		$fname = "listAll()";
		
		$query = "select * from permissao";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_LST_01);
			$this->setResult($result);
		} else {
			foreach ( $result as $array_item ) {
				$permissao = new Permissao();
				$permissao->setIDPermissao($array_item["id_permissao"]);
				$permissao->setDescricao($array_item["descricao"]);
				
				$permissao_list[] = $permissao;
			}
			$this->setResult($permissao_list);
		}
	}
}
?>
