<?php
// pour créer une mémoire tempon
ob_start();

// var_dump($results->fetchAll());

?>
<h2>Results</h2>

<table class="table-style">
    <tr>
        <th>film</th>
        <th>sortie en france</th>
        <th>genre</th>
    </tr>
    <tbody>

        
    <?php 
        while($result = $results-> fetch()){
            
    ?>

            <tr class="trbody">
                <td><?= $result['titre']?></td>
                <td><?= $result['dateSortie']?></td>
                <td><?= $result['genres']?></td>
            </tr>
        
    <?php }?>
        <tr><td colspan="3" class="count-elements"><?= $rows ?> éléments trouvés</td></tr>
    </tbody>
</table>

<a class="link-showForm" href="index.php?action=showFilmForm">Ajouter un film</a>

<?php
// pour ajouter les codes après "ob_start()" dans la variable "$content"
$content = ob_get_clean();
require "view/template.php";

?>