<?php


namespace Model;

// Déclaration de class DAO(data access object)
class DAO{

    // attribut pour representer la class PDO à instantier
    private $bdd;

    // instantiation de Classe native "PDO" pour créer un accés à la base de donnée
    public function __construct(){

        // assigner la classe instantié à l'attribut "bdd"
                                                                        //! nom admin, password
        $this->bdd = new \PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
    }

    // fonction permettant d'accéder à la base de donnée
    function getBDD(){

        return $this->bdd;
    }
    
    // fonction contenant les fonctions d'exécution des requêtes SQL
    public function executerRequete($sql, $params = NULL){

        $this -> bdd -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        // si il y a pas de paramètre 
        if ($params == NULL){

            // utiliser la fonction native query simplement
            $resultat = $this->bdd->query($sql);

            // sinon
        }else{

            // utiliser la fonction "prepare()" pour la requête SQL  
            $resultat = $this->bdd->prepare($sql);

            // et la fonction"execute()" pour chercher les données précises. 
            $resultat->execute($params);
        }
        return $resultat;
    }
}