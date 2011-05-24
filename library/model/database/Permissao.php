<?php
/**
 * Abstração da Tabela Permissão
 */

/**
 * Artefato de abstração da Tabela Permissão
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class Permissao {
	private $id_permissao;
	private $descricao;

	/**
	 * Define o Código da Permissão
	 * 
	 * @param $value Código da Permissão
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDPermissao( $value ) {
		$this->id_permissao = $value;
	}

	/**
	 * Define a Descrição da Permissão
	 * 
	 * @param $value Descrição da Permissão
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDescricao( $value ) {
		$this->descricao = $value;
	}

	/**
	 * Obtem o Código da Permissão
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getIDPermissao() {
		return($this->id_permissao);
	}
	
	/**
	 * Obtem a Descrição da Permissão
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
