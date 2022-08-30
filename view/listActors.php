<?php
// pour créer une mémoire tempon
ob_start();

?>
<h2>All actors</h2>

<table class="table-style">
    <tr>
        <th></th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Sexe</th>
        <th>Date de naissance</th>
        <th>Details</th>
    </tr>
    <tbody>

        
    <?php 
        while($actor = $actors-> fetch()){
            
            ?>

        <tr class="trbody">
            <td><a href="index.php?action=deleteActor&id=<?=$actor['id_acteur']?>"><img class="icon-delete" src="./public/images/icon_delete.png" alt="icon_delete"></a></td>
            <td><?= $actor['prenom']?></td>
            <td><?= $actor['nom']?></td>
            <td><?= $actor['sexe']?></td>
            <td><?= $actor['dateNaissance']?></td>
            <td><a class="link" href="index.php?action=actorDetails&id=<?=$actor['id_acteur']?>">plus d'infos</a></td>
        </tr>
        
    <?php } ?>
        <tr><td colspan="5" class="count-elements"><?= $actors -> rowCount(); ?> acteurs</td></tr>
    </tbody>
</table>

<a class="link-showForm" href="index.php?action=showActorForm">Ajouter acteur</a>

<?php
// pour ajouter les codes après "ob_start()" dans la variable "$content"
$content = ob_get_clean();
require "view/template.php";

?>