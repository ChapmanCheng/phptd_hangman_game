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

$game->phrase->checkLetters();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Phrase Hunter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
    <div class="main-container">
        <div id="banner" class="section">
            <h2 class="header">Phrase Hunter</h2>
            <?php include 'views/phrase.php'; ?>
            <?php include 'views/keyboard.php'; ?>
        </div>
    </div>

</body>

</html>