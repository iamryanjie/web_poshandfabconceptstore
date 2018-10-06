<?php
$to = 'mojadofaye@gmail.com';
$subject = 'test This is subject';
$message = 'This is body of email';
$from = "From: FirstName LastName <SomeEmailAddress@Domain.com>";
try{
	mail($to,$subject,$message,$from);
} catch (Exception $e) {
	echo $e ." errorsss";
}

?> 