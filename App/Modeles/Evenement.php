<?php
declare(strict_types=1);

namespace App\Modeles;

use App\App;
use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…

// Clase modèle
class Evenement
{
    private int $id = 0;
    private string $titre = '';
    private string $l_evenement = '';
    private string $date = '';
    private int $galerie_boutique = 0;
    private string $lien_facebook = '';
    private string $lien_instagram = '';


    public function __construct()
    {

    }

    /* Méthode GET */
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getEvenement(): string
    {
        return $this->l_evenement;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getGalerieBoutique(): int
    {
        return $this->galerie_boutique;
    }

    public function getLienFacebook(): string
    {
        return $this->lien_facebook;
    }

    public function getLienInstagram(): string
    {
        return $this->lien_instagram;
    }


    /* Méthode STATIC */
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM evenements';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Evenement');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $evenements = $requetePreparee->fetchAll();

        return $evenements;
    }

    public static function trouverParId(int $unIdEvenement): Evenement
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM evenements WHERE id=:idEvenement';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idEvenement', $unIdEvenement, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Evenement');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $evenement = $requetePreparee->fetch();

        return $evenement;
    }

}
