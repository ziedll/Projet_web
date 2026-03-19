        <h1 style="margin-top: 20px;">Actualités du Serveur</h1>
        <div id="articles-container" style="padding: 20px 0;">
            <?php foreach ($articles as $article): ?>
                <div class="article-card" style="cursor: pointer; margin-bottom: 20px; padding: 15px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 8px;" 
                    onclick="window.location.href='<?= BASE_URL ?>actualite?id=<?= $article['id'] ?>'">
                    <h3><?= htmlspecialchars($article['titre']) ?></h3>
                    <p><?= mb_strimwidth(htmlspecialchars($article['content']), 0, 150, "...") ?></p>
                    <small>Publié le <?= $article['date_de_creation'] ?></small>
                </div>
            <?php endforeach; ?>
        </div>
