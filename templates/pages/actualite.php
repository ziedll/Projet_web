        <h1 style="margin-top: 20px;">Actualités du Serveur</h1>
        <div id="articles-container" style="padding: 20px 0;">
            <?php foreach ($articles as $article): ?>
                <div class="article-card" style="cursor: pointer; margin-bottom: 20px; padding: 20px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 12px; display: flex; gap: 20px; align-items: center; transition: 0.3s;" 
                    onclick="window.location.href='<?= BASE_URL ?>actualite?id=<?= $article['id'] ?>'"
                    onmouseover="this.style.borderColor='var(--primary)'; this.style.transform='translateY(-3px)'"
                    onmouseout="this.style.borderColor='var(--border)'; this.style.transform='translateY(0)'">
                    
                    <?php if (!empty($article['image'])): ?>
                        <div style="flex-shrink: 0; width: 120px; height: 100px; border-radius: 8px; overflow: hidden; background: rgba(0,0,0,0.2); border: 1px solid var(--border);">
                            <img src="<?= BASE_URL ?>uploads/<?= $article['image'] ?>" alt="..." style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                    <?php else: ?>
                        <div style="flex-shrink: 0; width: 120px; height: 100px; border-radius: 8px; background: rgba(255,255,255,0.03); display: flex; align-items: center; justify-content: center; color: var(--text-muted); font-size: 0.8rem; border: 1px dashed var(--border);">
                            Pas d'image
                        </div>
                    <?php endif; ?>

                    <div>
                        <h3 style="margin-bottom: 8px; color: var(--primary);"><?= htmlspecialchars($article['titre']) ?></h3>
                        <p style="margin-bottom: 10px; line-height: 1.4;"><?= mb_strimwidth(htmlspecialchars($article['content']), 0, 150, "...") ?></p>
                        <small style="color: var(--text-muted);">Publié le <?= $article['date_de_creation'] ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
