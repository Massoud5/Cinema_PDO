<?php

ob_start();

$realisateur = $realisateurInfo -> fetch();

?>

<h2>Directed Films</h2>

<h3 class="titleInDetails"><?= $realisateur['prenom'] . " " . $realisateur['nom']?></h3>

<table class="table-style specified-table-style">
    <tr>
        <th>Titre</th>
        <th>Durée</th>
        <th>Details</th>
    </tr>
    <tbody>
        <?php 
            while($film = $filmsDirected-> fetch()){

            ?>
        <tr class="trbody">
            <td><?= $film['titre']?></td>
            <td><?= $film['duree']?> minutes</td>
            <td><a class="link" href="index.php?action=filmDetails&id=<?=$film['id_film']?>">plus d'info</a></td>
        </tr>
        
        <?php } ?>
        <tr><td colspan="4" class="count-elements"><?= $filmsDirected->rowCount(); ?>films</td></tr>
    </tbody>
</table>

<?php

$content = ob_get_clean();
require "view/template.php";

?>