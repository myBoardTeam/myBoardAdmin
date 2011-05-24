<?php
/**
 * Abstração da Tabela Tipo de Usuário
 */

/**
 * Artefato de abstração da Tabela Tipo de Usuário
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class TipoUsuario {
	private $id_tipo;
	private $descricao;

	/**
	 * Define o Código do Tipo de Usuário
	 * 
	 * @param $value Código do Tipo de Usuário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDTipoUsuario( $value ) {
		$this->id_tipo = $value;
	}

	/**
	 * Define a Descrição do Tipo de Usuário
	 * 
	 * @param $value Descrição do Tipo de Usuário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDescricao( $value ) {
		$this->descricao = $value;
	}

	/**
	 * Obtem o Código do Tipo de Usuário
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
	 * Obtem a Descrição do Tipo de Usuário
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
