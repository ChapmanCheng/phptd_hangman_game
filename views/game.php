<div id="banner" class="section">
    <h2 class="header">Phrase Hunter</h2>
    <?php include 'views/phrase.php'; ?>
    <p>-- from <?php echo $session->author; ?> --</p>
    <?php include 'views/keyboard.php'; ?>
</div>
<?php include 'views/scoreboard.php'; ?>