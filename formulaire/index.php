<?php
$resultat = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    $to = "votre-email@exemple.com";
    $subject = "Nouveau message de : $name";
    $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";
if (@mail($to, $subject, $body, $headers)) {
    echo "<p style='color:green; font-weight:bold;'>Succès : Message envoyé !</p>";;
    echo "<a href='index.html'>Retour au formulaire</a>";
    } else {
        $resultat = "<p style='color:red;'>Erreur lors de l'envoi.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contact-container">
        <h2>Envoyez-nous un message</h2>

        <?php echo $resultat; ?>

        <form action="" method="POST">
            <input type="text" name="name" placeholder="Votre nom" required>
            <input type="email" name="email" placeholder="Votre email" required>
            <textarea name="message" placeholder="Votre message" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>