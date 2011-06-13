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
	private $tipo;
	private $nome;
	private $descricao;
	private $nivel;

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
	 * Define a Tipo da Permissão
	 * 
	 * @param $value Tipo da Permissão
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setTipo( $value ) {
		$this->tipo = $value;
	}

	/**
	 * Define o Nome da Permissão
	 * 
	 * @param $value Nome da Permissão
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setNome( $value ) {
		$this->nome = $value;
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
	 * Define o Nivel da Permissão
	 * 
	 * @param $value Nivel da Permissão
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setNivel( $value ) {
		$this->nivel = $value;
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
	 * Obtem a Tipo da Permissão
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getTipo() {
		return($this->tipo);
	}

	/**
	 * Obtem o Nome da Permissão
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getNome() {
		return($this->nome);
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

	/**
	 * Obtem o Nivel da Permissão
	 * 
	 * @return Integer
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getNivel() {
		return($this->nivel);
	}
}
?>
