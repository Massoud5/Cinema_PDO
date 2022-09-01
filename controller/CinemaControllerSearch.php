<?php
// pour spécicfier l'étage dans bibliothèque namespace
namespace Controller;

// pour appeler l'étage spécifié d'une page
use Model\DAO;
use controller\CinemaController;                                                        

// class sans construct car elle sert juste à faire des appels
class CinemaControllerSearch {

    private int $_id;

    // methode de recherche dans la page home.php 
    public function search(){
        // la condition n'est pas à utiliser pour passer directement à la fonction sinon le code n'est pas lu
        // if($_POST['submit']){

            $dao = new DAO();
            $key = filter_input(INPUT_POST, "key", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if(!empty($key)){

                // pour fusionner deux genres d'un film on utilis GROUP_CONCAT() avec GROUP BY à la fin
                //! attention aux quotes
                $sql = 'SELECT f.titre, DATE_FORMAT(f.sortie_france, "%d %M %Y") AS dateSortie, GROUP_CONCAT(g.nom_genre SEPARATOR " / ") AS genres 
                            FROM film f, classer c, genre g
                            WHERE f.id_film = c.id_film
                            AND g.id_genre = c.id_genre
                            AND LOWER(f.titre)
                            LIKE :keyword
                            OR LOWER(f.sortie_france)
                            LIKE :keyword
                            OR LOWER(g.nom_genre)
                            LIKE :keyword
                            GROUP BY f.id_film
                        ';

                $array=[':keyword' => '%'.$key.'%'];
            
                $results = $dao -> executerRequete($sql, $array);
                $rows = $results -> rowCount();
                   
                // var_dump($results);
                if(!$results){
                    echo "<p style='color:red;position:fixed;right:50px;'>Erreur</p>";
                }
                require "view/searchResults.php";
            }
            else{
                echo "<p style='color:red;position:fixed;right:150px;top:80px;'>Ecrivez qqch!</p>";
                $requirePage = new CinemaController;
                $requirePage -> findAllMovies($results= null);
            }
            

        // }

    }
}