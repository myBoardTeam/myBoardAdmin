<?php
/**
 * Abstra��o da Tabela Permiss�o
 */

/**
 * Artefato de abstra��o da Tabela Permiss�o
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class Permissao {
	private $id_permissao;
	private $descricao;

	/**
	 * Define o C�digo da Permiss�o
	 * 
	 * @param $value C�digo da Permiss�o
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDPermissao( $value ) {
		$this->id_permissao = $value;
	}

	/**
	 * Define a Descri��o da Permiss�o
	 * 
	 * @param $value Descri��o da Permiss�o
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDescricao( $value ) {
		$this->descricao = $value;
	}

	/**
	 * Obtem o C�digo da Permiss�o
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
	 * Obtem a Descri��o da Permiss�o
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
