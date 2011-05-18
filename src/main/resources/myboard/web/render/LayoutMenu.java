/**
 * Layout Web para o Menu do Sistema.
 */

package main.resources.myboard.web.render;

/**
 * Classe contendo o Layout Web do Menu do Sistema.
 *
 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
 * @version %I%, %G%
 */
public class LayoutMenu implements InterfaceWebLayout {
	private StringBuilder layout_string;
	
	/**
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public LayoutMenu() {
		this.setLayout();
	}

	public void setLayout() {
		layout_string = new StringBuilder();
		
		layout_string.append("    <!-- <DASHBOARD> -->\n");
		layout_string.append("    <div class=\"menu\">\n");
		layout_string.append("      <script type=\"text/javascript\" charset=\"utf-8\">\n");
		layout_string.append("        $(function() {\n");
		layout_string.append("          $('#tileUsuarios').hover( function(){ $(this).attr( \"src\", \"drawable/tiles/usuarios/pressed.png\"); }, function(){ $(this).attr( \"src\", \"drawable/tiles/usuarios/normal.png\"); } );\n");
		layout_string.append("          $('#tilePerfis').hover( function(){ $(this).attr( \"src\", \"drawable/tiles/perfis/pressed.png\"); }, function(){ $(this).attr( \"src\", \"drawable/tiles/perfis/normal.png\"); } );\n");
		layout_string.append("          $('#tileMaterias').hover( function(){ $(this).attr( \"src\", \"drawable/tiles/materias/pressed.png\"); }, function(){ $(this).attr( \"src\", \"drawable/tiles/materias/normal.png\"); } );\n");
		layout_string.append("          $('#tileFerramentas').hover( function(){ $(this).attr( \"src\", \"drawable/tiles/ferramentas/pressed.png\"); }, function(){ $(this).attr( \"src\", \"drawable/tiles/ferramentas/normal.png\"); } );\n");
		layout_string.append("        });\n");
		layout_string.append("      </script>\n");
		layout_string.append("      <a href=\"usuarios.jsp\"><img id=\"tileUsuarios\" class=\"item\" alt=\"Usuários\" src=\"drawable/tiles/usuarios/normal.png\" /></a>\n");
		layout_string.append("      <a href=\"perfis.jsp\"><img id=\"tilePerfis\" class=\"item\" alt=\"Perfis\" src=\"drawable/tiles/perfis/normal.png\" /></a>\n");
		layout_string.append("      <a href=\"materias.jsp\"><img id=\"tileMaterias\" class=\"item\" alt=\"Matérias\" src=\"drawable/tiles/materias/normal.png\" /></a>\n");
		layout_string.append("      <a href=\"ferramentas.jsp\"><img id=\"tileFerramentas\" class=\"item\" alt=\"Ferramentas\" src=\"drawable/tiles/ferramentas/normal.png\" /></a>\n");
		layout_string.append("    </div>\n");
		layout_string.append("    <!-- </DASHBOARD> -->\n");
	}

	public String getLayout() {
		if ( layout_string.length() == 0 )
			layout_string.append("<!-- ERRO["+ this.getClass().getName() +"]: Conteúdo Vazio -->\n");
		return layout_string.toString();
	}
}
