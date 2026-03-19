<div class="leaderboard-container" style="padding: 40px 20px; max-width: 900px; margin: 0 auto;">
    <div class="section-header" style="text-align: center; margin-bottom: 50px;">
        <h1 style="font-size: 2.5rem; background: linear-gradient(45deg, #fff, #aaa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 10px;">Classement des Légendes</h1>
        <p style="color: var(--text-muted);">Voici le classement officiel des membres de la communauté.</p>
    </div>

    <div class="leaderboard-card" style="background: var(--bg-card); border: 1px solid var(--border); border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: rgba(255,255,255,0.05); color: var(--accent);">
                    <th style="padding: 20px;">#</th>
                    <th style="padding: 20px;">Joueur</th>
                    <th style="padding: 20px; text-align: right;">Crédits</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($players as $player): ?>
                    <tr class="leaderboard-row" style="border-bottom: 1px solid rgba(255,255,255,0.05); transition: background 0.3s;">
                        <td style="padding: 15px 20px;">
                            <?php if ($player['rank'] == 1): ?>
                                <span style="font-size: 1.5rem;">🥇</span>
                            <?php elseif ($player['rank'] == 2): ?>
                                <span style="font-size: 1.3rem;">🥈</span>
                            <?php elseif ($player['rank'] == 3): ?>
                                <span style="font-size: 1.2rem;">🥉</span>
                            <?php else: ?>
                                <span style="color: var(--text-muted); font-weight: bold;"><?= $player['rank'] ?></span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 15px 20px;">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <img src="<?= !empty($player['avatar']) ? BASE_URL . 'uploads/' . $player['avatar'] : BASE_URL . 'assets/img/default-avatar.png' ?>" alt="Avatar" style="width: 35px; height: 35px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.1);">
                                <div>
                                    <span style="font-weight: 600; color: #fff;"><?= htmlspecialchars($player['pseudo']) ?></span>
                                    <?php if ($player['role'] === 'admin'): ?>
                                        <span style="display: block; font-size: 0.7rem; color: #ff4757; font-weight: bold; text-transform: uppercase;">Admin</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td style="padding: 15px 20px; text-align: right;">
                            <span style="background: rgba(var(--accent-rgb), 0.1); color: var(--accent); padding: 5px 12px; border-radius: 20px; font-weight: bold; font-family: 'monospace';">
                                <?= number_format($player['credit'], 0, '.', ' ') ?> 🪙
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .leaderboard-row:hover {
        background: rgba(255,255,255,0.03) !important;
    }
    .leaderboard-card::-webkit-scrollbar {
        width: 8px;
    }
    .leaderboard-card::-webkit-scrollbar-track {
        background: transparent;
    }
    .leaderboard-card::-webkit-scrollbar-thumb {
        background: var(--border);
        border-radius: 10px;
    }
</style>
