<?php
/**
 * Acesso a Tabela de Permiss�es no Banco de Dados
 */

require_once(PROJECT_PATH."/library/model/access/AbstractAccess.php");
require_once(PROJECT_PATH."/library/model/database/Usuario.php");
require_once(PROJECT_PATH."/library/model/database/Permissao.php");

/**
 * Classe de acesso a Tabela de Permiss�es no Banco de Dados
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class AccessPermissao extends AbstractAccess {

	/**
	 * Inserir Permiss�o no Banco de Dados
	 *
	 * @param $item Permissao a ser incluida
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function insertItem( $item ) {
		$fname = "insertItem()";
		
		if ( $item->getTipo() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_02); $this->setResult(false); return(false); }
		if ( $item->getNome() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_03); $this->setResult(false); return(false); }
		if ( $item->getDescricao() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_04); $this->setResult(false); return(false); }
			
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
			return(false);
		}

		$this->setResult($result);
	}
	
	/**
	 * Atualizar Permiss�o no Banco de Dados
	 *
	 * @param $item Permissao a ser atualizada
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function updateItem( $item ) {
		$fname = "updateItem()";
		
		if ( !$item->getIDPermissao() > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_01); $this->setResult(false); return(false); }
		if ( $item->getTipo() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_02); $this->setResult(false); return(false); }
		if ( $item->getNome() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_03); $this->setResult(false); return(false); }
		if ( $item->getDescricao() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_04); $this->setResult(false); return(false); }
			
		$query  = "update permissao set";
		$query .= " tipo = '".addslashes($item->getTipo())."',";
		$query .= " nome = '".addslashes($item->getNome())."',";
		$query .= " descricao = '".addslashes($item->getDescricao())."'";
		$query .= " where id_permissao = ".$item->getIDPermissao();
			
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_UPD_01);
			return(false);
		}
			
		$this->setResult($result);		
	}
	
	/**
	 * Excluir Permiss�o no Banco de Dados
	 *
	 * @param $id Codigo da Permiss�o a ser excluido
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function deleteItem( $id ) {
		$fname = "deleteItem()";

		if ( !$id > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_01); $this->setResult(false); return(false); }
		
		$query = "delete from usuario_permissao where id_permissao = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_DEL_01);
			return(false);
		}

		$query = "delete from permissao where id_permissao = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_DEL_02);
			return(false);
		}
			
		$this->setResult($result);
	}
	
	/**
	 * Obter uma Permiss�o espec�fica no Banco de Dados
	 *
	 * @param $id Codigo da Permiss�o
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function find( $id ) {
		$fname = "find()";
		
		if ( !$id > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_NN_01); $this->setResult(false); return(false); }

		$query = "select * from permissao where id_permissao = ".$id." limit 1";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_FND_01);
			$this->setResult(false);
			return(false);
		} else {
			$permissao = new Permissao();
			$permissao->setIDPermissao($result[0]["id_permissao"]);
			$permissao->setTipo($result[0]["tipo"]);
			$permissao->setNome($result[0]["nome"]);
			$permissao->setDescricao($result[0]["descricao"]);
			$permissao->setNivel(PERM_LEVEL_DENIED);
			
			$this->setResult($permissao);
		}
	}
	
	/**
	 * Obter uma lista de todas as Permiss�es no Banco de Dados
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
				$permissao->setNivel(PERM_LEVEL_DENIED);
				
				$permissao_list[] = $permissao;
			}
			$this->setResult($permissao_list);
		}
	}

	
	/**
	 * Obter uma lista de todas as Permiss�es de um Determinado Usu�rio
	 * 
	 * @param $id Codigo do Usu�rio
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function listUser( $id ){
		$fname = "listUser()";
		
		$this->listAll();

		foreach ( $this->getResult() as $array_item ) {
			$query  = "select id_usuario, id_permissao, nivel";
			$query .= " from usuario_permissao";
			$query .= " where id_permissao = '".$array_item->getIDPermissao()."'";
			$query .= " and id_usuario = '".$id."'";
		
			if ($result = $this->database_connection->runQuery( $query, DB_SELECT )) {
				$array_item->setNivel($result[0]["nivel"]);
			}
			$permissao_list[] = $array_item;
		}

		$this->setResult($permissao_list);
	}

	/**
	 * Limpa todas as Permiss�es de Usuario no Banco de Dados
	 *
	 * @param $p_id_usuario ID do Usuario
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function clearUsuarioPermissao( $p_id_usuario ) {
		$fname = "clearUsuarioPermissao()";
		
		$query = "delete from usuario_permissao where id_usuario = ".$p_id_usuario;
			
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_CLR_01);
		}
	}

	/**
	 * Atualiza Permiss�o de Usuairio no Banco de Dados
	 *
	 * @param $p_id_usuario ID do Usuario
	 * @param $p_name_permissao Nome da Permiss�o
	 * @param $p_value Nivel de Acesso
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function refreshUsuarioPermissao( $p_id_usuario, $p_id_permissao, $p_value ) {
		$fname = "refreshUsuarioPermissao()";
		
		$query  = "insert into usuario_permissao(";
		$query .= " id_usuario,";
		$query .= " id_permissao,";
		$query .= " nivel";
		$query .= " ) values (";
		$query .= " '".addslashes($p_id_usuario)."',";
		$query .= " '".addslashes($p_id_permissao)."',";
		$query .= " '".addslashes($p_value)."'";
		$query .= " )";
			
		if (!$result = $this->database_connection->runQuery( $query, DB_INSERT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_PERMISSAO_REF_01);
		}
	}
}
?>
