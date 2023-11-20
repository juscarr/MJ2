<?php
declare(strict_types=1);

namespace App\Modeles;

use App\App;
use App\Modeles\AssocLivreAuteur;
use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…


// Clase modèle
class Auteur
{
    private int $id = 0;
    private string $nom = '';
    private string $prenom = '';
    private string $notice = '';
    private string $site_web = '';

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

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getPrenomNom(): string
    {
        $prenomNom = $this->prenom . " " . $this->nom;
        return $prenomNom;
    }

    public function getNotice(): string
    {
        return $this->notice;
    }

    public function getSite(): string
    {
        return $this->site_web;
    }

    public function getLivresAssociee($id): array
    {
        return AssocLivreAuteur::trouverLivresParIdAuteur($id);
    }


    /* Méthode STATIC */
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $auteurs = $requetePreparee->fetchAll();

        return $auteurs;
    }

    public static function trouverParId(int $unIdAuteur): Auteur
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs WHERE id=:idAuteur';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idAuteur', $unIdAuteur, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $auteur = $requetePreparee->fetch();

        return $auteur;
    }

    public static function trouverNbAuteurs(): int
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT COUNT(*) AS nombres FROM auteurs;';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_ASSOC);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $nbAuteur = $requetePreparee->fetch();

        return $nbAuteur['nombres'];
    }

    public static function paginer(int $unNoDePage, float $unNbrParPage)
    {

        $unNoDePage = 6 * ($unNoDePage - 1);

        $chaineSQL = 'SELECT * FROM `auteurs` LIMIT :indexDepart, :nbrParPage';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':indexDepart', $unNoDePage, PDO::PARAM_INT);
        $requetePreparee->bindParam(':nbrParPage', $unNbrParPage, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $paginerAuteurs = $requetePreparee->fetchAll();

        return $paginerAuteurs;
    }


}
