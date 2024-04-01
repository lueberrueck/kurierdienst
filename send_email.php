<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Deine E-Mail-Adresse, an die die Nachricht gesendet werden soll
    $to = 'leon.ueberrueck@web.de';
    $subject = 'Neue Nachricht von ' . $name;
    $body = "Von: $name\nE-Mail: $email\nNachricht:\n$message";

    // Kopfzeilen für E-Mail
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Versende die E-Mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Danke für deine Nachricht!');window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Fehler beim Senden der Nachricht.');window.location.href='index.html';</script>";
    }
}
?>
