<?php

ob_start();

?>

<h2>Add Film</h2>

<form class="form" action="index.php?action=addFilm" method="post">

    <label class="labelSelect" for="genre">
        <span>Genre:</span>
        <select class="input centerInput inputSelect2" id="genre" name="genre" required>

            <option value="0" disabled selected hidden>Choisir le genre</option>

            <?php
                foreach($genres ->fetchAll() as $genre){
            ?>
            <option value="<?= $genre['id_genre']?>"><?= $genre['nom_genre'] ?></option>
            <?php } ?>

        </select>
        <a class="linkAjouterSelect" href="index.php?action=showGenreForm">Ajouter Genre</a>
    </label><br>

    <label class="labelSelect" for="realisateur">
        <span>Réalisateur:</span>
        <select class="input centerInput inputSelect" id="realisateur" name="realisateur" required>

            <option value="0" disabled selected hidden>Choisir le réalisateur</option>
            <?php
                foreach($realisateurs ->fetchAll() as $realisateur){
            ?>
            <option value="<?= $realisateur['id_realisateur']?>"><?= $realisateur['prenom'] . " " . $realisateur['nom']?></option>
            <?php } ?>
        </select>

        <a class="linkAjouterSelect" href="index.php?action=showDirectorForm">Ajouter Réalisateur</a>
        
    </label><br>

    <label for="titreFilm">
        <span>Titre de film:</span>
        <input class="input" type="text" id="titreFilm" name="titreFilm" required>
    </label><br>

    <label for="sortieFrance">
        <span>Sortie en France:</span>
        <input class="input centerInput" type="date" id="sortieFrance" name="sortieFrance" required>
    </label><br>

    <label for="duree">
        <span>Durée en minute:</span>
        <input class="input centerInput" type="number" min="1" max="300" id="duree" name="duree" required>
    </label><br>
    
    <label for="note">
        <span>Note sur 5:</span>
        <input class="input centerInput" type="number" min="0" max="5" id="note" name="note" required>
    </label><br>
    
    <label for="resume">
        <span>Résumé:</span>
        <textarea class="input inputResume"  rows="4" cols="20" id="resume" name="resume" required></textarea>
    </label><br>

    <button class="submit_btn" type="submit" name="submitFilm">SUBMIT</button>
    
</form>



<?php

$content = ob_get_clean();
require "view/template.php";

?>