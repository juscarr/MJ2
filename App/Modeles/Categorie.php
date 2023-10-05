<?php
declare(strict_types=1);
namespace App\Modeles;

use App\Modeles\Exemple\Activite;
use App\Modeles\Exemple\Participant;
use App\Modeles\Exemple\Region;
use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…

// Clase modèle
class Categorie
{
    private int $id = 0;
    private string $nom = '';
    private int $region_id = 0;


    public function __construct(){

    }

    /* Méthode GET */
    public function getId():int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getRegionId(): int
    {
        return $this->region_id;
    }

    /* Méthode SET */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setRegionId(int $region_id): void
    {
        $this->region_id = $region_id;
    }

    public function getRegionAssociees($id, $pdo):Region {
        return Region::trouverParId($id, $pdo);
    }

    public function getParticipantsAssociees($id, $pdo):Array {
        return Participant::trouverParIdVille($id, $pdo);
    }

    public function getActivitesAssociees($id, $pdo):Array {
        return Activite::trouverParIdVille($id, $pdo);
    }


    /* Méthode STATIC */
    public static function trouverTout($pdo):array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM villes';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Ville');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $villes = $requetePreparee->fetchAll();

        return $villes;
    }

    public static function trouverParId(int $unIdVille, $pdo): Exemple\Ville {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM villes WHERE id=:idVille';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idVille', $unIdVille,PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Ville');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $ville = $requetePreparee->fetch();

        return $ville;
    }

    public static function trouverParRegion(int $unIdRegion, $pdo) {
         // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM villes WHERE region_id=:idRegion';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idRegion', $unIdRegion,PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Ville');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $tableauVille = $requetePreparee->fetchAll();

        return $tableauVille;
    }





}
