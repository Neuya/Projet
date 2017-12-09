<?php// To
    $to = 'truc@server.com';

    // Subject
    $subject = 'Validation email';

    // Headers
    $headers = 'Mime-Version: 1.0'."\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
    $headers .= "\r\n";

    // Message
    $msg = '<strong>Validation email</strong> - Bonjour suite à votre inscription sur notre site web nous vous demandons de valider votre addresse email pour pouvoir utiliser votre compte, pour cela cliquer sur le lien suivant : <a href='index.php?action=validate&controller=utilisateur&id=$id'>Mise à jour du compte </a>';

    // Function mail()
    mail($to, $subject, $msg, $headers);
?>