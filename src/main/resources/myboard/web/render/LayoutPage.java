/**
 * Layout Web para Página padrão.
 */

package main.resources.myboard.web.render;

/**
 * Classe contendo o Layout Web externo da página.
 *
 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
 * @version %I%, %G%
 */
public class LayoutPage implements InterfaceWebLayout {
	private StringBuilder layout_string;	
	private String title;
	private String[] stylesheets;
	private String[] scripts;
	private String content;
	
	/**
	 * @param t Titulo da Página
	 * @param scr Lista de Scripts para a Página
	 * @param css Lista de Estilos para a Página
	 * @param c Conteúdo a ser incluído na Página
	 *
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public LayoutPage( String t, String[] scr, String[] css, String c ) {
		title = "myBoard - " + t;
		stylesheets = css;
		scripts = scr;
		content = c;
		
		this.setLayout();
	}

	public void setLayout() {
		layout_string = new StringBuilder();
		layout_string.append("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
		layout_string.append("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"\n");
		layout_string.append("  \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n");
		layout_string.append("<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"pt\" lang=\"pt\">\n");
		layout_string.append("  <head>\n");
		layout_string.append("    <title>" + title + "</title>\n");
		layout_string.append("    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\n");
		layout_string.append("    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=7\" />\n");
		layout_string.append("    <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js\"></script>\n");
		
		for ( String name : scripts )
			layout_string.append("    <script type=\"text/javascript\" src=\"" + name + "\"></script>\n");
		
		for ( String name : stylesheets )
			layout_string.append("    <link rel=\"stylesheet\" type=\"text/css\" href=\"" + name + "\" media=\"screen\" />\n");

		layout_string.append("  </head>\n");
		layout_string.append("  <body>\n");
		layout_string.append("    <!-- <BACKGROUND> -->\n");
		layout_string.append("    <script type=\"text/javascript\" charset=\"utf-8\">\n");
		layout_string.append("      $(function() {\n");
		layout_string.append("        $('#gradientSky').gradient({ from: '052041', to: '00BAFF', direction: 'horizontal' });\n");
		layout_string.append("        $('#gradientFloor').gradient({ from: '8BC132', to: '1F3F02', direction: 'horizontal' });\n");
		layout_string.append("      });\n");
		layout_string.append("    </script>\n");
		layout_string.append("    <div id=\"gradientSky\" class=\"sky\">\n");
		layout_string.append("      <img class=\"horizon\" alt=\"\" src=\"drawable/horizon.png\" />\n");
		layout_string.append("      <img class=\"sun\" alt=\"\" src=\"drawable/sun.png\" />\n");
		layout_string.append("    </div>\n");
		layout_string.append("    <div id=\"gradientFloor\" class=\"floor\"></div>\n");
		layout_string.append("    <img class=\"logo\" alt=\"\" src=\"drawable/logo.png\" />\n");
		layout_string.append("    <img class=\"grass01\" alt=\"\" src=\"drawable/grass/01.png\" />\n");
		layout_string.append("    <img class=\"grass02\" alt=\"\" src=\"drawable/grass/02.png\" />\n");
		layout_string.append("    <img class=\"grass03\" alt=\"\" src=\"drawable/grass/03.png\" />\n");
		layout_string.append("    <img class=\"grass04\" alt=\"\" src=\"drawable/grass/04.png\" />\n");
		layout_string.append("    <!-- </BACKGROUND> -->\n");
		layout_string.append( content + "\n" );
		layout_string.append("  </body>\n");
		layout_string.append("</html>");
	}

	public String getLayout() {
		if ( layout_string.length() == 0 )
			layout_string.append("<!-- ERRO["+ this.getClass().getName() +"]: Conteúdo Vazio -->\n");
		return layout_string.toString();
	}

}
