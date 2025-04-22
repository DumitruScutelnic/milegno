<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $visitor_email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($name) || empty($visitor_email) || empty($message)) {
        echo "Tutti i campi sono obbligatori.";
        exit;
    }

    if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
        echo "Indirizzo email non valido.";
        exit;
    }

    $email_from = 's.dumi13@yahoo.it'; // il mittente predefinito
    $email_subject = "Nuovo messaggio dai fans!";
    $email_body = "User Name: $name\n".
                  "User Email: $visitor_email\n".
                  "User Message:\n$message\n";

    $to = "scutelnicdumitru@gmail.com";
    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Messaggio inviato con successo!";
    } else {
        echo "Errore nell'invio. Riprova più tardi.";
    }
} else {
    echo "Richiesta non valida.";
}
?>
