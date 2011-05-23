<?php
/**
 * Controle de Mensagens do Sistema
 */

require (PROJECT_PATH."/library/util/Message.php");

/**
 * Classe de controle de Mensagens do Sistema
 *
 * @author myBoardTeam <myboardteam@gmail.com>
 * @version %I%, %G%
 */
abstract class AbstractMessageLog {
	protected $messages_list;
	
	/**
	 * Adiciona Mensagem ao Objeto
	 * 
	 * @param $class Nome da Classe onde ocorreu a mensagem
	 * @param $method Nome do Metodo onde ocorreu a mensagem
	 * @param $level Nivel de criticidade (MB_ERROR, MB_WARNING, MB_NOTICE)
	 * @param $show Nivel de Exibição (MB_SHOW, MB_HIDDEN)
	 * @param $message Mensagem
	 * @param $detail Detalhes da Mensagem
	 *
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function addMessage( $class, $method, $level, $show, $message, $detail = "" ){
		$local_message = new Message();
		$local_message->setClassName($class);
		$local_message->setMethodName($method);
		$local_message->setMessageLevel($level);
		$local_message->setMessageShow($show);
		$local_message->setMessage($message);
		$local_message->setDetail($detail);
		$this->messages_list[] = $local_message;
	}
	
	/**
	 * Recupera Lista de Mensagens do Objeto
	 * 
	 * @return ObjMessage[]
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function getMessageList(){
		if ( is_array( $this->messages_list ) )
			return $this->messages_list;
		return array();
	}

	/**
	 * Verifica a existencia de Mensagens no Objeto
	 * 
	 * @return bool
	 * 
	 * @author myBoardTeam <myboardteam@gmail.com>
	 * @version %I%, %G%
	 */
	public function haveMessage(){
		if ( count( $this->messages_list ) > 0 )
			return true;
		return false;
	}
}
?>
