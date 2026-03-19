    <section id="presentation">
        <h2 class="reveal-1">Présentation du serveur</h2>
        <p class="reveal-2">
            Cubic Infrastructure Group est un serveur Minecraft communautaire, proposant une expérience immersive
            avec exploration, construction et événements PvP/PvE.
        </p>
    </section>

    <section id="video" style="padding: 60px 0; background: rgba(255,255,255,0.02); border-radius: 20px; margin: 40px 0;">
        <h2 class="reveal-1">Vidéo de présentation</h2>
        <div class="video-container reveal-2" style="max-width: 700px; margin: 30px auto; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.5); aspect-ratio: 16/9;">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/I-sH53vXP2A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="border: none;"></iframe>
        </div>
        <p class="reveal-2" style="margin-top: 20px; color: var(--text-muted);">Découvrez le serveur et ses fonctionnalités dans cette vidéo.</p>
    </section>

    <section id="fonctionnalites">
        <h2 class="reveal-1">Fonctionnalités principales</h2>
        <ul class="reveal-2">
            <li>Classements détaillés des joueurs</li>
            <li>Événements et tournois réguliers</li>
            <li>Infrastructure stable et performante</li>
            <li>Boutique dynamique avec objets et récompenses</li>
            <li>Espace joueur sécurisé avec profil personnalisé</li>
        </ul>
    </section>

    <section id="actualites">
        <h2 class="reveal-1">Actualités du serveur</h2>
        <div class="products-grid" style="margin-top: 20px;">
            <?php if (count($articles) > 0): ?>
                <?php foreach ($articles as $article): ?>
                    <div class="product-card reveal-2" style="cursor: pointer;" onclick="window.location.href='<?= BASE_URL ?>actualite?id=<?= $article['id'] ?>'">
                        <div>
                            <?php if (!empty($article['image'])): ?>
                                <img src="<?= BASE_URL ?>uploads/<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['titre']) ?>" class="product-image">
                            <?php endif; ?>
                            <h3><?= htmlspecialchars($article['titre']) ?></h3>
                            <p><?= mb_strimwidth(htmlspecialchars($article['content']), 0, 100, "...") ?></p>
                        </div>
                        <div class="product-info">
                            <small style="color: var(--text-muted);">Publié le <?= $article['date_de_creation'] ?></small>
                            <div style="margin-top: 10px; color: var(--primary); font-weight: bold;">Lire la suite →</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="reveal-2">Aucune actualité pour le moment.</p>
            <?php endif; ?>
        </div>
    </section>

    <section id="contact" class="reveal-2">
        <h2 class="reveal-1">Contactez-nous</h2>
        <div class="contact-form" style="margin: 0 auto; background: none; border: none; padding: 0;">
            <?php if (isset($contact_msg) && $contact_msg): ?>
                <p style="color: #38bdf8; text-align: center; margin-bottom: 15px;"><?= htmlspecialchars($contact_msg) ?></p>
            <?php endif; ?>
            <form action="<?= BASE_URL ?>#contact" method="POST">
                <input type="hidden" name="contact_submit" value="1">
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
        </div>
    </section>

    <section id="infrastructure">
        <h2 class="reveal-1">État de l'infrastructure</h2>
        <p class="reveal-2">
            Le serveur et les services associés sont surveillés en permanence pour assurer stabilité,
            performance et sécurité. Des maintenances régulières permettent de garder le serveur optimal.
        </p>
    </section>
