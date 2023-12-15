<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Validation;


class ControleurCompte
{

    public function __construct()
    {
    }

    public function connexion(): void
    {
        $tValidation = $_SESSION['tValidation'];

        $tDonnees = ["tValidation" => $tValidation];
        echo App::getBlade()->run("comptes.identifier", $tDonnees);
    }

    public function nouveau(): void
    {
        $tValidation = $_SESSION['tValidation'];

        $tDonnees = ["tValidation" => $tValidation];

        echo App::getBlade()->run("comptes.enregistrer", $tDonnees);
    }

    public function inserer(): void
    {
        $tValidation = array();

        $_SESSION['tValidation'] = $tValidation;

        // Champ texte
        $nom = $_POST["nom"];

        $prenom = $_POST["prenom"];

        // Autre

        $courriel = $_POST["courriel"];
        $mdp = $_POST["mdp"];

        //Numérique

        $acceptation_reglements = null;
        if (isset($_POST["acceptation_reglements"])) {
            $acceptation_reglements = $_POST["acceptation_reglements"];
        }


        $prenomValidation = Validation::validerChampTexte($prenom, "prenom");

        $nomValidation = Validation::validerChampTexte($nom, "nom");


        $courrielValidation = Validation::validerChampAutre($courriel, "courriel");
        $mdpValidation = Validation::validerChampAutre($mdp, "mdp");


//        $acceptationReglementValidation = Validation::validerChampBool($acceptation_reglements, "acceptation_reglements");

//        "AcceptationReglement" => $acceptationReglementValidation
        $tValidation = ["Prenom" => $prenomValidation, "Nom" => $nomValidation, "Courriel" => $courrielValidation, "Mdp" => $mdpValidation];
        $_SESSION['tValidation'] = $tValidation;


        if (Validation::$erreur) {
            header('Location:index.php?controleur=compte&action=nouveau');
        } else {
            header('Location:index.php?controleur=site');
        }
        exit;

    }

    public function connecter(): void
    {
        $tValidation = array();

        $_SESSION['tValidation'] = $tValidation;


        // Autre

        $courriel = $_POST["courriel"];
        $mdp = $_POST["mdp"];


        $courrielValidation = Validation::validerChampAutre($courriel, "courriel");
        $mdpValidation = Validation::validerChampAutre($mdp, "mdp");


        $tValidation = ["Courriel" => $courrielValidation, "Mdp" => $mdpValidation];
        $_SESSION['tValidation'] = $tValidation;


        if (Validation::$erreur) {
            header('Location:index.php?controleur=compte&action=connexion');
        } else {
            header('Location:index.php?controleur=site');
        }
        exit;

    }
}

?>


