    <div style="padding: 40px 0;">
        <article style="max-width: 800px; margin: 0 auto; background: var(--bg-card); padding: 30px; border-radius: 12px; border: 1px solid var(--border);">
            <div style="display: flex; gap: 30px; align-items: center; margin-bottom: 30px; border-bottom: 1px solid var(--border); padding-bottom: 25px; flex-wrap: wrap;">
                <?php if ($article['image']): ?>
                    <div class="article-preview-box" style="flex-shrink: 0; position: relative;" onclick="document.getElementById('imageModal').style.display='flex'">
                        <img src="<?= BASE_URL ?>uploads/<?= $article['image'] ?>" 
                             alt="<?= htmlspecialchars($article['titre']) ?>" 
                             style="width: 180px; height: 180px; object-fit: contain; border-radius: 12px; border: 1px solid var(--border); background: rgba(0,0,0,0.2); box-shadow: 0 8px 20px rgba(0,0,0,0.4); cursor: pointer; transition: 0.3s;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'"
                             title="Cliquer pour agrandir">
                    </div>

                    <!-- Modal pour le prévisualiseur -->
                    <div id="imageModal" style="display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.9); align-items: center; justify-content: center; cursor: zoom-out;" onclick="this.style.display='none'">
                        <img src="<?= BASE_URL ?>uploads/<?= $article['image'] ?>" style="max-width: 90%; max-height: 90%; border-radius: 8px; box-shadow: 0 0 50px rgba(0,0,0,0.5);">
                        <div style="position: absolute; top: 20px; right: 30px; color: white; font-size: 40px; font-weight: bold; cursor: pointer;">&times;</div>
                    </div>
                <?php endif; ?>
                <div style="flex: 1; min-width: 250px;">
                    <h1 style="color: var(--primary); margin-bottom: 10px; font-size: 2.2rem; line-height: 1.1;"><?= htmlspecialchars($article['titre']) ?></h1>
                    <p style="color: var(--text-muted); font-size: 0.95em;">
                        <span style="background: rgba(99, 102, 241, 0.1); color: var(--primary); padding: 4px 10px; border-radius: 6px; margin-right: 10px; font-weight: bold;">INFO</span>
                        Publié le <?= $article['date_de_creation'] ?>
                    </p>
                </div>
            </div>
            <div style="line-height: 1.6; color: var(--text-main);">
                <?= nl2br(htmlspecialchars($article['content'])) ?>
            </div>
            <a href="<?= BASE_URL ?>actualite" style="display: inline-block; margin-top: 30px; color: #38bdf8; text-decoration: none;">← Retour aux actualités</a>
        </article>
    </div>
