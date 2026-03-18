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
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://unpkg.com/swup@4"></script>
    <script src="transition.js"></script>
    <script src="accueil.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <svg width="50" height="50" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <!-- Cube -->
                <polygon points="50,10 90,30 50,50 10,30" fill="#38bdf8"/>
                <polygon points="10,30 50,50 50,90 10,70" fill="#0ea5e9"/>
                <polygon points="90,30 50,50 50,90 90,70" fill="#0284c7"/>
                <!-- Highlight -->
                <polygon points="50,10 90,30 50,50" fill="#7dd3fc" opacity="0.6"/>
            </svg>
            <h1>Cubic Infrastructure Group</h1>
        </div>

        <nav>
            <a href="./indexkevin.php">Accueil</a>
            <a href="./boutique.php">Boutique</a>
            <a href="./actualite.php">Actualités</a>
            <a href="#">Classement</a>
            <a href="./contact.php" class="active">Contact</a>
            <a href="#">Connexion</a>
        </nav>
    </header>

    <main id="swup" class="transition-fade">
        <section class="contact-hero">
            <h1>Contactez-nous</h1>
            <p>Une question ? Nous sommes à votre écoute</p>
        </section>

        <section class="contact-form">
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
        </section>
    </main>

    <footer>
        © 2026 Cubic
    </footer>

</body>
</html>