    <div class="login-container" style="padding: 40px 0;">
        <div class="contact-form">
            <h2>Inscription</h2>
            <?php if ($error): ?>
                <p style="color: #ef4444; margin-bottom: 15px;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <form method="POST">
                <div>
                    <label>Pseudo</label>
                    <input type="text" name="pseudo" required>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" required>
                </div>
                <button type="submit">Créer mon compte</button>
            </form>
            <p style="margin-top: 15px; text-align: center;">
                Déjà inscrit ? <a href="<?= BASE_URL ?>login" style="color: #38bdf8;">Se connecter</a>
            </p>
        </div>
    </div>
