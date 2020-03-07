<div id="banner" class="section">
    <h2 class="header">Phrase Hunter</h2>
    <?php include 'views/phrase.php'; ?>
    <?php include 'views/keyboard.php'; ?>
</div>
<?php include 'views/scoreboard.php'; ?>
<script>
    window.addEventListener('keyup', submitKey)

    function submitKey(e) {
        const key = document.querySelector(`.key[value=${e.key}]`)
        if (!key.disabled)
            key.click()
    }
</script>