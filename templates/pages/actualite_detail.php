    <div style="padding: 40px 0;">
        <article style="max-width: 800px; margin: 0 auto; background: var(--bg-card); padding: 30px; border-radius: 12px; border: 1px solid var(--border);">
            <?php if ($article['image']): ?>
                <img src="<?= BASE_URL ?>uploads/<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['titre']) ?>" style="width: 100%; border-radius: 8px; margin-bottom: 20px;">
            <?php endif; ?>
            <h1 style="color: var(--primary); margin-bottom: 10px;"><?= htmlspecialchars($article['titre']) ?></h1>
            <p style="color: var(--text-muted); font-size: 0.9em; margin-bottom: 20px;">Posté le <?= $article['date_de_creation'] ?></p>
            <div style="line-height: 1.6; color: var(--text-main);">
                <?= nl2br(htmlspecialchars($article['content'])) ?>
            </div>
            <a href="<?= BASE_URL ?>actualite" style="display: inline-block; margin-top: 30px; color: #38bdf8; text-decoration: none;">← Retour aux actualités</a>
        </article>
    </div>
