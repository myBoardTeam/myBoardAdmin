package main.resources.myboard.connection.database;

import java.io.Serializable;
import javax.persistence.*;


/**
 * The persistent class for the usuario_materia database table.
 * 
 */
@Entity
@Table(name="usuario_materia")
public class UsuarioMateria implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name="id_usuario_materia")
	private int idUsuarioMateria;

	//bi-directional many-to-one association to Materia
    @ManyToOne
	@JoinColumn(name="id_materia")
	private Materia materia;

	//bi-directional many-to-one association to Usuario
    @ManyToOne
	@JoinColumn(name="id_usuario")
	private Usuario usuario;

    public UsuarioMateria() {
    }

	public int getIdUsuarioMateria() {
		return this.idUsuarioMateria;
	}

	public void setIdUsuarioMateria(int idUsuarioMateria) {
		this.idUsuarioMateria = idUsuarioMateria;
	}

	public Materia getMateria() {
		return this.materia;
	}

	public void setMateria(Materia materia) {
		this.materia = materia;
	}
	
	public Usuario getUsuario() {
		return this.usuario;
	}

	public void setUsuario(Usuario usuario) {
		this.usuario = usuario;
	}
	
}