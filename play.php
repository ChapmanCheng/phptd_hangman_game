<?php
session_start();
require 'inc/autoloader.inc.php';
// session_destroy();

<<<<<<< HEAD
// var_dump($_SESSION);
$session = new Session();
$game = new Game(new Phrase($session->quote, $_SESSION['selected']));
=======
if ($_POST) {
    $key = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);
    if (!isset($_SESSION['selected']))
        $_SESSION['selected'] = array();
    if (!in_array($key, $_SESSION['selected']))
        $_SESSION['selected'][] = $key;
}
>>>>>>> meeting_requirements

if (isset($_SESSION['phrase']))

    $phrase =  new Phrase($_SESSION['phrase'], $_SESSION['selected']);
else
    $phrase = new Phrase();

$game = new Game($phrase);

// // !debug
// echo '$_POST : ' . '<br/>';
// var_dump($_POST);
// echo '$_SESSION : ' . '<br/>';
// var_dump($_SESSION);
// // !debug
include_once 'inc/header.inc.php';

// * --- BODY ---

if ($msg = $game->gameOver())
    include_once 'views/game_over.php'; // go to game over screen    
else
    include_once 'views/game.php'; // play game as usual

// * --- BODY ---

include_once 'inc/footer.inc.php';
