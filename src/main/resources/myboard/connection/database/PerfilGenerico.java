package main.resources.myboard.connection.database;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Set;


/**
 * The persistent class for the perfil_generico database table.
 * 
 */
@Entity
@Table(name="perfil_generico")
public class PerfilGenerico implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name="id_perfil_generico")
	private int idPerfilGenerico;

	@Column(name="descricao")
	private String descricao;

	//bi-directional many-to-one association to UsuarioPerfil
	@OneToMany(mappedBy="perfilGenerico")
	private Set<UsuarioPerfil> usuarioPerfils;

    public PerfilGenerico() {
    }

	public int getIdPerfilGenerico() {
		return this.idPerfilGenerico;
	}

	public void setIdPerfilGenerico(int idPerfilGenerico) {
		this.idPerfilGenerico = idPerfilGenerico;
	}

	public String getDescricao() {
		return this.descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public Set<UsuarioPerfil> getUsuarioPerfils() {
		return this.usuarioPerfils;
	}

	public void setUsuarioPerfils(Set<UsuarioPerfil> usuarioPerfils) {
		this.usuarioPerfils = usuarioPerfils;
	}
	
}