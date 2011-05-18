package main.resources.myboard.connection.database;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.Set;


/**
 * The persistent class for the usuario database table.
 * 
 */
@Entity
@Table(name="usuario")
public class Usuario implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name="id_usuario")
	private int idUsuario;

    @Temporal( TemporalType.DATE)
	@Column(name="dt_nascimento")
	private Date dtNascimento;

	private String email;

	private String nome;

	private String senha;

	private String usuario;

	//bi-directional many-to-one association to TipoUsuario
    @ManyToOne
	@JoinColumn(name="id_tipo_usuario")
	private TipoUsuario tipoUsuario;

	//bi-directional many-to-one association to UsuarioMateria
	@OneToMany(mappedBy="usuario")
	private Set<UsuarioMateria> usuarioMaterias;

	//bi-directional many-to-one association to UsuarioPerfil
	@OneToMany(mappedBy="usuario")
	private Set<UsuarioPerfil> usuarioPerfils;

	//bi-directional many-to-one association to UsuarioPermissao
	@OneToMany(mappedBy="usuario")
	private Set<UsuarioPermissao> usuarioPermissaos;

    public Usuario() {
    }

	public int getIdUsuario() {
		return this.idUsuario;
	}

	public void setIdUsuario(int IdUsuario) {
		this.idUsuario = IdUsuario;
	}

	public Date getDtNascimento() {
		return this.dtNascimento;
	}

	public void setDtNascimento(Date dtNascimento) {
		this.dtNascimento = dtNascimento;
	}

	public String getEmail() {
		return this.email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getNome() {
		return this.nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getSenha() {
		return this.senha;
	}

	public void setSenha(String senha) {
		this.senha = senha;
	}

	public String getUsuario() {
		return this.usuario;
	}

	public void setUsuario(String usuario) {
		this.usuario = usuario;
	}

	public TipoUsuario getTipoUsuario() {
		return this.tipoUsuario;
	}

	public void setTipoUsuario(TipoUsuario tipoUsuario) {
		this.tipoUsuario = tipoUsuario;
	}
	
	public Set<UsuarioMateria> getUsuarioMaterias() {
		return this.usuarioMaterias;
	}

	public void setUsuarioMaterias(Set<UsuarioMateria> usuarioMaterias) {
		this.usuarioMaterias = usuarioMaterias;
	}
	
	public Set<UsuarioPerfil> getUsuarioPerfils() {
		return this.usuarioPerfils;
	}

	public void setUsuarioPerfils(Set<UsuarioPerfil> usuarioPerfils) {
		this.usuarioPerfils = usuarioPerfils;
	}
	
	public Set<UsuarioPermissao> getUsuarioPermissaos() {
		return this.usuarioPermissaos;
	}

	public void setUsuarioPermissaos(Set<UsuarioPermissao> usuarioPermissaos) {
		this.usuarioPermissaos = usuarioPermissaos;
	}
	
}