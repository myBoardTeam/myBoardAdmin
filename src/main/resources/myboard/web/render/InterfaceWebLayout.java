/**
 * Interface de Layout Web para padroniza��o do sistema.
 */

package main.resources.myboard.web.render;

interface InterfaceWebLayout {
	
	/**
	 * M�todo para defini��o do Layout, dever ser usada apenas dentro da classe de implementa��o.
	 *
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public abstract void setLayout();

	/**
	 * M�todo para obten��o do Layout.
	 *
	 * @return StringBuilder.
	 * 
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public abstract String getLayout();

}