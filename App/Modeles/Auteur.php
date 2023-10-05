<?php
declare(strict_types=1);

namespace App\Modeles;

use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…


// Clase modèle
class Auteur
{
    private int $id = 0;
    private string $nom = '';
    private string $description = '';
    private int $categorie_id = 0;
    private int $niveau_id = 0;
    private int $ville_id = 0;

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCategorieId(): int
    {
        return $this->categorie_id;
    }

    public function getNiveauId(): int
    {
        return $this->niveau_id;
    }

    public function getVilleId(): int
    {
        return $this->ville_id;
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

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setCategorieId(int $categorie_id): void
    {
        $this->categorie_id = $categorie_id;
    }

    public function setNiveauId(int $niveau_id): void
    {
        $this->niveau_id = $niveau_id;
    }

    public function setVilleId(int $ville_id): void
    {
        $this->ville_id = $ville_id;
    }

    public function getVillesAssociee($id, $pdo): Ville
    {
        return Ville::trouverParId($id, $pdo);
    }

    public function getNiveauxAssociee($id, $pdo): Niveau
    {
        return Niveau::trouverParId($id, $pdo);
    }

    public function getCategorieAssociee($id, $pdo): Categorie
    {
        return Categorie::trouverParId($id, $pdo);
    }

    public function getParticipantsAssociees($id, $pdo): array
    {
        return Participant::trouverParIdActivite($id, $pdo);
    }

    /* Méthode STATIC */
    public static function trouverTout($pdo):array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Exemple\Activite');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $activites = $requetePreparee->fetchAll();

        return $activites;
    }

    public static function trouverParId(int $unIdActivite, $pdo):Activite {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs WHERE id=:idActivite';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idActivite', $unIdActivite,PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Exemple\Activite');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $activite = $requetePreparee->fetch();

        return $activite;
    }

    public static function trouverParIdVille(int $unIdville, $pdo):array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs WHERE ville_id=:idVille';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idVille', $unIdville,PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Exemple\Activite');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $activites = $requetePreparee->fetchAll();

        return $activites;
    }


}
