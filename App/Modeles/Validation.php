<?php
declare(strict_types=1);

namespace App\Modeles;

use \DateTime;
use \PDO;

//importe la classe PDO du langage PHP…
use \PDO\PDOStatement;

//importe la classe PDOStatement du langage PHP…
use App\App;

// Clase modèle
class Validation
{
    public static $erreur = false;

    public function __construct()
    {

    }

    public static function validerChampTexte($valeur, $type): array
    {
        $contenuBruteFichierJson = file_get_contents("../public/liaisons/js/messagesInscriptionValidation.json");
        $tMessagesJson = json_decode($contenuBruteFichierJson, true);

        $tableau = array();
        $regex = '/^[a-zA-Z\' -]{2,}$/';


        $tableau['valeur'] = $valeur;

        $tableau['valide'] = true;

        $tableau['message'] = "";


        if (empty($valeur)) {
            Validation::$erreur = true;
            $tableau['valide'] = false;
            $tableau['message'] = $tMessagesJson[$type]['vide'];
        } else {
            if (!preg_match($regex, $valeur)) {
                Validation::$erreur = true;
                $tableau['valide'] = false;
                $tableau['message'] = $tMessagesJson[$type]['pattern'];
            }
        }

        return $tableau;
    }


    public
    static function validerChampAutre($valeur, $type): array
    {
        $contenuBruteFichierJson = file_get_contents("../public/liaisons/js/messagesInscriptionValidation.json");
        $tMessagesJson = json_decode($contenuBruteFichierJson, true);

        $mdp_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        $courrielRegex = '/^[a-zA-Z0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,}$/';


        $tableau['valeur'] = $valeur;

        $tableau['valide'] = true;

        $tableau['message'] = "";


        if (empty($valeur)) {
            Validation::$erreur = true;
            $tableau['valide'] = false;
            $tableau['message'] = $tMessagesJson[$type]['vide'];
        } elseif ($type === "mdp") {
            if (!preg_match($mdp_regex, $valeur)) {
                Validation::$erreur = true;
                $tableau['valide'] = false;
                $tableau['message'] = $tMessagesJson[$type]['pattern'];
            }
        } elseif ($type === "courriel") {
            if (!preg_match($courrielRegex, $valeur)) {
                Validation::$erreur = true;
                $tableau['valide'] = false;
                $tableau['message'] = $tMessagesJson[$type]['pattern'];
            }
        }
        return $tableau;
    }

}
