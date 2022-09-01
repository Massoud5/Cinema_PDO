<?php

// pour créer une mémoire tempon
ob_start();

?>

<h2>home</h2>
    
<nav class="nav-tabs">

    <figure>
        <a href="index.php?action=listDirectors">
            <img class="nav-img" src="./public/images/Directors_logo.png" alt="All directors">
        </a>
        <figcaption class="overlay">Realisateurs</figcaption>
    </figure>
    <figure>
        <a href="index.php?action=listFilms">
            <img class="nav-img" src="./public/images/Films_logo.png" alt="All films">
        </a>
        <figcaption class="overlay">Films</figcaption>
    </figure>

    <figure>
        <a href="index.php?action=listActors">
            <img class="nav-img" src="./public/images/Actors_logo.png" alt="All actors">
        </a>
        <figcaption class="overlay">Acteurs</figcaption>
    </figure>
    <figure>
        <a href="index.php?action=listRoles">
            <img class="nav-img" src="./public/images/Roles_logo.png" alt="All rolles">
        </a>
        <figcaption class="overlay">Roles</figcaption>
    </figure>
    <figure>
        <a href="index.php?action=showCastingForm">
            <img class="nav-img" src="./public/images/Casting_logo.png" alt="All rolles">
        </a>
        <figcaption class="overlay">Casting</figcaption>
    </figure>

</nav>

<?php

// pour ajouter les codes après "ob_start()" dans la variable "$content"
$content = ob_get_clean();
require "view/template.php";

?>