<?php
// pour spécicfier l'étage dans bibliothèque namespace
namespace Controller;

// pour appeler l'étage spécifié d'une page
use Model\DAO; 
use controller\CinemaController;                                                     

// class sans construct car elle sert juste à faire des appels
class CinemaControllerDelete {

    public function deleteActor($id){

        $dao = new DAO;

        // $id = $_GET['id_acteur'];

        $sql1 = 'DELETE FROM casting
                WHERE id_acteur = :id';
        
        $sql2 = 'DELETE FROM acteur
                WHERE id_acteur = :id';
        
        $array = [':id'=>$id];

        $result1 = $dao -> executerRequete($sql1, $array);
        $result2 = $dao -> executerRequete($sql2, $array);

        if($result2){
            echo "<p class='message'>L'acteur est supprimé</p>";
        }else{
            echo "<p class='message'>L'acteur n'est pas supprimé</p>";
        }

        // pour charger la page filmForm.php après le submit
        $requirePage = new CinemaController;
        $requirePage -> findAllActors();

    }

    public function deleteRole($id){

        $dao = new DAO;

        // $id = $_GET['id_acteur'];

        $sql1 = 'DELETE FROM casting
                WHERE id_role = :id';
        
        $sql2 = 'DELETE FROM role
                WHERE id_role = :id';
        
        $array = [':id'=>$id];

        $result1 = $dao -> executerRequete($sql1, $array);
        $result2 = $dao -> executerRequete($sql2, $array);

        if($result2){
            echo "<p class='message'>Le role est supprimé</p>";
        }else{
            echo "<p class='message'>Le role n'est pas supprimé</p>";
        }

        // pour charger la page filmForm.php après le submit
        $requirePage = new CinemaController;
        $requirePage -> findAllRolles();

    }

    public function deleteFilm($id){

        $dao = new DAO;

        // $id = $_GET['id_acteur'];

        $sql1 = 'DELETE FROM classer
                WHERE id_film = :id';

        $sql2 = 'DELETE FROM casting
                WHERE id_film = :id';
        
        $sql3 = 'DELETE FROM film
                WHERE id_film = :id';
        
        $array = [':id'=>$id];

        $result1 = $dao -> executerRequete($sql1, $array);
        $result2 = $dao -> executerRequete($sql2, $array);
        $result2 = $dao -> executerRequete($sql3, $array);

        if($result2){
            echo "<p class='message'>Le film est supprimé</p>";
        }else{
            echo "<p class='message'>Le film n'est pas supprimé</p>";
        }

        // pour charger la page filmForm.php après le submit
        $requirePage = new CinemaController;
        $requirePage -> findAllMovies();

    }

}
?>