package main.resources.myboard;

import main.resources.myboard.connection.access.UsuarioDAO;
import main.resources.myboard.connection.database.Usuario;
import main.resources.myboard.utils.DateFormat;

public class Teste {

	public static void main(String[] args) throws Exception {
		UsuarioDAO test = new UsuarioDAO();
		Usuario t = test.findById(1);
		
		Usuario t2 = new Usuario();

		t2.setDtNascimento(DateFormat.ReturnDate("05/01/1987"));
		t2.setEmail("jpcallerani@live.com");
		/* t2.setIdUsuario(test.ReturnMaxID()); */
		t2.setNome("João");
		t2.setSenha("1234");
		t2.setTipoUsuario(test.FindUserTypeByName("ADM"));
		t2.setUsuario("jopaulo");
		test.insertRegister(t2);
		
		/* test.apagar(2); */
		System.out.println("Consultando: " + t.getNome());
	}
}