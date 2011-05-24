<?php
/**
 * Abstração da Tabela Perfil Genérico
 */

/**
 * Artefato de abstração da Tabela Perfil Genérico
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class PerfilGenerico {
	private $id_perfil_generico;
	private $descricao;

	/**
	 * Define o Código do Perfil Genérico
	 * 
	 * @param $value Código do Perfil Genérico
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDPerfilGenerico( $value ) {
		$this->id_perfil_generico = $value;
	}

	/**
	 * Define a Descrição do Perfil Genérico
	 * 
	 * @param $value Descrição do Perfil Genérico
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDescricao( $value ) {
		$this->descricao = $value;
	}

	/**
	 * Obtem o Código do Perfil Genérico
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
	 * Obtem a Descrição do Perfil Genérico
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
