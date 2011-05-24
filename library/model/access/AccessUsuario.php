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
		
		if ( $item->getIDTipoUsuario() == "" ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_02); $this->setResult(false); }
		if ( $item->getNome() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_03); $this->setResult(false); }
		if ( $item->getUsuario() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_04); $this->setResult(false); }
		if ( $item->getSenha() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_05); $this->setResult(false); }
		if ( $item->getEMail() == "" ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_06); $this->setResult(false); }
			
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
		$query .= " '".addslashes($item->getSenha())."',";
		$query .= " '".$item->getDataNascimento()."',";
		$query .= " '".addslashes($item->getEMail())."'";
		$query .= " )";
			
		if (!$result = $this->database_connection->runQuery( $query, DB_INSERT ))
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_INS_01);

		$this->setResult($result);
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
		
		if ( !$item->getIDUsuario() > 0 ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_01); $this->setResult(false); }
		if ( $item->getIDTipoUsuario() == "" ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_02); $this->setResult(false); }
		if ( $item->getNome() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_03); $this->setResult(false); }
		if ( $item->getUsuario() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_04); $this->setResult(false); }
		if ( $item->getSenha() == "") { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_05); $this->setResult(false); }
		if ( $item->getEMail() == "" ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_06); $this->setResult(false); }
			
		$query  = "update usuario set";
		$query .= " id_tipo_usuario = '".$item->getIDTipoUsuario()."',";
		$query .= " nome = '".addslashes($item->getNome())."',";
		$query .= " usuario = '".addslashes($item->getUsuario())."',";
		$query .= " senha = '".addslashes($item->getSenha())."',";
		$query .= " dt_nascimento = '".$item->getDataNascimento()."',";
		$query .= " email = '".addslashes($item->getEMail())."'";
		$query .= " where id_usuario = ".$item->getIDUsuario();
			
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_UPD_01);
			
		$this->setResult($result);		
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

		if ( !$id > 0 ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_01); $this->setResult(false); }
		
		$query = "delete from usuario_perfil where id_usuario = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_USUARIO_DEL_01);
			
		$query = "delete from usuario_materia where id_usuario = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_USUARIO_DEL_02);
			
		$query = "delete from usuario_permissao where id_usuario = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_USUARIO_DEL_03);
			
		$query = "delete from usuario where id_usuario = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_DEL_04);
			
		$this->setResult($result);
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
		
		if ( !$id > 0 ) { $this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACCESS_USUARIO_01); $this->setResult(false); }

		$query = "select * from usuario where id_usuario = ".$id." limit 1";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_FND_01);
			$this->setResult($result);
		} else {
			$usuario = new Usuario();
			$usuario->setIDUsuario($result[0]["id_usuario"]);
			$usuario->setIDTipoUsuario($result[0]["id_tipo_usuario"]);
			$usuario->setNome($result[0]["nome"]);
			$usuario->setUsuario($result[0]["usuario"]);
			$usuario->setSenha($result[0]["senha"]);
			$usuario->setDataNascimento($result[0]["dt_nascimento"]);
			$usuario->setEMail($result[0]["email"]);
			
			$this->setResult($usuario);
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
			$this->addMessage($this->get_class(), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_USUARIO_LST_01);
			$this->setResult($result);
		} else {
			foreach ( $result as $array_item ) {
				$usuario = new Usuario();
				$usuario->setIDUsuario($array_item["id_usuario"]);
				$usuario->setIDTipoUsuario($array_item["id_tipo_usuario"]);
				$usuario->setNome($array_item["nome"]);
				$usuario->setUsuario($array_item["usuario"]);
				$usuario->setSenha($array_item["senha"]);
				$usuario->setDataNascimento($array_item["dt_nascimento"]);
				$usuario->setEMail($array_item["email"]);
				
				$usuario_list[] = $usuario;
			}
			$this->setResult($usuario_list);
		}
	}
}
?>
