<?php
/* Mail.class.php *
 */
 
class Mail{
	private $fromAddress;
	private $toAddress;
	private $subject;
	private $message;
	private $cc;
	private $bcc;
	private $headers;
	
	/***
	* @param str $toAddress
    * @param str $fromAddress
	* @param str $subject
	* @param str $message
	* @param str $cc
	* @param str $bcc
	* @return 
	*/
	public function sendMail($toAddress,$fromAddress,$subject,$message,$cc="",$bcc=""){
		$this->toAddress=$toAddress;
		$this->fromAddress=$fromAddress;
		$this->subject=$subject;
		//$mime = new Mail_mime();
		$this->message=$message;
		$this->cc=$cc;
		$this->bcc=$bcc;
		$this->headers=$this->getHeaders($this->fromAddress,$this->cc,$this->bcc);
		mail($this->toAddress,$this->subject,$this->message,$this->headers);
	}
	
	/***
	* @return str 
	*/
	public function getHeaders($fromAddress,$cc="",$bcc=""){
		$this->fromAddress=$fromAddress;
		$this->cc=$cc;
		$this->bcc=$bcc;
		$this->headers  = "MIME-Version: 1.0" . "\r\n";
		$this->headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$this->headers .= "Date: " . date("r", time()) . "\r\n";
        $this->headers .= "From:$this->fromAddress" . "\r\n";
		if($this->cc != ""){
			$this->headers .= "CC: $this->cc" .  "\r\n";
		}
		if($this->bcc != ""){
			$this->headers .= "BCC: $this->bcc" .  "\r\n";
		}
		return $this->headers;
	}
	
}
?>