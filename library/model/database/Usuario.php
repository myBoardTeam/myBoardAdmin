<?php
/**
 * Abstra��o da Tabela Usu�rio
 */

/**
 * Artefato de abstra��o da Tabela Usu�rio
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class Usuario {
	private $id_usuario;
	private $id_tipo_usuario;
	private $nome;
	private $usuario;
	private $senha;
	private $dt_nascimento;
	private $email;

	/**
	 * Define o C�digo do Usu�rio
	 * 
	 * @param $value C�digo do Usu�rio
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDUsuario( $value ) {
		$this->id_usuario = $value;
	}
	/**
	 * Define o Tipo do Usu�rio
	 * 
	 * @param $value Tipo do Usu�rio
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDTipoUsuario( $value ) {
		$this->id_tipo_usuario = $value;
	}
	
	/**
	 * Define o Nome do Usu�rio
	 * 
	 * @param $value Nome do Usu�rio
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setNome( $value ) {
		$this->nome = $value;
	}

	/**
	 * Define o Login do Usu�rio
	 * 
	 * @param $value Login do Usu�rio
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setUsuario( $value ) {
		$this->usuario = $value;
	}

	/**
	 * Define o Senha do Usu�rio
	 * 
	 * @param $value Senha do Usu�rio
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setSenha( $value ) {
		$this->senha = $value;
	}

	/**
	 * Define o Data de Nascimento
	 * 
	 * @param $value Data de Nascimento
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setDataNascimento( $value ) {
		$this->dt_nascimento = $value;
	}

	/**
	 * Define o E-Mail do Usu�rio
	 * 
	 * @param $value E-Mail do Usu�rio
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setEMail( $value ) {
		$this->email = $value;
	}

	/**
	 * Obtem o C�digo do Usu�rio
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getIDUsuario() {
		return($this->id_usuario);
	}
	
	/**
	 * Obtem o Tipo do Usu�rio
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getIDTipoUsuario() {
		return($this->id_tipo_usuario);
	}
	
	/**
	 * Obtem o Nome do Usu�rio
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
	 * Obtem o Login do Usu�rio
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getUsuario() {
		return($this->usuario);
	}
	
	/**
	 * Obtem o Senha do Usu�rio
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getSenha() {
		return($this->senha);
	}
	
	/**
	 * Obtem o Data de Nascimento
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getDataNascimento() {
		return($this->dt_nascimento);
	}
	
	/**
	 * Obtem o E-Mail do Usu�rio
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getEMail() {
		return($this->email);
	}
}
?>
