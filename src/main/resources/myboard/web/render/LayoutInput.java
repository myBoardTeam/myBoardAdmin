/**
 * Layout Web para Input de Texto Simples.
 */

package main.resources.myboard.web.render;

/**
 * Classe contendo o Layout Web do Input de Texto Simples.
 *
 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
 * @version %I%, %G%
 */
public class LayoutInput implements InterfaceWebLayout {
	protected StringBuilder layout_string;	
	protected String label;
	protected String name;
	protected String value;
	
	/**
	 * @param l Label do Campo
	 * @param n Nome do Campo
	 * @param v Valor do Campo
	 *
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public LayoutInput( String l, String n, String v ) {
		label =  n;
		name = n;
		value = v;
		
		this.setLayout();
	}

	public void setLayout() {
		layout_string = new StringBuilder();
		
		layout_string.append("<!-- <TEXTINPUT> -->\n");
		layout_string.append("<script type=\"text/javascript\" charset=\"utf-8\">\n");
		layout_string.append("  $(function() {\n");
		layout_string.append("    $('.inputText').borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' );\n");
		layout_string.append("    $('.inputText').focus( function(){ $(this).borderImage( 'url(\"drawable/form/textbox/selected.png\") 15 20 20 15 stretch stretch' ); } );\n");
		layout_string.append("    $('.inputText').focusout( function(){ $(this).borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' ); } );\n");
		layout_string.append("  });\n");
		layout_string.append("</script>\n");
		layout_string.append("<p><b>" + label + "</b><br /><input type=\"text\" class=\"inputText\" name=\"" + name + "\" value=\"" + value + "\" /></p>\n");
		layout_string.append("<!-- </TEXTINPUT> -->\n");
	}

	public String getLayout() {
		if ( layout_string.length() == 0 )
			layout_string.append("<!-- ERRO["+ this.getClass().getName() +"]: Conteúdo Vazio -->\n");
		return layout_string.toString();
	}
}
