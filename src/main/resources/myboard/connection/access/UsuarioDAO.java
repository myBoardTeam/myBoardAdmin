package main.resources.myboard.connection.access;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.EntityTransaction;
import javax.persistence.Persistence;

import main.resources.myboard.connection.database.TipoUsuario;
import main.resources.myboard.connection.database.Usuario;


public class UsuarioDAO {

	private EntityManager getEntityManager() {
		EntityManagerFactory factory = null;
		EntityManager entityManager = null;
		try {
			// Obtem o factory a partir da unidade de persistencia.
			factory = Persistence.createEntityManagerFactory("myBoardAdmin");
			// Cria um entity manager.
			entityManager = factory.createEntityManager();
		} catch (Exception ex) {
			ex.printStackTrace();
		}
		// finally { factory.close(); }
		return entityManager;
	}

	public void deleteRegister(int id) {
		EntityManager entityManager = getEntityManager();
		try {
			// Inicia uma transação com o banco de dados.
			entityManager.getTransaction().begin();
			// Consulta o cliente na base de dados através do seu ID.
			Usuario usuario = entityManager.find(Usuario.class, id);
			System.out.println("Excluindo o cliente: " + usuario.getNome());
			// Remove o cliente da base de dados.
			entityManager.remove(usuario);
			// Finaliza a transação.
			entityManager.getTransaction().commit();
		} catch (Exception ex) {
			ex.printStackTrace();
			entityManager.getTransaction().rollback();
		} finally {
			entityManager.close();
		}
	}

	public void insertRegister(Usuario user) throws Exception {
		EntityManager v_entitymanager_em = getEntityManager();
		EntityTransaction v_entitytransaction_tx = v_entitymanager_em.getTransaction();
		try {
			v_entitytransaction_tx.begin();
			v_entitymanager_em.merge(user);			
		} catch (Exception e) {
			v_entitytransaction_tx.rollback();
		}finally {
			v_entitytransaction_tx.commit();
			v_entitymanager_em.close();
		}
	}

	public Usuario findById(Number id) {
		EntityManager entityManager = getEntityManager();
		Usuario usuario = null;
		try {
			// Consulta o cliente pelo ID.
			usuario = entityManager.find(Usuario.class, id);
		} catch (Exception ex) {
			ex.printStackTrace();
		} finally {
			entityManager.close();
		}
		// Retorna o cliente consultado.
		return usuario;
	}

/*	public void ReturnMaxID() {
		EntityManager entityManager = getEntityManager();
		int v_int_maxid = 0;
		try {
			// Inicia uma transação com o banco de dados.
			entityManager.getTransaction().begin();
			// Consulta o cliente na base de dados através do seu ID.
			Usuario usuario = entityManager.find(Usuario.class, 1);
			v_int_maxid = usuario.getIdUsuario();
		} catch (Exception ex) {
			ex.printStackTrace();
		} finally {
			entityManager.close();
			 return v_int_maxid = v_int_maxid + 1; 
		}
	}	
*/
	@SuppressWarnings("finally")
	public TipoUsuario FindUserTypeByName(String name) {
		EntityManager entityManager = getEntityManager();
		TipoUsuario usuario = null;
		try {
			// Consulta o cliente pelo ID.
			usuario = entityManager.find(TipoUsuario.class, name);
		} catch (Exception ex) {
			ex.printStackTrace();
		} finally {
			entityManager.close();
			return usuario;
		}
	}
}