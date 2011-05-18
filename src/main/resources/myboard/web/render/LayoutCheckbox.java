/**
 * Layout Web para de um Checkbox.
 */

package main.resources.myboard.web.render;

/**
 * Classe contendo o Layout Web de um Checkbox.
 *
 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
 * @version %I%, %G%
 */
public class LayoutCheckbox implements InterfaceWebLayout {
	protected StringBuilder layout_string;	
	protected String name;
	protected String[][] list;
	
	/**
	 * @param l Label do Campo
	 * @param n Nome do Campo
	 * @param s Status do Campo [true / false]
	 *
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public LayoutCheckbox( String n, String[][] l ) {
		name = n;
		list = l;
		
		this.setLayout();
	}

	public void setLayout() {
		layout_string = new StringBuilder();

		layout_string.append("<!-- <CHECKBOX> -->\n");
		layout_string.append("<script type=\"text/javascript\" charset=\"utf-8\">\n");
		layout_string.append("  $(function() {\n");
		layout_string.append("    $('input').customInput();\n");
		layout_string.append("  });\n");
		layout_string.append("</script>\n");
		for ( String[] item : list ) {
			layout_string.append("<p><input type=\"checkbox\" name=\"" + name + "\" id=\"" + item[0] + "\" value=\"" + item[1] + "\" /><label for=\"" + item[0] + "\">" + item[2] + "</label></p>\n");
			layout_string.append("<p><input type=\"radio\" name=\"" + name + "\" id=\"" + item[0] + "\" value=\"" + item[1] + "\" /><label for=\"" + item[0] + "\">" + item[2] + "</label></p>\n");
		}
		layout_string.append("<!-- </CHECKBOX> -->\n");
	}

	public String getLayout() {
		if ( layout_string.length() == 0 )
			layout_string.append("<!-- ERRO["+ this.getClass().getName() +"]: Conteúdo Vazio -->\n");
		return layout_string.toString();
	}
}
