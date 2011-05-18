package main.resources.myboard.connection.database;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Set;


/**
 * The persistent class for the permissao database table.
 * 
 */
@Entity
@Table(name="permissao")
public class Permissao implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name="id_permissao")
	private int idPermissao;

	private String descricao;

	//bi-directional many-to-one association to UsuarioPermissao
	@OneToMany(mappedBy="permissao")
	private Set<UsuarioPermissao> usuarioPermissaos;

    public Permissao() {
    }

	public int getIdPermissao() {
		return this.idPermissao;
	}

	public void setIdPermissao(int idPermissao) {
		this.idPermissao = idPermissao;
	}

	public String getDescricao() {
		return this.descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public Set<UsuarioPermissao> getUsuarioPermissaos() {
		return this.usuarioPermissaos;
	}

	public void setUsuarioPermissaos(Set<UsuarioPermissao> usuarioPermissaos) {
		this.usuarioPermissaos = usuarioPermissaos;
	}
	
}