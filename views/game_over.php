<?php Session::unsetAll(); ?>

<h1 id="game-over-message"><?php echo $msg; ?></h1>


<form action="/reset.php">
    <input type="submit" value="Restart">
</form>