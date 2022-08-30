<?php
// pour créer une mémoire tempon
ob_start();

?>
<h2>All Directors</h2>

<table class="table-style">
    <tr>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Sexe</th>
        <th>Date de naissance</th>
        <th>Details</th>
    </tr>
    <tbody>
        <?php 
            while($realisateur = $realisateurs-> fetch()){
            ?>
        <tr class="trbody">
            <td><?= $realisateur['prenom']?></td>
            <td><?= $realisateur['nom']?></td>
            <td><?= $realisateur['sexe']?></td>
            <td><?= $realisateur['dateNaissance']?></td>
            <td><a class="link" href="index.php?action=filmsDirected&id= <?= $realisateur['id_realisateur']?>">films réalisés</a></td>
        </tr>

        <?php } ?>
        <tr><td colspan="4" class="count-elements"><?= $realisateurs -> rowCount();?> realisateurs</td></tr>
    </tbody>
</table>



<?php
// pour ajouter les codes après "ob_start()" dans la variable "$content" sur la page template.php
$content = ob_get_clean();
require "view/template.php";

?>