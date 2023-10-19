<?php
declare(strict_types=1);

namespace App\Modeles;

use App\App;
use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…

// Clase modèle
class Reconnaissance
{
    private int $id = 0;
    private string $la_reconnaissance = '';
    private int $livre_id = 0;


    public function __construct()
    {

    }

    /* Méthode GET */
    public function getId(): int
    {
        return $this->id;
    }

    public function getReconnaissance(): string
    {
        return $this->la_reconnaissance;
    }

    public function getLivreId(): int
    {
        return $this->livre_id;
    }


    /* Méthode STATIC */
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM reconnaissances';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Reconnaissance');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $reconnaissances = $requetePreparee->fetchAll();

        return $reconnaissances;
    }

    public static function trouverParId(int $unIdReconnaissance): Reconnaissance
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM reconnaissances WHERE id=:idReconnaissance';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idReconnaissance', $unIdReconnaissance, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Reconnaissance');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $reconnaissance = $requetePreparee->fetch();

        return $reconnaissance;
    }

}
