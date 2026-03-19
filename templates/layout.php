<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Cubic Infrastructure' ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css?v=1.2">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/boutique.css?v=1.2">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/contact.css?v=1.2">
    <script src="https://unpkg.com/swup@4"></script>
    <script src="<?= BASE_URL ?>assets/js/transition.js"></script>
</head>
<body>
    <div id="swup" class="transition-fade">
        <?php require __DIR__ . '/partials/header.php'; ?>
        <main>
            <?= $content ?>
        </main>
    </div>

    <footer>
        <p>© Cubic Infrastructure Group - Plateforme officielle du serveur Minecraft</p>
    </footer>

    <script src="<?= BASE_URL ?>assets/js/accueil.js"></script>
</body>
</html>
