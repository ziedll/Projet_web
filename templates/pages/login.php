    <div class="login-container" style="padding: 40px 0;">
        <div class="contact-form">
            <h2>Connexion</h2>
            <?php if ($error): ?>
                <p style="color: #ef4444; margin-bottom: 15px;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <?php if (isset($_GET['msg'])): ?>
                <p style="color: #10b981; margin-bottom: 15px;"><?= htmlspecialchars($_GET['msg']) ?></p>
            <?php endif; ?>
            <form method="POST">
                <div>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" required>
                </div>
                <button type="submit">Se connecter</button>
            </form>
            <p style="margin-top: 15px; text-align: center;">
                Pas de compte ? <a href="<?= BASE_URL ?>register" style="color: #38bdf8;">S'inscrire</a>
            </p>
        </div>
    </div>
