<?php
/**
 * Abstração da Tabela Usuário
 */

/**
 * Artefato de abstração da Tabela Usuário
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
	 * Define o Código do Usuário
	 * 
	 * @param $value Código do Usuário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDUsuario( $value ) {
		$this->id_usuario = $value;
	}
	/**
	 * Define o Tipo do Usuário
	 * 
	 * @param $value Tipo do Usuário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setIDTipoUsuario( $value ) {
		$this->id_tipo_usuario = $value;
	}
	
	/**
	 * Define o Nome do Usuário
	 * 
	 * @param $value Nome do Usuário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setNome( $value ) {
		$this->nome = $value;
	}

	/**
	 * Define o Login do Usuário
	 * 
	 * @param $value Login do Usuário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setUsuario( $value ) {
		$this->usuario = $value;
	}

	/**
	 * Define o Senha do Usuário
	 * 
	 * @param $value Senha do Usuário
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
	 * Define o E-Mail do Usuário
	 * 
	 * @param $value E-Mail do Usuário
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setEMail( $value ) {
		$this->email = $value;
	}

	/**
	 * Obtem o Código do Usuário
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
	 * Obtem o Tipo do Usuário
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
	 * Obtem o Nome do Usuário
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
	 * Obtem o Login do Usuário
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
	 * Obtem o Senha do Usuário
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
	 * Obtem o E-Mail do Usuário
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
