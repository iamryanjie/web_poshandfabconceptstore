<?php
$to      = 'mojadofaye@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: poshconceptstore@gmail.com' . "\r\n" .
    'Reply-To: noreply@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?> 