<?php
    $name = $_POST['name'];
    $visitor_email = $_POST['mail'];
    $message = $_POST['message'];

    // la mail a cui è destinato il messaggio 
    $email_from = 's.dumi13@yahoo.it';
    $email_subject = "Nuovo messaggio dai fans!";
    $email_body = "User Name: $name. \n". 
                    "User Email: $visitor_email.\n".
                        "User Message: $message.\n";

    $to = "scutelnicdumitru@gmail.com";
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $visitor_email\r\n";
    
    mail($to, $email_subject, $email_body, $headers);

    header("Location: contact.html");
?>