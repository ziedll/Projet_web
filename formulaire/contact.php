<?php

$statut_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars(strip_tags(trim($_POST['nom'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    
    if (empty($nom) || empty($email) || empty($message)) {
        $statut_message = "<p style='color:red;'>Veuillez remplir tous les champs.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $statut_message = "<p style='color:red;'>Format d'email invalide.</p>";
    } else {
        
        $destinataire = "votre-email@localhost.local"; 
        $sujet = "Nouveau message de contact de $nom";
        
        $corps_message = "Nom: $nom\n";
        $corps_message .= "Email: $email\n\n";
        $corps_message .= "Message:\n$message\n";
        
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        if (mail($destinataire, $sujet, $corps_message, $headers)) {
            $statut_message = "<p style='color:green;'>Votre message a bien été envoyé !</p>";
        } else {
            $statut_message = "<p style='color:red;'>Erreur lors de l'envoi.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> 
    <title>Formulaire de Contact</title>
</head>
<body>

    <h2>Contactez-nous</h2>
    
    <?= $statut_message; ?>

    <form action="contact.php" method="POST">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit">Envoyer le message</button>
    </form>

</body>
</html>