<?php
// pour créer une mémoire tempon
ob_start();
$film = $filmDetails -> fetch();
$acteurs = $filmActeurs -> fetchAll();


?>
<h2>Film details</h2>


<h3 class="titleInDetails"><?= $film['titre'];?></h3>

<section class="details-section">

    <ul class="detailsList">
        <li><strong>Sortie en France: </strong> <?= $film['dateSortie'];?></li>
        <li><strong>Note: </strong> <?= $film['note'];?></li>
        <li><strong>Résumé: </strong> <?= $film['resume'];?></li>       
    </ul>



    <table class="table-style detailsTable">
        <tr>
            <th>Acteurs</th>
        </tr>

        <tbody>

            <?php foreach($acteurs as $acteur){?>

            <tr class="trbody">
                <td>
                    <a class="link" href="index.php?action=actorDetails&id=<?=$acteur['id_acteur']?>">
                        <?= $acteur['prenom'] . " " . $acteur['nom']." (". $acteur["nom_role"] .")" ?>
                    </a>
                </td>
            </tr>

            <?php }?>
            <tr><td class="count-elements"><?= $filmActeurs -> rowCount(); ?> acteurs cités</td></tr>
        </tbody>
    </table>
</section>

<?php
// pour ajouter les codes après "ob_start()" dans la variable "$content"
$content = ob_get_clean();
require "view/template.php";

?>