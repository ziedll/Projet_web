        <h1>La Boutique Officielle</h1>
        <p style="margin-bottom: 40px; color: var(--text-muted);">Échangez vos crédits contre des grades, cosmétiques et avantages exclusifs.</p>

        <?php if ($message): ?>
            <div style="background: rgba(16, 185, 129, 0.1); border: 1px solid #10b981; padding: 15px; border-radius: 10px; margin-bottom: 30px;">
                <p style="color: #10b981; text-align: center; font-weight: bold; margin: 0;">
                    <?= htmlspecialchars($message) ?>
                </p>
            </div>
        <?php endif; ?>

        <div class="products-grid">
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card reveal-2">
                        <div>
                            <?php if ($product['image']): ?>
                                <img src="<?= BASE_URL ?>uploads/<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['titre']) ?>" class="product-image">
                            <?php else: ?>
                                <div style="height: 180px; background: rgba(255,255,255,0.05); border-radius: 12px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center;">
                                    <span style="color: var(--text-muted);">Pas d'image</span>
                                </div>
                            <?php endif; ?>
                            <h3><?= htmlspecialchars($product['titre']) ?></h3>
                            <p><?= htmlspecialchars($product['description']) ?></p>
                        </div>
                        
                        <div class="product-info">
                            <p class="product-price"><?= number_format($product['prix'], 0) ?> Crédits</p>
                            
                            <form action="<?= BASE_URL ?>boutique/buy" method="POST">
                                <input type="hidden" name="buy_item" value="1">
                                <input type="hidden" name="item_id" value="<?= $product['id'] ?>">
                                <button type="submit" class="buy-btn">
                                    Acheter maintenant
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun produit n'est disponible pour le moment.</p>
            <?php endif; ?>
        </div>
