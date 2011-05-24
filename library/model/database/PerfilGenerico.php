<?php
/**
 * Abstra��o da Tabela Perfil Gen�rico
 */

/**
 * Artefato de abstra��o da Tabela Perfil Gen�rico
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class PerfilGenerico {
	private $id_perfil_generico;
	private $descricao;

	/**
	 * Define o C�digo do Perfil Gen�rico
	 * 
	 * @param $value C�digo do Perfil Gen�rico
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDPerfilGenerico( $value ) {
		$this->id_perfil_generico = $value;
	}

	/**
	 * Define a Descri��o do Perfil Gen�rico
	 * 
	 * @param $value Descri��o do Perfil Gen�rico
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDescricao( $value ) {
		$this->descricao = $value;
	}

	/**
	 * Obtem o C�digo do Perfil Gen�rico
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getIDPerfilGenerico() {
		return($this->id_perfil_generico);
	}
	
	/**
	 * Obtem a Descri��o do Perfil Gen�rico
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
