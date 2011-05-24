<?php
/**
 * Abstra��o da Tabela Tipo de Usu�rio
 */

/**
 * Artefato de abstra��o da Tabela Tipo de Usu�rio
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class TipoUsuario {
	private $id_tipo;
	private $descricao;

	/**
	 * Define o C�digo do Tipo de Usu�rio
	 * 
	 * @param $value C�digo do Tipo de Usu�rio
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDTipoUsuario( $value ) {
		$this->id_tipo = $value;
	}

	/**
	 * Define a Descri��o do Tipo de Usu�rio
	 * 
	 * @param $value Descri��o do Tipo de Usu�rio
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDescricao( $value ) {
		$this->descricao = $value;
	}

	/**
	 * Obtem o C�digo do Tipo de Usu�rio
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getIDTipoUsuario() {
		return($this->id_tipo);
	}
	
	/**
	 * Obtem a Descri��o do Tipo de Usu�rio
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
