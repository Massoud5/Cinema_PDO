<?php
// pour créer une mémoire tempon
ob_start();

$acteur = $acteurDetails -> fetch();

?>
<h2>Actor details</h2>

<h3 class="titleInDetails"><?= $acteur['prenom'] . " " . $acteur['nom'];?></h3>

<section class="details-section">

    <ul class="detailsList">
        <li><strong>Sexe: </strong> <?= $acteur['sexe'];?></li>
        <li><strong>Date de naissance: </strong> <?= $acteur['dateNaissance'];?></li>      
    </ul>

    <table class="table-style detailsTable">
        <tr>
            <th>Films joués</th>
        </tr>

        <tbody>

            <?php while ($film = $filmsJoues -> fetch()){?>

            <tr class="trbody">
                <td>

                    <a class="link" href="index.php?action=filmDetails&id=<?=$film['id_film']?>">
                        <?= $film['titre'] ." (". $film["nom_role"] .")" ?>
                    </a>

                </td>
            </tr>

            <?php }?>
            <tr><td class="count-elements"><?= $filmsJoues -> rowCount(); ?> films</td></tr>
        </tbody>
    </table>

</section>

<?php

// pour ajouter les codes après "ob_start()" dans la variable "$content"
$content = ob_get_clean();
require "view/template.php";

?>