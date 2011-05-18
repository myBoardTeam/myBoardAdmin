package main.resources.myboard.connection.database;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Set;


/**
 * The persistent class for the materia database table.
 * 
 */
@Entity
@Table(name="materia")
public class Materia implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name="id_materia")
	private int idMateria;

	private String descricao;

	//bi-directional many-to-one association to UsuarioMateria
	@OneToMany(mappedBy="materia")
	private Set<UsuarioMateria> usuarioMaterias;

    public Materia() {
    }

	public int getIdMateria() {
		return this.idMateria;
	}

	public void setIdMateria(int idMateria) {
		this.idMateria = idMateria;
	}

	public String getDescricao() {
		return this.descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public Set<UsuarioMateria> getUsuarioMaterias() {
		return this.usuarioMaterias;
	}

	public void setUsuarioMaterias(Set<UsuarioMateria> usuarioMaterias) {
		this.usuarioMaterias = usuarioMaterias;
	}
	
}