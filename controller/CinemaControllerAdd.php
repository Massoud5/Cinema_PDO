<?php

namespace Controller;

// pour pouvoir instantier la classe mentionnée

use Model\DAO;
use controller\CinemaController;


class CinemaControllerAdd {

    public function addFilm(){

        $dao = new DAO();

        if (isset($_POST['submitFilm'])){

        $titre = filter_input(INPUT_POST, "titreFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // to filter the date
        $date = strtr($_POST['sortieFrance'], '/', '-') ;
        $sortieFrance = date('Y-m-d', strtotime($date));
        
        $duree = filter_input(INPUT_POST,"duree", FILTER_VALIDATE_INT);
        $note = filter_input(INPUT_POST,"note", FILTER_VALIDATE_INT);
        $resume = filter_input(INPUT_POST, "resume", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $realisateurId = $_POST['realisateur'];
        $genreId = $_POST['genre'];
        
        
        if(!empty($titre) && !empty($sortieFrance) && !empty($duree) && !empty($note) && !empty($resume) && !empty($realisateurId)){
            
            
            $sql1='INSERT INTO film (titre, sortie_france, duree, note, resume, id_realisateur)
                  VALUES(:titre, :sortieFrance, :duree, :note, :resume, :realisateurId)';
            $array1 = [
                ':titre' => $titre,
                ':sortieFrance' => $sortieFrance,
                //to have an integer number
                ':duree' => intval($duree),
                ':note' => intval($note),
                ':resume' => $resume,
                ':realisateurId' => $realisateurId,
            ]; 

            $result1 = $dao->executerRequete($sql1, $array1);
            

            // solution alternative qui n'est pas fonctionnel
            // mysql_query($sql1);
            // $filmId = last_insert_id()

            $sql2 = 'SELECT LAST_INSERT_ID() FROM film';
            $result2 = $dao->executerRequete($sql2);
            // $filmId est un array
            $filmId = $result2 -> fetch();

            $sql3 = 'INSERT INTO classer(id_film, id_genre) VALUES(:filmId, :genreId)';
            
            $array3 = [
                //! $filmId est un array donc il faut préciser l'index
                ':filmId' => $filmId[0],
                ':genreId' => $genreId
            ];
            
            $result3 = $dao->executerRequete($sql3, $array3);

            if($result3){
                echo "
                <p class='message'>film enregistré</p> 
                ";
            }else{
                echo "<p class='message'>Erreur: le film n'est pas enregistré</p>";
            }
            
            
            }else{
                echo "Tous les champs sont recquis!";
            }

        }
        
        // pour charger la page filmForm.php après le submit
        $requirePage = new CinemaController;
        $requirePage -> findAllMovies();
        
    }

    public function addGenre(){
        $dao = new DAO();

        if (isset($_POST['submitGenre'])){

            $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                
            if(!empty($genre)){
    
                
                $sql='INSERT INTO genre (nom_genre)
                      VALUES(:genre)';
    
                $array = [':genre' => $genre];        
                
        
                $result = $dao->executerRequete($sql, $array );
                
    
                if($result){
                    echo "
                       <p class='message'>Genre enregistré</p> 
                    ";
                }else{
                    echo "<p class='message'>Erreur: le genre n'est pas enregistré</p>";
                }
        
                // $insertStatement = $pdo -> lastInsertId();
                // echo " The insert $insertStatement was donne";
    
            }else{
                echo "Tous les champs sont recquis!";
            }
        }
     
        $requirePage = new CinemaController;
        $requirePage -> showFilmForm();
    }
        
    public function addDirector(){

        $dao = new DAO();

        if (isset($_POST['submitDirector'])){

        $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sex = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // to filter the date
        $date = strtr($_POST['date_naissance'], '/', '-') ;
        $dateNaissance = date('Y-m-d', strtotime($date));
            
            if(!empty($prenom) && !empty($nom) && !empty($sex) && !empty($dateNaissance)){

                
                $sql='INSERT INTO realisateur (prenom, nom, sexe, date_naissance)
                    VALUES(:prenom, :nom, :sexe, :date_naissance)';

                $array = [
                    ':prenom' => $prenom,
                    ':nom' => $nom,
                    ':sexe' => $sex,
                    ':date_naissance' => $dateNaissance
                ];        
                
        
                $result = $dao->executerRequete($sql, $array );
                

                if($result){
                    echo "
                    <p class='message'>Directeur enregistré</p> 
                    ";
                }else{
                    echo "<p class='message'>Erreur: le directeur n'est pas enregistré</p>";
                }
        
                // $insertStatement = $pdo -> lastInsertId();
                // echo " The insert $insertStatement was donne";

            }else{
                echo "Tous les champs sont recquis!";
            }


        }
        
        $requirePage = new CinemaController;
        $requirePage -> showFilmForm();
    }

    public function addActor(){
        $dao = new DAO();

        if (isset($_POST['submitActor'])){

            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = $_POST['sexe'];
            // to filter the date
            $date = strtr($_POST['date_naissance'], '/', '-') ;
            $dateNaissance = date('Y-m-d', strtotime($date));            
            
            if(!empty($prenom) && !empty($nom) && !empty($sexe) && !empty($dateNaissance)){

                $sql='INSERT INTO acteur (prenom, nom, sexe, date_naissance)
                      VALUES(:prenom, :nom, :sexe, :date_naissance)';
                $array = [
                    ':prenom' => $prenom,
                    ':nom' => $nom,
                    ':sexe' => $sexe,
                    ':date_naissance' => $dateNaissance,
                ]; 
                $result = $dao->executerRequete($sql, $array);
                
                if($result){
                    echo "
                    <p class='message'>Acteur enregistré</p> 
                    ";
                }else{
                    echo "<p class='message'>Erreur: Le acteur n'est pas enregistré</p>";
                }
                
                
            }else{
                echo "Tous les champs sont recquis!";
            }
    
        }
            
        // pour charger la page filmForm.php après le submit
        $requirePage = new CinemaController;
        $requirePage -> findAllActors();
    } 

    public function addRole(){
        $dao = new DAO();

        if (isset($_POST['submitRole'])){

            $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if(!empty($role)){
                
                $sql='INSERT INTO role (nom_role)
                      VALUES(:role)';
                $array = [
                    ':role' => $role,
                ]; 
                $result = $dao->executerRequete($sql, $array);

                if($result){
                    echo "
                    <p class='message'>Rôle enregistré</p> 
                    ";
                }else{
                    echo "<p class='message'>Erreur: Le rôle n'est pas enregistré</p>";
                }
                
                
            }else{
                echo "Tous les champs sont recquis!";
            }
    
        }
            
        // pour charger la page filmForm.php après le submit
        $requirePage = new CinemaController;
        $requirePage -> findAllRolles(); 
    }

    public function insertCasting(){
        $dao = new DAO();

        if (isset($_POST['submitCasting'])){

            $filmId = $_POST['film'];
            $actorId = $_POST['actor'];
            $roleId = $_POST['role'];
            
            
            if(!empty($filmId) && !empty($actorId) && !empty($roleId)){
                
                $sql = 'INSERT INTO casting(id_film, id_acteur, id_role) VALUES(:filmId, :acteurId, :roleId)';
                
                $array = [
                    ':filmId' => $filmId,
                    ':acteurId' => $actorId,
                    ':roleId' => $roleId
                ];
                
                $result = $dao->executerRequete($sql, $array);


                
                if($result){
                    echo "
                    <p class='message'>Casting effectué</p> 
                    ";
                }else{
                    echo "<p class='message'>Erreur: Le casting n'est pas effectué</p>";
                }
                
                
            }else{
                    echo "Tous les champs sont recquis!";
            }
    
        }
            
        // pour charger la page castingForm.php après le submit
        $requirePage = new CinemaController;
        $requirePage -> showCastingForm();
    }
        
        
}

?>