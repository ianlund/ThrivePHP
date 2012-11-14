<?
	class EmailMimeMessage extends EmailMessage {
		protected $messageText;
		protected $messageHtml;
		function setMessageText($x) { $this->messageText = $x; }
		function setMessageHtml($x) { $this->messageHtml = $x; }
		function setMessage($x)  { die( "Method setMessage() is not supported. Please use setMessageText() and setMessageHtml()." ); }
		function send() {
			// Generate MIME boundary
			$boundary = md5(time());
			// Headers
			$headersTmp = "From: {$this->fromName} <{$this->fromAddress}>\n";
			if($this->cc) $headersTmp .= "Cc: {$this->cc}\n";
			if($this->bcc) $headersTmp .= "Bcc: {$this->bcc}\n";
			$headersTmp .= 
				"X-Mailer: PHP ".phpversion()."\n".
				"MIME-Version: 1.0\n".
				"Content-Type: multipart/alternative; boundary=\"$boundary\"\n".
				$this->headers;
			// Message content with MIME boundaries
			$message = 
				"This is a multi-part MIME message.\n\n".
				"--$boundary\n".
				"Content-Type: text/plain\n".
				"Content-Transfer-Encoding: 7bit\n\n".
				$this->messageText."\n\n".
				"--$boundary\n".
				"Content-Type: text/html\n".
				"Content-Transfer-Encoding: 7bit\n\n".
				$this->messageHtml."\n\n".
				"--$boundary--\n";
			if(!mail($this->to, $this->subject, $message, $headersTmp, "-f".$this->fromAddress ))
				throw new Exception( "Could not send email message." );
			else return true;
		}
	}
	function getAddress( $x ){
		//Returns email address (or anything with a "@") and strips "<" and ">".
		$holder= explode('<', $x);
		foreach ($holder as &$value){
			if (strpos($value,"@")) $address= $value;
		}
		return trim($address, ">");
	}
	function getName( $x ){
		//Returns name (or anything without a "@")
		$name="$x";
		$holder= explode('<', $x);
		foreach ($holder as &$value){
			if (!strpos($value,"@")) $name= $value;
		}
		return $name;
	}