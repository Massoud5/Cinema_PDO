<?php

ob_start();

?>

<h2>Add Genre</h2>

<form class="form" action="index.php?action=addGenre" method="post">

    <label for="genre">
        <span>Genre:</span>
        <input class="input" type="text" id="genre" name="genre" required>
    </label><br>

    <button class="submit_btn" type="submit" name="submitGenre">SUBMIT</button>
    <!-- <a class="link-showForm addFilmAfterGenre " href="index.php?action=showFilmForm">Ajouter film</a> -->
</form>

<?php

$content = ob_get_clean();
require "view/template.php";

?>