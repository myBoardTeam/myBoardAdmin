/**
 * Layout Web para a Janela.
 */

package main.resources.myboard.web.render;

/**
 * Classe contendo o Layout Web da Janela.
 *
 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
 * @version %I%, %G%
 */
public class LayoutWindow implements InterfaceWebLayout {
	private StringBuilder layout_string;	
	private String title;
	private String content;
	
	/**
	 * @param t Titulo da Janela
	 * @param c Conteúdo a ser incluído na Janela
	 *
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public LayoutWindow( String t, String c ) {
		title =  t;
		content = c;
		
		this.setLayout();
	}

	public void setLayout() {
		layout_string = new StringBuilder();
		
		layout_string.append("<!-- <WINDOW> -->\n");
		layout_string.append("<script type=\"text/javascript\" charset=\"utf-8\">\n");
		layout_string.append("  $(function() {\n");
		layout_string.append("    $('#closeWindow').hover( function(){ $(this).attr( \"src\", \"drawable/window/close/pressed.png\"); }, function(){ $(this).attr( \"src\", \"drawable/window/close/normal.png\"); } );\n");
		layout_string.append("    $('#formWindow').borderImage( 'url(\"drawable/window/background.png\") 25 50 50 50 stretch stretch' );\n");
		layout_string.append("    $('#scrollPane').each(\n");
		layout_string.append("      function() {\n");
		layout_string.append("        $(this).jScrollPane();\n");
		layout_string.append("        var api = $(this).data('jsp');\n");
		layout_string.append("        var throttleTimeout;\n");
		layout_string.append("        $(window).bind( 'resize',\n");
		layout_string.append("          function() {\n");
		layout_string.append("            if ($.browser.msie) {\n");
		layout_string.append("              if (!throttleTimeout) {\n");
		layout_string.append("                throttleTimeout = setTimeout( function() { api.reinitialise(); throttleTimeout = null; }, 50 );\n");
		layout_string.append("              }\n");
		layout_string.append("            } else { api.reinitialise(); }\n");
		layout_string.append("          }\n");
		layout_string.append("        );\n");
		layout_string.append("      }\n");
		layout_string.append("    );\n");
		layout_string.append("  });\n");
		layout_string.append("</script>\n");
		layout_string.append("<div class=\"windowHeader\">\n");
		layout_string.append("  <div class=\"windowTitle\">" + title + "</div>\n");
		layout_string.append("  <a href=\"index.jsp\"><img id=\"closeWindow\" class=\"cornerButton\" alt=\"Fechar Janela\" src=\"drawable/window/close/normal.png\" /></a>\n");
		layout_string.append("</div>\n");
		layout_string.append("<div id=\"formWindow\" class=\"windowBackground\">\n");
		layout_string.append("  <div id=\"scrollPane\" class=\"windowContent\">\n");
		layout_string.append( content + "\n" );
		layout_string.append("  </div>\n");
		layout_string.append("</div>\n");
		layout_string.append("<!-- </WINDOW> -->\n");
	}

	public String getLayout() {
		if ( layout_string.length() == 0 )
			layout_string.append("<!-- ERRO["+ this.getClass().getName() +"]: Conteúdo Vazio -->\n");
		return layout_string.toString();
	}
}
