<?php
declare(strict_types=1);

namespace App\Modeles;

use App\App;
use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…

// Clase modèle
class Couverture
{
    private int $id = 0;
    private string $nom = '';


    public function __construct()
    {

    }

    /* Méthode GET */
    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }


    /* Méthode STATIC */
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM type_couverture';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Couverture');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $couvertures = $requetePreparee->fetchAll();

        return $couvertures;
    }

    public static function trouverParId(int $unIdCouverture): Couverture
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM type_couverture WHERE id=:idCouverture';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCouverture', $unIdCouverture, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Couverture');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $couverture = $requetePreparee->fetch();

        return $couverture;
    }

}
