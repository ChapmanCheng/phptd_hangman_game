<?php
session_start();
require 'inc/autoloader.php';
// Session::unsetAll();

// var_dump($_SESSION);
$session = new Session();
$game = new Game(new Phrase($session->quote, $_SESSION['selected']));

include_once 'inc/header.inc.php';

// * --- BODY ---
if ($msg = $game->gameOver())
    include_once 'views/game_over.php'; // go to game over screen    
else
    include_once 'views/game.php'; // play game as usual

echo '<p>Quotes powered by <a href="https://github.com/lukePeavey/quotable#get-random-quote">Quotable</a></p>';
// * --- BODY ---

include_once 'inc/footer.inc.php';
