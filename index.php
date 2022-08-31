<?php
// pour spécicfier l'étage dans bibliothèque namespace
namespace App;

// pour appeler l'étage spécifié d'une page (le nom est spécifié dans namespace de la page en question)
use Controller\CinemaController;
use Controller\CinemaControllerAdd;
use Controller\CinemaControllerDelete;


require "controller/CinemaController.php";
require "controller/CinemaControllerAdd.php";
require "controller/CinemaControllerDelete.php";



// pour charger tous les class 
spl_autoload_register(function ($_className){
    require $_className . ".php";
});

// instantier controller pour accéder au methode "findAllMovies"
$ctrlCinema = new CinemaController();
$ctrlCinemaAdd = new CinemaControllerAdd();
$ctrlCinemaDelete = new CinemaControllerDelete();

// pour se protéger des injections dans l'URL //! faille XSS
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// vérifier la présence d'une action dans l'URL
if(isset($_GET['action'])){
    
    switch($_GET['action']){
        // chaque case contient une requête SQL
        case "search" : $ctrlCinema->search();break;

        case "listFilms" : $ctrlCinema->findAllMovies();break;
        case "listActors" : $ctrlCinema->findAllActors();break;
        case "filmDetails" : $ctrlCinema->findFilmDetails($id);break;
        case "actorDetails" : $ctrlCinema->findActorDetails($id);break;
        case "listDirectors" : $ctrlCinema->findAllDirectors();break;
        case "filmsDirected" : $ctrlCinema->findAllDirectedFilms($id);break;
        case "listRoles" : $ctrlCinema->findAllRolles();break;
        case "roleOwners" : $ctrlCinema->findAllRolleOwners($id);break;
        case "showFilmForm" : $ctrlCinema->showFilmForm();break;
        case "showDirectorForm" : $ctrlCinema->showDirectorForm();break;
        case "showGenreForm" : $ctrlCinema -> showGenreForm();break;
        case "showActorForm" : $ctrlCinema -> showActorForm();break;
        case "showRoleForm" : $ctrlCinema -> showRoleForm();break;
        case "showCastingForm" : $ctrlCinema -> showCastingForm();break;

        case "addFilm" : $ctrlCinemaAdd->addFilm();break;
        case "addDirector" : $ctrlCinemaAdd->addDirector();break;
        case "addGenre" : $ctrlCinemaAdd->addGenre();break;
        case "addActor" : $ctrlCinemaAdd->addActor();break;
        case "addRole" : $ctrlCinemaAdd->addRole();break;
        case "insertCasting" : $ctrlCinemaAdd->insertCasting();break;

        case "deleteActor" : $ctrlCinemaDelete->deleteActor($id);break;
        case "deleteRole" : $ctrlCinemaDelete->deleteRole($id);break;
        case "deleteFilm" : $ctrlCinemaDelete->deleteFilm($id);break;
        




    }

} else{
   // s'il n'y a pas de requête la fonction recharge la page home.php
    $ctrlCinema -> home();

}

?>