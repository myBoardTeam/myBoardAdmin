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
		
		if ( $item->getTipo() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_02); $this->setResult(false); break; }
		if ( $item->getNome() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_03); $this->setResult(false); break; }
		if ( $item->getDescricao() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_04); $this->setResult(false); break; }
			
		$query  = "insert into permissao(";
		$query .= " tipo,";
		$query .= " nome,";
		$query .= " descricao";
		$query .= " ) values (";
		$query .= " '".addslashes($item->getTipo())."',";
		$query .= " '".addslashes($item->getNome())."',";
		$query .= " '".addslashes($item->getDescricao())."'";
		$query .= " )";
			
		if (!$result = $this->database_connection->runQuery( $query, DB_INSERT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_INS_01);
			break;
		}

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
		
		if ( !$item->getIDPermissao() > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_01); $this->setResult(false); break; }
		if ( $item->getTipo() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_02); $this->setResult(false); break; }
		if ( $item->getNome() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_03); $this->setResult(false); break; }
		if ( $item->getDescricao() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_04); $this->setResult(false); break; }
			
		$query  = "update permissao set";
		$query .= " tipo = '".addslashes($item->getTipo())."',";
		$query .= " nome = '".addslashes($item->getNome())."',";
		$query .= " descricao = '".addslashes($item->getDescricao())."'";
		$query .= " where id_permissao = ".$item->getIDPermissao();
			
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_UPD_01);
			break;
		}
			
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

		if ( !$id > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_01); $this->setResult(false); break; }
		
		$query = "delete from usuario_permissao where id_permissao = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_DEL_01);
			break;
		}

		$query = "delete from permissao where id_permissao = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_DEL_02);
			break;
		}
			
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
		
		if ( !$id > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_01); $this->setResult(false); break; }

		$query = "select * from permissao where id_permissao = ".$id." limit 1";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_FND_01);
			$this->setResult(false);
			break;
		} else {
			$permissao = new Permissao();
			$permissao->setIDPermissao($result[0]["id_permissao"]);
			$permissao->setTipo($result[0]["tipo"]);
			$permissao->setNome($result[0]["nome"]);
			$permissao->setDescricao($result[0]["descricao"]);
			$permissao->setNivel(0);
			
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
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_LST_01);
			$this->setResult(false);
		} else {
			foreach ( $result as $array_item ) {
				$permissao = new Permissao();
				$permissao->setIDPermissao($array_item["id_permissao"]);
				$permissao->setTipo($array_item["tipo"]);
				$permissao->setNome($array_item["nome"]);
				$permissao->setDescricao($array_item["descricao"]);
				$permissao->setNivel(0);
				
				$permissao_list[] = $permissao;
			}
			$this->setResult($permissao_list);
		}
	}

	
	/**
	 * Obter uma lista de todas as Permissões de um Determinado Usuário
	 * 
	 * @param $id Codigo do Usuário
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function listUser( $id ){
		$fname = "listUser()";
		
		$this->listAll();
		print_r($this->getResult());
		
		foreach ( $this->getResult() as $array_item ) {
			$query  = "select id_usuario, id_permissao, nivel";
			$query .= " from usuario_permissao";
			$query .= " where id_permissao = '".$array_item->getIDPermissao()."'";
			$query .= " and id_usuario = '.$id.'";
		
			if ($result = $this->database_connection->runQuery( $query, DB_SELECT )) {
				$array_item->setNivel($result[0]["nivel"]);
			}
			$permissao_list[] = $array_item;
		}
		$this->setResult($permissao_list);
	}
}
?>
