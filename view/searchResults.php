<?php
// pour créer une mémoire tempon
ob_start();

?>
<h2>Results</h2>

<table class="table-style">
    <tr>
        <th>Prenom</th>
        <th>Nom</th>
    </tr>
    <tbody>

        
    <?php 
        while($result = $results-> fetch()){
            
            ?>

        <tr class="trbody">
            <td><?= $actor['prenom']?></td>
            <td><?= $actor['nom']?></td>
        </tr>
        
    <?php } ?>
        <tr><td colspan="2" class="count-elements"><?= $rows ?> acteurs trouvés</td></tr>
    </tbody>
</table>

<a class="link-showForm" href="index.php?action=showActorForm">Ajouter acteur</a>

<?php
// pour ajouter les codes après "ob_start()" dans la variable "$content"
$content = ob_get_clean();
require "view/template.php";

?>