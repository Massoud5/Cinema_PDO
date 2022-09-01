<?php
// pour créer une mémoire tempon
ob_start();

?>
<h2>All films</h2>

<form class="searchForm" action="index.php?action=search" method="post">

    <input id="searchInput" type="text" placeholder="Search for ..." name="key">
    <button id="searchSubmit" type="submit" name="submitSearch">Search</button>

</form>

<table class="table-style">
    <tr>
        <th></th>
        <th>Titre</th>
        <th>Durée</th>
        <th>Realisateur</th>
        <th>Details</th>
    </tr>
    <tbody>
        <?php 
            while($film = $films-> fetch()){

            ?>
        <tr class="trbody">
        <td><a href="index.php?action=deleteFilm&id=<?=$film['id_film']?>"><img class="icon-delete" src="./public/images/icon_delete.png" alt="icon_delete"></a></td>
            <td><?= $film['titre']?></td>
            <td><?= $film['duree']?> minutes</td>
            <td><?= $film['prenom'] ." ". $film['nom']?></td>
            <td><a class="link" href="index.php?action=filmDetails&id=<?=$film['id_film']?>">plus d'info</a></td>
        </tr>
        
        <?php } ?>
        <tr><td colspan="4" class="count-elements"><?= $films->rowCount(); ?>films</td></tr>
    </tbody>
</table>

<a class="link-showForm" href="index.php?action=showFilmForm">Ajouter un film</a>

<?php
// pour ajouter les codes après "ob_start()" dans la variable "$content"
$content = ob_get_clean();
require "view/template.php";

?>