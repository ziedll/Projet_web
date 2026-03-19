    <div style="padding: 20px 0;">
        <h1>Espace Administration</h1>
        
        <div class="admin-tabs">
            <a href="?section=articles" <?= $section === 'articles' ? 'class="active"' : '' ?>>Articles</a>
            <a href="?section=boutique" <?= $section === 'boutique' ? 'class="active"' : '' ?>>Boutique</a>
            <a href="?section=users" <?= $section === 'users' ? 'class="active"' : '' ?>>Utilisateurs</a>
        </div>

        <?php if ($message): ?>
            <p style="color: #38bdf8; padding: 10px; background: rgba(56, 189, 248, 0.1); border-radius: 5px;">
                <?= htmlspecialchars($message) ?>
            </p>
        <?php endif; ?>

        <?php if ($section === 'articles'): ?>
            <section>
                <h2><?= isset($article_to_edit) ? "Modifier l'article" : "Ajouter un article" ?></h2>
                <form action="<?= BASE_URL ?>admin/article/save" method="POST" enctype="multipart/form-data">
                    <?php if (isset($article_to_edit)): ?>
                        <input type="hidden" name="id" value="<?= $article_to_edit['id'] ?>">
                    <?php endif; ?>
                    <div>
                        <label>Titre</label><br>
                        <input type="text" name="titre" value="<?= htmlspecialchars($article_to_edit['titre'] ?? '') ?>" required>
                    </div>
                    <div>
                        <label>Contenu</label><br>
                        <textarea name="content" rows="5" required><?= htmlspecialchars($article_to_edit['content'] ?? '') ?></textarea>
                    </div>
                    <div>
                        <label>Image</label><br>
                        <?php if (isset($article_to_edit) && $article_to_edit['image']): ?>
                            <img src="/uploads/<?= $article_to_edit['image'] ?>"><br>
                        <?php endif; ?>
                        <input type="file" name="image">
                    </div>
                    <button type="submit"><?= isset($article_to_edit) ? "Mettre à jour" : "Publier" ?></button>
                    <?php if (isset($article_to_edit)): ?>
                        <a href="<?= BASE_URL ?>admin?section=articles">Annuler</a>
                    <?php endif; ?>
                </form>
            </section>
            <hr style="margin: 30px 0; border: 0; border-top: 1px solid var(--border);">
            <section>
                <h2>Articles existants</h2>
                <table>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($articles as $article): ?>
                    <tr>
                        <td>
                            <?php if ($article['image']): ?>
                                <img src="<?= BASE_URL ?>uploads/<?= $article['image'] ?>">
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($article['titre']) ?></td>
                        <td><?= $article['date_de_creation'] ?></td>
                        <td>
                            <a href="<?= BASE_URL ?>admin?section=articles&edit=<?= $article['id'] ?>">Modifier</a>
                            <a href="<?= BASE_URL ?>admin/article/delete?id=<?= $article['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </section>

        <?php elseif ($section === 'boutique'): ?>
            <section>
                <h2><?= isset($product_to_edit) ? "Modifier le produit" : "Ajouter un produit" ?></h2>
                <form action="<?= BASE_URL ?>admin/product/save" method="POST" enctype="multipart/form-data">
                    <?php if (isset($product_to_edit)): ?>
                        <input type="hidden" name="id" value="<?= $product_to_edit['id'] ?>">
                    <?php endif; ?>
                    <div>
                        <label>Titre / Nom du produit</label><br>
                        <input type="text" name="titre" value="<?= htmlspecialchars($product_to_edit['titre'] ?? '') ?>" required>
                    </div>
                    <div>
                        <label>Prix</label><br>
                        <input type="number" step="0.01" name="prix" value="<?= $product_to_edit['prix'] ?? '' ?>" required>
                    </div>
                    <div>
                        <label>Quantité</label><br>
                        <input type="number" name="quantite" value="<?= $product_to_edit['quantite'] ?? 0 ?>" required>
                    </div>
                    <div>
                        <label>Description</label><br>
                        <textarea name="description" rows="3"><?= htmlspecialchars($product_to_edit['description'] ?? '') ?></textarea>
                    </div>
                    <div>
                        <label>Image</label><br>
                        <?php if (isset($product_to_edit) && $product_to_edit['image']): ?>
                            <img src="/uploads/<?= $product_to_edit['image'] ?>"><br>
                        <?php endif; ?>
                        <input type="file" name="image">
                    </div>
                    <button type="submit"><?= isset($product_to_edit) ? "Mettre à jour" : "Ajouter au catalogue" ?></button>
                    <?php if (isset($product_to_edit)): ?>
                        <a href="<?= BASE_URL ?>admin?section=boutique">Annuler</a>
                    <?php endif; ?>
                </form>
            </section>
            <hr style="margin: 30px 0; border: 0; border-top: 1px solid var(--border);">
            <section>
                <h2>Produits en boutique</h2>
                <table>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Qté</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td>
                            <?php if ($product['image']): ?>
                                <img src="/uploads/<?= $product['image'] ?>">
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($product['titre']) ?></td>
                        <td><?= number_format($product['prix'], 0) ?> Crédits</td>
                        <td><?= $product['quantite'] ?></td>
                        <td>
                            <a href="<?= BASE_URL ?>admin?section=boutique&edit=<?= $product['id'] ?>">Modifier</a>
                            <a href="<?= BASE_URL ?>admin/product/delete?id=<?= $product['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        <?php elseif ($section === 'users'): ?>
            <section>
                <h2><?= isset($user_to_edit) ? "Modifier l'utilisateur" : "Ajouter un utilisateur" ?></h2>
                <form action="<?= BASE_URL ?>admin/user/save" method="POST">
                    <?php if (isset($user_to_edit)): ?>
                        <input type="hidden" name="id" value="<?= $user_to_edit['id'] ?>">
                    <?php endif; ?>
                    <div>
                        <label>Pseudo</label><br>
                        <input type="text" name="pseudo" value="<?= htmlspecialchars($user_to_edit['pseudo'] ?? '') ?>" required>
                    </div>
                    <div>
                        <label>Email</label><br>
                        <input type="email" name="email" value="<?= htmlspecialchars($user_to_edit['email'] ?? '') ?>" required>
                    </div>
                    <?php if (!isset($user_to_edit)): ?>
                    <div>
                        <label>Mot de passe</label><br>
                        <input type="password" name="mdp" placeholder="Par défaut: 123456">
                    </div>
                    <?php endif; ?>
                    <div>
                        <label>Rôle</label><br>
                        <select name="role">
                            <option value="user" <?= (isset($user_to_edit['role']) && $user_to_edit['role'] === 'user') ? 'selected' : '' ?>>Utilisateur</option>
                            <option value="admin" <?= (isset($user_to_edit['role']) && $user_to_edit['role'] === 'admin') ? 'selected' : '' ?>>Administrateur</option>
                        </select>
                    </div>
                    <div>
                        <label>Crédits</label><br>
                        <input type="number" name="credit" value="<?= $user_to_edit['credit'] ?? 0 ?>" required>
                    </div>
                    <button type="submit"><?= isset($user_to_edit) ? "Mettre à jour" : "Créer" ?></button>
                    <?php if (isset($user_to_edit)): ?>
                        <a href="<?= BASE_URL ?>admin?section=users">Annuler</a>
                    <?php endif; ?>
                </form>
            </section>
            <hr style="margin: 30px 0; border: 0; border-top: 1px solid var(--border);">
            <section>
                <h2>Utilisateurs inscrits</h2>
                <table>
                    <tr>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Crédits</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['pseudo']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                        <td><?= $user['credit'] ?></td>
                        <td>
                            <a href="<?= BASE_URL ?>admin?section=users&edit=<?= $user['id'] ?>">Modifier</a>
                            <a href="<?= BASE_URL ?>admin/user/delete?id=<?= $user['id'] ?>" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        <?php endif; ?>
    </div>
