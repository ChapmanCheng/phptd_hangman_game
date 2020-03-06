<?php
session_start();

require 'inc/autoloader.php';
// ! ===== Debug =====
echo '$_POST contains' .  '<br/>';
print_r($_POST);
echo '<br/><br/>';
// Session::unsetAll();


$session = new Session();

$game = new Game($session->getQuote());

include_once 'inc/header.inc.php';

if ($msg = $game->gameOver()) {
    // go to game over screen    
    include_once 'views/game_over.php';
    null;
} else
    // play game as usual
    include_once 'views/game.php';

include_once 'inc/footer.inc.php';
