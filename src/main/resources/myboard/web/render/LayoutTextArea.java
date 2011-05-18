/**
 * Layout Web para Área de Texto (mútiplas linhas).
 */

package main.resources.myboard.web.render;

/**
 * Classe contendo o Layout Web da Área de Texto (múltiplas linhas).
 *
 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
 * @version %I%, %G%
 */
public class LayoutTextArea implements InterfaceWebLayout {
	protected StringBuilder layout_string;	
	protected String label;
	protected String name;
	protected String value;
	protected Integer rows;
	
	/**
	 * @param l Label do Campo
	 * @param n Nome do Campo
	 * @param v Valor do Campo
	 * @param r Linhas do Campo
	 *
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public LayoutTextArea(String l, String n, String v, Integer r) {
		label =  n;
		name = n;
		value = v;
		rows = r;
		
		this.setLayout();
	}

	public void setLayout() {
		layout_string = new StringBuilder();
		
		layout_string.append("<!-- <TEXTAREA> -->\n");
		layout_string.append("<script type=\"text/javascript\" charset=\"utf-8\">\n");
		layout_string.append("  $(function() {\n");
		layout_string.append("    $('.textArea').borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' );\n");
		layout_string.append("    $('.textArea').focus( function(){ $(this).borderImage( 'url(\"drawable/form/textbox/selected.png\") 15 20 20 15 stretch stretch' ); } );\n");
		layout_string.append("    $('.textArea').focusout( function(){ $(this).borderImage( 'url(\"drawable/form/textbox/normal.png\") 15 20 20 15 stretch stretch' ); } );\n");
		layout_string.append("  });\n");
		layout_string.append("</script>\n");
		layout_string.append("<p><b>" + label + "</b><br /><textarea class=\"textArea\" rows=\"" + rows + "\" name=\"" + name + "\">" + value + "</textarea></p>\n");
		layout_string.append("<!-- </TEXTAREA> -->\n");
	}

	public String getLayout() {
		if ( layout_string.length() == 0 )
			layout_string.append("<!-- ERRO["+ this.getClass().getName() +"]: Conteúdo Vazio -->\n");
		return layout_string.toString();
	}
}
