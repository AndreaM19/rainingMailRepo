<?php
require_once 'Constants.php';

class Message{
	private $messageObject;
	private $messageText;
	private $messageHtmlCode;

	/*Constructor*/
	public function Message(){
		$this->messageObject="";
		$this->messageText="";
		$htmlCode=Constants::$htmlHeader."".Constants::$htmlFooter;
		$this->messageHtmlCode=$htmlCode;
	}

	/*Get & Set section*/
	public function setMessageObject($objToSet){
		$this->messageObject=$objToSet;
	}

	public function getMessageObject(){
		return $this->messageObject;
	}

	public function setMessageText($textToSet){
		$this->messageText=$textToSet;
	}

	public function getMessageText(){
		return $this->messageText;
	}

	public function setMessageHtmlCode($codeToSet){
		$this->messageHtmlCode=$codeToSet;
	}

	public function getMessageHtmlCode(){
		return $this->messageHtmlCode;
	}
	/*End of Get & Set section*/
	
	/*Save a Message object into a file*/
	public function saveMessage($messageToSave){
		$control=true;
		$returnMessage=$generalFail;
		$messageFile=$messageToSave;
		if($control) $returnMessage=$generalDone;
		return $returnMesage;
	}
	
	/*Delete a Message object from a file*/
	public function deleteMessage(){
	
	}
}

?>