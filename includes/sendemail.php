<?php

// Define some constants
define( "RECIPIENT_NAME", "Victor Herrera" );
define( "RECIPIENT_EMAIL", "victorh@grupofenix.com.sv" );

// Read the form values
$success = false;
$senderName = isset( $_POST['name3'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name3'] ) : "";
$senderEmail = isset( $_POST['email3'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email3'] ) : "";
//$subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$message = isset( $_POST['message3'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message3'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">";
  $success = mail( $recipient, $message, $headers );
  echo "<p class='success'>Thanks for contacting us. We will contact you ASAP!</p>";
}

?>