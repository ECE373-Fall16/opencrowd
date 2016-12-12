<?php 

   $headers="From:lettucebuy@gmail.com".'\r\n';
   $subject = "Signup";
   $message= "
	Thanks for signing up!";
   $to = "lettucebuy@gmail.com";
   $mailsend=mail($to,$subject,$message,$headers);

?>
