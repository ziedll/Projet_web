<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
    <h1>Historique de mes achats</h1>
    <p style="margin-bottom: 30px; color: var(--text-muted);">Retrouvez ici la trace de toutes vos transactions réalisées sur la boutique.</p>

    <div class="product-card">
        <?php if (count($history) > 0): ?>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="text-align: left; padding: 15px; border-bottom: 1px solid var(--border);">Produit</th>
                        <th style="padding: 15px; border-bottom: 1px solid var(--border);">Prix</th>
                        <th style="text-align: right; padding: 15px; border-bottom: 1px solid var(--border);">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $item): ?>
                        <tr>
                            <td style="padding: 15px; border-bottom: 1px solid var(--border); font-weight: bold;"><?= htmlspecialchars($item['item_name']) ?></td>
                            <td style="padding: 15px; border-bottom: 1px solid var(--border); text-align: center; color: #10b981;"><?= $item['price'] ?> Crédits</td>
                            <td style="padding: 15px; border-bottom: 1px solid var(--border); text-align: right; color: var(--text-muted);">
                                <?= date('d/m/Y H:i', strtotime($item['purchase_date'])) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div style="text-align: center; padding: 40px;">
                <p style="color: var(--text-muted);">Vous n'avez effectué aucun achat pour le moment.</p>
                <a href="<?= BASE_URL ?>boutique" style="color: var(--primary); text-decoration: none; display: inline-block; margin-top: 15px;">Visiter la boutique →</a>
            </div>
        <?php endif; ?>
    </div>

    <a href="<?= BASE_URL ?>profile" style="display: inline-block; margin-top: 30px; color: var(--text-muted); text-decoration: none;">← Retour au profil</a>
</div>
