<?php
/**
 * Abstra��o da Tabela Mat�ria
 */

/**
 * Artefato de abstra��o da Tabela Mat�ria
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class Materia {
	private $id_materia;
	private $descricao;

	/**
	 * Define o C�digo da Mat�ria
	 * 
	 * @param $value C�digo da Mat�ria
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDMateria( $value ) {
		$this->id_materia = $value;
	}

	/**
	 * Define a Descri��o da Mat�ria
	 * 
	 * @param $value Descri��o da Mat�ria
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDescricao( $value ) {
		$this->descricao = $value;
	}

	/**
	 * Obtem o C�digo da Mat�ria
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getIDMateria() {
		return($this->id_materia);
	}
	
	/**
	 * Obtem a Descri��o da Mat�ria
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getDescricao() {
		return($this->descricao);
	}
}
?>
