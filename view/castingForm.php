<?php

ob_start();

?>

<h2>Casting</h2>

<form class="form" action="index.php?action=insertCasting" method="post">

    <label for="film">
        <span>Film:</span>
        <select class="input centerInput" id="film" name="film" required>

            <option value="0" disabled selected hidden>Choisir le film</option>

            <?php
                foreach($films ->fetchAll() as $film){
            ?>
            <option value="<?= $film['id_film']?>"><?= $film['titre'] ?></option>
            <?php } ?>

        </select>
    </label><br>
    <label for="actor">
        <span>Acteur:</span>
        <select class="input centerInput" id="actor" name="actor" required>

            <option value="0" disabled selected hidden>Choisir l'acteur</option>

            <?php
                foreach($actors ->fetchAll() as $actor){
            ?>
            <option value="<?= $actor['id_acteur']?>"><?= $actor['prenom'] . " " . $actor['nom']?></option>
            <?php } ?>

        </select>
    </label><br>
    <label for="role">
        <span>Rôle:</span>
        <select class="input centerInput" id="role" name="role" required>

            <option value="0" disabled selected hidden>Choisir le rôle</option>

            <?php
                foreach($roles -> fetchAll() as $role){
            ?>
            <option value="<?= $role['id_role']?>"><?= $role['nom_role'] ?></option>
            <?php } ?>

        </select>
    </label><br>

    <button class="submit_btn" type="submit" name="submitCasting">SUBMIT</button>
    
</form>

<?php

$content = ob_get_clean();
require "view/template.php";

?>