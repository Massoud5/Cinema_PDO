<?php
// pour spécicfier l'étage dans bibliothèque namespace
namespace Controller;

// pour appeler l'étage spécifié d'une page
use Model\DAO;
use controller\CinemaControllerSearch;                                                       

// class sans construct car elle sert juste à faire des appels
class CinemaController {

    private int $_id;

    // fonction qui charge les codes de page "home.php"
    public function home() {
        require "view/home.php";
    }

    // fonction qui sert à faire une requête et justement trouver les données dans la 
    // base de donnée.
    // l'argument est pour éléminer le bogue du formulaire search oû le $resultat devient undefined quand on submit à vide 
    public function findAllMovies($results = null) {

        //instantier un object DAO pour avoir accés au PDO et ensuite la base de donné
        $dao = new DAO();
        // requête SQL
        $sql = 'SELECT f.id_film, f.titre, f.duree, r.prenom, r.nom
                FROM film f
                INNER JOIN realisateur r
                ON f.id_realisateur = r.id_realisateur';
        // pour accéder via l'object DAO instantié à la methode de celui_ci
        $films = $dao->executerRequete($sql);
        $result = $results;

        require "view/listMovies.php";
    }

    // pour cibler un seul film via le paramètre ":id"
    public function findFilmDetails($id){
        $dao = new DAO();

        // infos du film   //! Utiliser une allias est indispensable quand on utilise une fonction dans une requête
        $sql1 = 'SELECT f.id_film, f.titre, DATE_FORMAT(f.sortie_france, "%d %M %Y") AS dateSortie, f.note, f.resume
                 FROM film f
                 WHERE f.id_film = :id'; 

        // acteurs du film //! Obligatoire d'ajouter l'id_acteur car ça sera utilisé pour chercher l'élément
        $sql2 = 'SELECT a.id_acteur, a.prenom, a.nom, r.nom_role
                 FROM casting c
                 INNER JOIN film f
                 ON f.id_film = c.id_film
                 INNER JOIN acteur a
                 ON a.id_acteur = c.id_acteur
                 INNER JOIN role r
                 ON c.id_role = r.id_role
                 WHERE f.id_film = :id'; 
                
                
        $filmDetails = $dao->executerRequete($sql1, [":id"=> $id]);
        $filmActeurs = $dao->executerRequete($sql2, [":id"=> $id]);

        require "view/detailsFilm.php";
    }

    public function findActorDetails($id){

        //instantier un object DAO pour avoir accés au PDO et ensuite la base de donné
        $dao = new DAO();
        // requête SQL
        $sql1 = 'SELECT id_acteur, a.prenom, a.nom, a.sexe, DATE_FORMAT(a.date_naissance, "%d %M %Y") AS dateNaissance
                 FROM acteur a
                 WHERE a.id_acteur = :id';

        $sql2 = 'SELECT f.id_film, f.titre, r.nom_role
                 FROM casting c
                 INNER JOIN film f
                 ON f.id_film = c.id_film
                 INNER JOIN acteur a
                 ON a.id_acteur = c.id_acteur
                 INNER JOIN role r
                 ON c.id_role = r.id_role
                 WHERE a.id_acteur = :id';

        $acteurDetails = $dao->executerRequete($sql1, [":id"=> $id]);
        $filmsJoues = $dao->executerRequete($sql2, [":id"=> $id]);

        require "view/detailsActor.php";
    }

    public function findAllActors() {

        //instantier un object DAO pour avoir accés au PDO et ensuite la base de donné
        $dao = new DAO();
        // requête SQL
        $sql = 'SELECT a.id_acteur, a.prenom, a.nom, a.sexe, DATE_FORMAT(a.date_naissance, "%d %M %Y") AS dateNaissance
                FROM acteur a';
        // pour accéder via l'object DAO instantié à la methode de celui_ci
        $actors = $dao->executerRequete($sql);

        require "view/listActors.php";
    }

    public function findAllDirectors() {

        //instantier un object DAO pour avoir accés au PDO et ensuite la base de donné
        $dao = new DAO();
        // requête SQL
        $sql = 'SELECT r.id_realisateur, r.prenom, r.nom, r.sexe, DATE_FORMAT(r.date_naissance, "%d %M %Y") AS dateNaissance
                FROM realisateur r';
        // pour accéder via l'object DAO instantié à la methode de celui_ci
        $realisateurs = $dao->executerRequete($sql);

        require "view/listRealisateurs.php";
    }

    public function findAllDirectedFilms($id) {
        $dao = new DAO();

        $sql1 = 'SELECT f.id_film, f.titre, f.duree
                 FROM film f
                 INNER JOIN realisateur r
                 ON r.id_realisateur = f.id_realisateur
                 WHERE f.id_realisateur = :id';

        $sql2 = 'SELECT r.id_realisateur, r.prenom, r.nom
                 FROM realisateur r
                 WHERE r.id_realisateur = :id';

        $filmsDirected = $dao -> executerRequete($sql1, [':id' => $id]);
        $realisateurInfo = $dao -> executerRequete($sql2, [':id' => $id]);

        require "view/directedFilms.php";
    }

    public function findAllRolles() {
        $dao = new DAO();

        $sql = 'SELECT r.id_role, r.nom_role
                FROM role r';

        $roles = $dao -> executerRequete($sql);

        require "view/listRoles.php";
    }

    public function findAllRolleOwners($id){
        $dao = new DAO();

        $sql1='SELECT r.nom_role
                FROM role r';

        $sql2 = 'SELECT a.id_acteur, f.id_film, r.nom_role, a.prenom, a.nom, f.titre
                FROM casting c, role r, acteur a, film f
                WHERE c.id_role = r.id_role
                AND c.id_acteur = a.id_acteur
                AND c.id_film = f.id_film
                AND r.id_role = :id';

        $roleQuery = $dao -> executerRequete($sql1);
        $roleOwners = $dao -> executerRequete($sql2, [':id' => $id]);

        require "view/roleOwners.php";
    }

    // Forms part------------------------------------------------------------------------------------

    public function showFilmForm() {

        $dao = new DAO();

        $sql1 ='SELECT r.id_realisateur, r.prenom, r.nom
                FROM realisateur r';

        $sql2 ='SELECT g.id_genre, g.nom_genre
                FROM genre g';

        $genres = $dao -> executerRequete($sql2);
        $realisateurs = $dao -> executerRequete($sql1);

        

        require "view/filmForm.php"; 
    }
    
    public function showDirectorForm(){
        require "view/directorForm.php"; 
    }

    public function showGenreForm(){
        require "view/genreForm.php";
    }

    public function showActorForm(){

        $dao = new DAO();

        $sql ='SELECT f.id_film, f.titre
                FROM film f';

        $films = $dao -> executerRequete($sql);

        require "view/actorForm.php";
    }

    public function showRoleForm(){
        require "view/roleForm.php";
    }

    public function showCastingForm(){

        $dao = new DAO();

        $sql1 ='SELECT f.id_film, f.titre
                FROM film f';


        $sql2 ='SELECT r.id_acteur, r.prenom, r.nom
                        FROM acteur r';


        $sql3 ='SELECT ro.id_role, ro.nom_role
                        FROM role ro';

        $films = $dao -> executerRequete($sql1);
        $actors = $dao -> executerRequete($sql2);
        $roles = $dao -> executerRequete($sql3);

        require "view/castingForm.php";
    }
  
}
?>