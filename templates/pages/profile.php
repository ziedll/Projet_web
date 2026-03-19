<div class="profile-container" style="max-width: 900px; margin: 0 auto; padding: 20px;">
    <h1>Mon Espace Joueur</h1>
    
    <?php if (isset($_GET['msg'])): ?>
        <div style="background: rgba(99, 102, 241, 0.1); border: 1px solid var(--primary); padding: 15px; border-radius: 10px; margin-bottom: 20px; color: var(--primary); text-align: center;">
            <?= htmlspecialchars($_GET['msg']) ?>
        </div>
    <?php endif; ?>

    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px;">
        <!-- Sidebar: Info & Stats -->
        <aside>
            <div class="product-card" style="padding: 30px;">
                <div style="text-align: center; margin-bottom: 20px;">
                    <img src="<?= !empty($user['avatar']) ? BASE_URL . 'uploads/' . $user['avatar'] : BASE_URL . 'assets/img/default-avatar.png' ?>" 
                         alt="Avatar" style="width: 120px; height: 120px; border-radius: 50%; border: 3px solid var(--primary); object-fit: cover;">
                    <h2 style="margin-top: 15px; font-size: 1.5rem;"><?= htmlspecialchars($user['pseudo'] ?? '') ?></h2>
                    <p style="color: var(--text-muted); font-size: 0.9rem;"><?= ucfirst($user['role'] ?? 'user') ?></p>
                </div>
                
                <div style="background: rgba(255,255,255,0.05); padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    <p style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Crédits :</span>
                        <span style="color: #10b981; font-weight: bold;"><?= $user['credit'] ?? 0 ?></span>
                    </p>
                    <p style="display: flex; justify-content: space-between;">
                        <span>Inscrit le :</span>
                        <span><?= isset($user['date_creation']) ? date('d/m/Y', strtotime($user['date_creation'])) : 'N/A' ?></span>
                    </p>
                </div>

                <a href="<?= BASE_URL ?>history" class="buy-btn" style="text-align: center; text-decoration: none; display: block; margin-bottom: 10px;">
                    Historique des achats
                </a>
                <a href="<?= BASE_URL ?>logout" style="color: #ef4444; text-decoration: none; font-size: 0.9rem; display: block; text-align: center;">Déconnexion</a>
            </div>
        </aside>

        <!-- Main Content: Edit Profile -->
        <div class="product-card" style="padding: 30px;">
            <h2 style="margin-bottom: 25px;">Personnaliser mon profil</h2>
            
            <form action="<?= BASE_URL ?>profile/update" method="POST" enctype="multipart/form-data">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: var(--text-muted);">Ma description :</label>
                    <textarea name="description" rows="4" style="width: 100%; border-radius: 8px; background: var(--bg-dark); color: white; border: 1px solid var(--border); padding: 12px; font-family: inherit;"><?= htmlspecialchars($user['description'] ?? '') ?></textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: var(--text-muted);">Changer d'avatar :</label>
                    <input type="file" name="avatar" style="width: 100%;">
                </div>

                <h3 style="margin-top: 30px; margin-bottom: 15px; font-size: 1.1rem; color: var(--primary);">Réseaux Sociaux</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 25px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">Discord (Tag#0000) :</label>
                        <input type="text" name="discord" value="<?= htmlspecialchars($user['discord'] ?? '') ?>" style="width: 100%;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">Twitter (@pseudo) :</label>
                        <input type="text" name="twitter" value="<?= htmlspecialchars($user['twitter'] ?? '') ?>" style="width: 100%;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">YouTube (Nom complet) :</label>
                        <input type="text" name="youtube" value="<?= htmlspecialchars($user['youtube'] ?? '') ?>" style="width: 100%;">
                    </div>
                </div>

                <button type="submit" class="buy-btn" style="width: auto; padding: 12px 40px;">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
</div>
