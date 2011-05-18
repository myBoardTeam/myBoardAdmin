package main.resources.myboard.connection.database;

import java.io.Serializable;
import javax.persistence.*;


/**
 * The persistent class for the usuario_permissao database table.
 * 
 */
@Entity
@Table(name="usuario_permissao")
public class UsuarioPermissao implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name="id_usuario_permissao")
	private int idUsuarioPermissao;

	private int nivel;

	//bi-directional many-to-one association to Permissao
    @ManyToOne
	@JoinColumn(name="id_permissao")
	private Permissao permissao;

	//bi-directional many-to-one association to Usuario
    @ManyToOne
	@JoinColumn(name="id_usuario")
	private Usuario usuario;

    public UsuarioPermissao() {
    }

	public int getIdUsuarioPermissao() {
		return this.idUsuarioPermissao;
	}

	public void setIdUsuarioPermissao(int idUsuarioPermissao) {
		this.idUsuarioPermissao = idUsuarioPermissao;
	}

	public int getNivel() {
		return this.nivel;
	}

	public void setNivel(int nivel) {
		this.nivel = nivel;
	}

	public Permissao getPermissao() {
		return this.permissao;
	}

	public void setPermissao(Permissao permissao) {
		this.permissao = permissao;
	}
	
	public Usuario getUsuario() {
		return this.usuario;
	}

	public void setUsuario(Usuario usuario) {
		this.usuario = usuario;
	}
	
}