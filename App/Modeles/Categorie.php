<?php
declare(strict_types=1);

namespace App\Modeles;

use App\App;
use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…

// Clase modèle
class Categorie
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
        $chaineSQL = 'SELECT * FROM categories';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Categorie');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $categories = $requetePreparee->fetchAll();

        return $categories;
    }

    public static function trouverParId(int $unIdCategorie): Categorie
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM categories WHERE id=:idCategorie';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCategorie', $unIdCategorie, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Categorie');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $categorie = $requetePreparee->fetch();

        return $categorie;
    }

}
