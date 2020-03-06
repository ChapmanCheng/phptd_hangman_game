<?php
session_start();
require 'inc/autoloader.php';

$session = new Session();
$game = new Game($session->getQuote());

include_once 'inc/header.inc.php';

// * --- BODY ---
if ($msg = $game->gameOver())
    include_once 'views/game_over.php'; // go to game over screen    
else
    include_once 'views/game.php'; // play game as usual
// * --- BODY ---

include_once 'inc/footer.inc.php';
