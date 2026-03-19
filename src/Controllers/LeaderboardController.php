<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Repositories\UserRepository;

class LeaderboardController extends Controller {
    public function index() {
        $userRepo = new UserRepository();
        $players = $userRepo->getLeaderboard();
        
        // Ajouter une propriété "rank" pour l'affichage
        foreach ($players as $index => &$player) {
            $player['rank'] = $index + 1;
        }

        $this->render('leaderboard', [
            'players' => $players,
            'title' => 'Classement des Joueurs - Cubic'
        ]);
    }
}
