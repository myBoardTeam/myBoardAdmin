<?php
/**
 * Layout Web para Lista Padrão.
 */

require_once(PROJECT_PATH."/library/view/render/AbstractLayout.php");

/**
 * Classe contendo o Layout Web para Lista Padrão.
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
class LayoutList extends AbstractLayout {
	private $title;
	private $columns;
	private $list;
	
	/**
	 * Construtor da Classe
	 * 
	 * @param $p_title Titulo da Página
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	function __construct( $p_title = "" ) {
		$fname = "constructObject()";
		
		$this->setTitle($p_title);
	}

	/**
	 * Define o Layout da Página
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setLayout() {
		$fname = "setLayout()";
		
		$this->layout_string  = "";
		$this->layout_string .= "<!-- <LIST> -->\n";
		if ( count( $this->getList() ) > 0 ) {
			if ( $this->getTitle() != "" ) {
				$this->layout_string .= "<table class=\"listTable\" width=\"100%\">\n";
				$this->layout_string .= "  <tr><td class=\"listTitle\">".$this->getTitle()."</td></tr>\n";
				$this->layout_string .= "</table>\n";
			}
			$this->layout_string .= "<table class=\"listTable\" width=\"100%\">\n";
			$this->layout_string .= "  <tr>\n";
			foreach ( $this->getColumns() as $column )
				$this->layout_string .= "    <td class=\"listLabel\" width=\"".$column["size"]."\">".$column["value"]."</td>\n";
			$this->layout_string .= "  </tr>\n";
			
			foreach ( $this->getList() as $list ) {
				$this->layout_string .= "  <tr class=\"listContentRow\">\n";
				foreach ( $this->getColumns() as $column ) {
					$list_text = isset( $list[$column["name"]]["link"] ) ? "<a href=\"".$list[$column["name"]]["link"]."\">".$list[$column["name"]]["value"]."</a>" : $list[$column["name"]]["value"] ;
					$this->layout_string .= "    <td class=\"listContent width=\"".$column["size"]."\">".$list_text."</td>\n";
				}
				$this->layout_string .= "  </tr>\n";
			}
			
			$this->layout_string .= "</table>";
		} else {
			$this->layout_string .= "<table class=\"listTable\" width=\"100%\">\n";
			$this->layout_string .= "  <tr><td class=\"listTitle\">".LOC_GENERIC_LIST_EMPTY."</td></tr>\n";
			$this->layout_string .= "</table>\n";
		}
		$this->layout_string .= "<!-- </LIST> -->\n";
	}

	/**
	 * Define o Título Listagem
	 * 
	 * @param $p_value Título da Listagem
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setTitle( $p_value ) {
		$this->title = $p_value;
	}

	/**
	 * Define o Conteudo da Listagem
	 * 
	 * @param $p_value Conteudo da Listagem
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function setList( $p_value ) {
		$fname = "setList()";
		
		if ( is_array( $p_value )) {
			foreach ( $p_value as $list_item )
				foreach ( $this->getColumns() as $column )
					if ( !isset( $list_item[$column["name"]]["value"] )) {
						$this->addMessage(get_class($this), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_LAYOUT_LIST);
						return(false);
					}
			$this->list = $p_value;
		} else {
			$this->addMessage(get_class($this), $fname, MB_ERROR, MB_HIDDEN, LOC_EMSG_LAYOUT_LIST);
			return(false);
		}
	}

	/**
	 * Adiciona Coluna na Listagem
	 * 
	 * @param $p_name Nome da Coluna
	 * @param $p_size Tamanho da Coluna
	 * @param $p_value Valor da Coluna
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */	
	public function addColumn( $p_name, $p_size, $p_value ) {
		$this->columns[] = array( "name" => $p_name, "size" => $p_size, "value" => $p_value );
	}
	
	/**
	 * Obtem o Layout da Listagem
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getLayout() {
		$fname = "getLayout()";
		
		if ( $this->layout_string == "" )
			$this->setLayout();

		return $this->layout_string;
	}
	
	/**
	 * Obtem o Título da Listagem
	 * 
	 * @return String
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getTitle() {
		return($this->title);
	}
	
	/**
	 * Obtem a Listagem
	 * 
	 * @return Array
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getList() {
		if ( is_array( $this->list ))
			return($this->list);
		else
			return(array());
	}
	
	/**
	 * Obtem a Lista de Colunas
	 * 
	 * @return Array
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getColumns() {
		if ( is_array( $this->columns ))
			return($this->columns);
		else
			return(array());
	}
}
?>