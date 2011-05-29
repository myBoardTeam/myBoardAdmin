<?php
/**
 * Acesso a Tabela de Matérias no Banco de Dados
 */

require_once(PROJECT_PATH."/library/model/access/AbstractAccess.php");
require_once(PROJECT_PATH."/library/model/database/Usuario.php");
require_once(PROJECT_PATH."/library/model/database/Materia.php");

/**
 * Classe de acesso a Tabela de Matérias no Banco de Dados
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class AccessMateria extends AbstractAccess {

	/**
	 * Inserir Matéria no Banco de Dados
	 *
	 * @param $item Matéria a ser incluida
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function insertItem( $item ) {
		$fname = "insertItem()";
		
		if ( $item->getDescricao() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_NN_02); $this->setResult(false); }
			
		$query  = "insert into materia(";
		$query .= " descricao";
		$query .= " ) values (";
		$query .= " '".addslashes($item->getDescricao())."'";
		$query .= " )";
			
		if (!$result = $this->database_connection->runQuery( $query, DB_INSERT ))
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_INS_01);

		$this->setResult($result);
	}
	
	/**
	 * Atualizar Matéria no Banco de Dados
	 *
	 * @param $item Matéria a ser atualizada
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function updateItem( $item ) {
		$fname = "updateItem()";
		
		if ( !$item->getIDMateria() > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_NN_01); $this->setResult(false); }
		if ( $item->getDescricao() == "") { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_NN_02); $this->setResult(false); }
			
		$query  = "update materia set";
		$query .= " descricao = '".addslashes($item->getDescricao())."'";
		$query .= " where id_materia = ".$item->getIDMateria();
			
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_UPD_01);
			
		$this->setResult($result);		
	}
	
	/**
	 * Excluir Matéria no Banco de Dados
	 *
	 * @param $id Codigo da Matéria a ser excluida
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function deleteItem( $id ) {
		$fname = "deleteItem()";

		if ( !$id > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_NN_01); $this->setResult(false); }
		
		$query = "delete from usuario_materia where id_materia = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage(get_class($this), $fname, MB_WARNING, MB_SHOW, LOC_EMSG_ACC_MATERIA_DEL_01);

		$query = "delete from materia where id_materia = ".$id;
		if (!$result = $this->database_connection->runQuery( $query, DB_UPDATE ))
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_DEL_02);
			
		$this->setResult($result);
	}
	
	/**
	 * Obter uma Matéria específica no Banco de Dados
	 *
	 * @param $id Codigo da Matéria
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function find( $id ) {
		$fname = "find()";
		
		if ( !$id > 0 ) { $this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_NN_01); $this->setResult(false); }

		$query = "select * from materia where id_materia = ".$id." limit 1";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_FND_01);
			$this->setResult($result);
		} else {
			$materia = new Materia();
			$materia->setIDMateria($result[0]["id_materia"]);
			$materia->setDescricao($result[0]["descricao"]);
			
			$this->setResult($materia);
		}
	}
	
	/**
	 * Obter uma lista de todas as Matérias no Banco de Dados
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function listAll(){
		$fname = "listAll()";
		
		$query = "select * from materia";
		
		if (!$result = $this->database_connection->runQuery( $query, DB_SELECT )) {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_SHOW, LOC_EMSG_ACC_MATERIA_LST_01);
			$this->setResult($result);
		} else {
			foreach ( $result as $array_item ) {
				$materia = new Materia();
				$materia->setIDMateria($array_item["id_materia"]);
				$materia->setDescricao($array_item["descricao"]);
				
				$materia_list[] = $materia;
			}
			$this->setResult($materia_list);
		}
	}
}
?>
