<?php
declare(strict_types=1);
namespace App\Modeles;

use App\App;
use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…

// Clase modèle
class Actualite
{
    private int $id = 0;
    private string $titre = '';
    private string $l_activite = '';
    private string $date = '0000-00-00';
    private string $lien_facebook = '';
    private string $lien_instagram = '';


    public function __construct(){

    }

    /* Méthode GET */
    public function getId():int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getl_actualite(): string
    {
        return $this->l_activite;
    }
    public function getDate(): int
    {
        return $this->date;
    }

    public function getFacebook(): string
    {
        return $this->lien_facebook;
    }

    public function getInstagram(): string
    {
        return $this->lien_instagram;
    }

    /* Méthode STATIC */
    public static function trouverTout():array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM actualites';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Actualite');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $actualites = $requetePreparee->fetchAll();

        return $actualites;
    }

    public static function trouverParId(int $unIdActualite):Actualite {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM actualites WHERE id=:idActualite';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idActualite', $unIdActualite,PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Actualite');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $actualite = $requetePreparee->fetch();

        return $actualite;
    }
}
