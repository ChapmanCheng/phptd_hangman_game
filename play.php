<?php
session_start();

require 'inc/autoloader.php';
// ! ===== Debug =====
echo '$_POST contains' .  '<br/>';
print_r($_POST);
echo '<br/><br/>';
unset($_SESSION['selected']);


if ($_POST) {
    $key = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);
    if (!in_array($key, $_SESSION['selected'])) {
        $_SESSION['selected'][] = $key;
        sort($_SESSION['selected'], SORT_STRING);
    }
}

// echo in_array('h', $_SESSION['selected']) ? 'foo' : 'bar';
$game = new Game(new Phrase("Hello World"));

empty('');
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