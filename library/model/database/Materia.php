<?php
/**
 * Abstração da Tabela Matéria
 */

/**
 * Artefato de abstração da Tabela Matéria
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class Materia {
	private $id_materia;
	private $descricao;

	/**
	 * Define o Código da Matéria
	 * 
	 * @param $value Código da Matéria
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDMateria( $value ) {
		$this->id_materia = $value;
	}

	/**
	 * Define a Descrição da Matéria
	 * 
	 * @param $value Descrição da Matéria
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDescricao( $value ) {
		$this->descricao = $value;
	}

	/**
	 * Obtem o Código da Matéria
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
	 * Obtem a Descrição da Matéria
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
