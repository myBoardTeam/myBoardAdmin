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
	private $tipo;
	private $nome;
	private $descricao;
	private $nivel;

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
	 * Define a Tipo da Permiss�o
	 * 
	 * @param $value Tipo da Permiss�o
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setTipo( $value ) {
		$this->tipo = $value;
	}

	/**
	 * Define o Nome da Permiss�o
	 * 
	 * @param $value Nome da Permiss�o
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setNome( $value ) {
		$this->nome = $value;
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
	 * Define o Nivel da Permiss�o
	 * 
	 * @param $value Nivel da Permiss�o
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setNivel( $value ) {
		$this->nivel = $value;
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
	 * Obtem a Tipo da Permiss�o
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
	 * Obtem o Nome da Permiss�o
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

	/**
	 * Obtem o Nivel da Permiss�o
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
