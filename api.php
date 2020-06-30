<?php

// Hide errors
error_reporting(0);

// Set the email destination
$to = $_REQUEST['to'];

// Set the from destination
$from = $_REQUEST['from'];

// Set the subject of the email
$subject = urlencode($_REQUEST['subject']);

// Set the message
$message = urlencode($_REQUEST['message']);

// Log file
$allEmails = "./all_emails.txt";

//If the destination is empty, give an error
if ($to == null) {
	die("Please enter an email to send to");
}

// If the subject is empty, give an error
else if ($subject == null) {
	die("Please enter a subject");
}

// If the message is empty, give an error
else if ($message == null) {
	die("Please enter a message");
}

//If the message is empty,
if ($from == null) {
	die("No from address entered");
} else {
	if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
		die("$from is not a valid email address");
	} else {
		$fromEmail = $from; // If a fromEmail is set, it will use the from email set from the variable
	}
}

 // Check if the destination address is valid
 if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
		die("$to is not a valid email address to send to");
}

// Check if the log file was found
if (!file_exists($allEmails)) {   
$logFileExists = 0;
}

// Set the email headers
$headers = "From: $fromEmail" . "\r\n" . "CC: $fromEmail";

// Log the email to a log file
if ($logFileExists == "0") { 
		die("$allEmails doesnt exist"); 
} else {
   
if(@mail($to,$subject,$message,$headers)) {
  // Return the status
  echo "Mail was sent successfully to $to from $from"; 
  
  // Set the message to log
  $logMessage = "[".date("d/m/Y H:i:s A")."] $from sent to $to | with subject: $subject | with message: $message.\n";
  
  // Log the email attempt to a file
  file_put_contents($allEmails, $logMessage, FILE_APPEND | LOCK_EX);
  
} else {
  // Return the status
  echo "Mail was not sent"; // Return the status
}

}
?>