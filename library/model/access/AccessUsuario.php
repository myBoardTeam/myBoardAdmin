<?php
/**
 * Acesso a Tabela de Usuários no Banco de Dados
 */

require_once(PROJECT_PATH."/library/model/access/AbstractAccess.php");
require_once(PROJECT_PATH."/library/model/database/Usuario.php");
require_once(PROJECT_PATH."/library/model/database/TipoUsuario.php");
require_once(PROJECT_PATH."/library/model/database/Permissao.php");
require_once(PROJECT_PATH."/library/model/database/Materia.php");
require_once(PROJECT_PATH."/library/model/database/PerfilGenerico.php");

/**
 * Classe de acesso a Tabela de Usuários no Banco de Dados
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class AccessUsuario extends AbstractAccess {

	/**
	 * Inserir Usuário no Banco de Dados
	 *
	 * @param $item Usuario a ser incluido
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function insertItem( $item ) {
		$fname = "insertItem()";
		
		if ( $item->getIDTipoUsuario() == "" ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_02); $this->setResult(false); return(false);}
		if ( $item->getNome() == "" ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_03); $this->setResult(false); return(false);}
		if ( $item->getUsuario() == "" ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_04); $this->setResult(false); return(false);}
		if ( $item->getSenhaNova() != $item->getSenhaConfirma() ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_05); $this->setResult(false); return(false);}
		if ( $item->getEMail() == "" ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_06); $this->setResult(false); return(false);}
			
		$query  = "insert into usuario(";
		$query .= " id_tipo_usuario,";
		$query .= " nome,";
		$query .= " usuario,";
		$query .= " senha,";
		$query .= " dt_nascimento,";
		$query .= " email";
		$query .= " ) values (";
		$query .= " '".$item->getIDTipoUsuario()."',";
		$query .= " '".addslashes($item->getNome())."',";
		$query .= " '".addslashes($item->getUsuario())."',";
		$query .= " '".addslashes($item->getSenhaNova())."',";
		$query .= " '".$item->getDataNascimento()."',";
		$query .= " '".addslashes($item->getEMail())."'";
		$query .= " )";
			
		if (!$result = $this->database_connection->runQuery( $query, DB_INSERT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_INS_01);
			 return(false);
		}

		$this->setResult($result);
		return(true);
	}
	
	/**
	 * Atualizar Usuário no Banco de Dados
	 *
	 * @param $item Usuario a ser atualizado
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function updateItem( $item ) {
		$fname = "updateItem()";
		
		if ( !$item->getIDUsuario() > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_01); $this->setResult(false); return(false); }
		if ( $item->getIDTipoUsuario() == "" ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_02); $this->setResult(false); return(false); }
		if ( $item->getNome() == "" ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_03); $this->setResult(false); return(false); }
		if ( $item->getUsuario() == "" ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_04); $this->setResult(false); return(false); }
		if ( $item->getSenhaNova() != $item->getSenhaConfirma() ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_05); $this->setResult(false); return(false); }
		if ( $item->getEMail() == "" ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_06); $this->setResult(false); return(false); }
			
		$query  = "update usuario set";
		$query .= " id_tipo_usuario = '".$item->getIDTipoUsuario()."',";
		$query .= " nome = '".addslashes($item->getNome())."',";
		$query .= " usuario = '".addslashes($item->getUsuario())."',";
		$query .= ( $item->getSenhaNova() != "" ) ? " senha = '".addslashes($item->getSenhaNova())."'," : "";
		$query .= " dt_nascimento = '".$item->getDataNascimento()."',";
		$query .= " email = '".addslashes($item->getEMail())."'";
		$query .= " where id_usuario = ".$item->getIDUsuario();
			
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_UPD_01);
			return(false);
		}
			
		$this->setResult($result);		
		return(true);
	}
	
	/**
	 * Excluir Usuário no Banco de Dados
	 *
	 * @param $id Codigo do Usuario a ser excluido
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function deleteItem( $id ) {
		$fname = "deleteItem()";

		if ( !$id > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_01); $this->setResult(false); return(false); }
		
		$query = "delete from usuario_perfil where id_usuario = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_USUARIO_DEL_01);
			return(false);
		}

		$query = "delete from usuario_materia where id_usuario = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_USUARIO_DEL_02);
			return(false);
		}
			
		$query = "delete from usuario_permissao where id_usuario = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_USUARIO_DEL_03);
			return(false);
		}
			
		$query = "delete from usuario where id_usuario = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_DEL_04);
			return(false);
		}
			
		$this->setResult($result);
		return(true);
	}
	
	/**
	 * Obter um Usuário específico no Banco de Dados
	 *
	 * @param $id Codigo do Usuario
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function find( $id ) {
		$fname = "find()";
		
		if ( !$id > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_NN_01); $this->setResult(false); return(false); }

		$query = "select * from usuario where id_usuario = ".$id." limit 1";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_FND_01);
			$this->setResult(false);
			return(false);
		} else {
			$usuario = new Usuario();
			$usuario->setIDUsuario($result[0]["id_usuario"]);
			$usuario->setIDTipoUsuario($result[0]["id_tipo_usuario"]);
			$usuario->setNome($result[0]["nome"]);
			$usuario->setUsuario($result[0]["usuario"]);
			$usuario->setDataNascimento($result[0]["dt_nascimento"]);
			$usuario->setEMail($result[0]["email"]);
			
			$this->setResult($usuario);
			return(true);
		}
	}
	
	/**
	 * Obter uma lista de todos os Usuários no Banco de Dados
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function listAll(){
		$fname = "listAll()";
		
		$query = "select * from usuario";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_LST_01);
			$this->setResult(false);
			return(false);
		} else {
			foreach ( $result as $array_item ) {
				$usuario = new Usuario();
				$usuario->setIDUsuario($array_item["id_usuario"]);
				$usuario->setIDTipoUsuario($array_item["id_tipo_usuario"]);
				$usuario->setNome($array_item["nome"]);
				$usuario->setUsuario($array_item["usuario"]);
				$usuario->setDataNascimento($array_item["dt_nascimento"]);
				$usuario->setEMail($array_item["email"]);
				
				$usuario_list[] = $usuario;
			}
			$this->setResult($usuario_list);
			return(true);
			
		}
	}
	
	/**
	 * Verifica se o Login e a Senha estão corretos
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function checkLogin( $login, $password ) {
		$fname = "checkLogin()";
		
		$query = "select * from usuario where usuario = '".$login."' and senha = '".$password."'";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_LST_01);
			return(false);
		} else if ( is_array($result[0]) ) {
			$usuario = new Usuario();
			$usuario->setIDUsuario($result[0]["id_usuario"]);
			$usuario->setIDTipoUsuario($result[0]["id_tipo_usuario"]);
			$usuario->setNome($result[0]["nome"]);
			$usuario->setUsuario($result[0]["usuario"]);
			$usuario->setDataNascimento($result[0]["dt_nascimento"]);
			$usuario->setEMail($result[0]["email"]);
			
			$this->setResult($usuario);
			return(true);
		} else {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_CHK_01);
			return(false);
		}
		
	}
}
?>
