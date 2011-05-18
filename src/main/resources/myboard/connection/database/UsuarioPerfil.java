package main.resources.myboard.connection.database;

import java.io.Serializable;
import javax.persistence.*;


/**
 * The persistent class for the usuario_perfil database table.
 * 
 */
@Entity
@Table(name="usuario_perfil")
public class UsuarioPerfil implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name="id_usuario_perfil")
	private int idUsuarioPerfil;

	//bi-directional many-to-one association to PerfilGenerico
    @ManyToOne
	@JoinColumn(name="id_perfil")
	private PerfilGenerico perfilGenerico;

	//bi-directional many-to-one association to Usuario
    @ManyToOne
	@JoinColumn(name="id_usuario")
	private Usuario usuario;

    public UsuarioPerfil() {
    }

	public int getIdUsuarioPerfil() {
		return this.idUsuarioPerfil;
	}

	public void setIdUsuarioPerfil(int idUsuarioPerfil) {
		this.idUsuarioPerfil = idUsuarioPerfil;
	}

	public PerfilGenerico getPerfilGenerico() {
		return this.perfilGenerico;
	}

	public void setPerfilGenerico(PerfilGenerico perfilGenerico) {
		this.perfilGenerico = perfilGenerico;
	}
	
	public Usuario getUsuario() {
		return this.usuario;
	}

	public void setUsuario(Usuario usuario) {
		this.usuario = usuario;
	}
	
}