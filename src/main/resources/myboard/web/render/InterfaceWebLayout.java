/**
 * Interface de Layout Web para padronização do sistema.
 */

package main.resources.myboard.web.render;

interface InterfaceWebLayout {
	
	/**
	 * Método para definição do Layout, dever ser usada apenas dentro da classe de implementação.
	 *
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public abstract void setLayout();

	/**
	 * Método para obtenção do Layout.
	 *
	 * @return StringBuilder.
	 * 
	 * @author Rafael Fernandes <rafael.porpeta@gmail.com>
	 * @version %I%, %G%
	 */
	public abstract String getLayout();

}