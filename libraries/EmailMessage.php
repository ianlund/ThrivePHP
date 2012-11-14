<?
	class EmailMessage {
		protected $fromName;
		protected $fromAddress;
		protected $to;
		protected $cc;
		protected $bcc;
		protected $subject;
		protected $headers;
		protected $message;
		public function send() {
			$headersTmp = "From: {$this->fromName} <{$this->fromAddress}>\n";
			if( $this->cc ) $headersTmp .= "Cc: {$this->cc}\n";
			if( $this->bcc ) $headersTmp .= "Bcc: {$this->bcc}\n";
			$headersTmp .= "X-Mailer: PHP\n".$this->headers;
			if( !mail( $this->to, $this->subject, $this->message, $headersTmp, "-f".$this->fromAddress ) )
				throw new Exception( "Could not send email message." );
		}
		public function from() { return $this->fromName." <".$this->fromAddress.">"; }
		public function to() { return $this->to; }
		public function cc() { return $this->cc; }
		public function bcc() { return $this->bcc; }
		public function subject() { return $this->subject; }
		public function headers() { return $this->headers; }
		public function message() { return $this->message; }
		public function setFromName( $x ) { $this->fromName = $x; }
		public function setFromAddress( $x ) { $this->fromAddress = $x; }
		public function setFrom( $x ) {
			$this-> setFromName(getName($x));
			$this-> setFromAddress(getAddress($x));
		}
		public function setTo( $x ) {
			if( is_array( $x ) ) {
				$this->to = implode( ',', $x );
			} else {
				$this->to = $x;
			}
		}
		public function setCc( $x ) {
			if( is_array( $x ) ) {
				$this->cc = implode( ',', $x );
			} else {
				$this->cc = $x;
			}
		}
		public function setBcc( $x ) {
			if( is_array( $x ) ) {
				$this->bcc = implode( ',', $x );
			} else {
				$this->bcc = $x;
			}
		}
		public function setSubject( $x ) { $this->subject = $x; } 
		public function setHeaders( $x ) { $this->headers = $x; }
		public function setMessage( $x ) { $this->message = $x; }
		function __toString() {
			return htmlentities(
				"From: ".$this->from()."\n".
				"To: ".$this->to()."\n".
				"Cc: ".$this->cc()."\n".
				"Bcc: ".$this->bcc()."\n".
				"Subject: ".$this->subject()."\n".
				$this->headers."\n".
				"\n".
				$this->message );
		}
	}