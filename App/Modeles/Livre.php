<?php
declare(strict_types=1);

namespace App\Modeles\Exemple;

use DateTime;
use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…

// Clase modèle
class Livre
{
    private int $id = 0;
    private string $nom = '';
    private string $prenom = '';
    private string $sexe = '';
    private string $naissance = '';
    private string $telephone = '';
    private int $activite_id = 0;
    private int $ville_id = 0;

    public function __construct(){

    }

    /* Méthode GET */
    public function getPrenomNom():string {
        return $this->nom . " " . $this->prenom;
    }

    public function getId():int
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

    public function getSexe(): string
    {
        return $this->sexe;
    }

    public function getNaissance(): string
    {
        return $this->naissance;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function getActiviteId(): int
    {
        return $this->activite_id;
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

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setSexe(string $sexe): void
    {
        $this->sexe = $sexe;
    }

    public function setNaissance(string $naissance): void
    {
        $this->naissance = $naissance;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function setActiviteId(int $activite_id): void
    {
        $this->activite_id = $activite_id;
    }

    public function setVilleId(int $ville_id): void
    {
        $this->ville_id = $ville_id;
    }

    public function getVilleAssociee($id, $pdo): Ville
    {
        return Ville::trouverParId($id, $pdo);
    }

    /* Calculer champ */
    public function calculerChamp(): int {
        $dateActuelle =  new DateTime();
        $dateNaissance = new DateTime($this->getNaissance());

        $age = $dateActuelle->diff($dateNaissance);
        $annee = $age->y;

        return $annee;

    }


    /* Méthode STATIC */
    public static function trouverTout($pdo):array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Exemple\Participant');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $participants = $requetePreparee->fetchAll();

        return $participants;
    }

    public static function trouverParId(int $unIdParticipant, $pdo):Participant {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres WHERE id=:idParticipant';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idParticipant', $unIdParticipant,PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Exemple\Participant');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $participant = $requetePreparee->fetch();

        return $participant;
    }

    public static function trouverParIdActivite(int $unIdActivite, $pdo):array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres WHERE activite_id=:idActivite';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idActivite', $unIdActivite,PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Exemple\Participant');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $participants = $requetePreparee->fetchAll();

        return $participants;
    }
    public static function trouverParIdVille(int $unIdVille, $pdo):array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres WHERE activite_id=:idVille';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idVille', $unIdVille,PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Exemple\Participant');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $participants = $requetePreparee->fetchAll();

        return $participants;
    }

    public static function trouverNbParticipants($pdo): int {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT COUNT(*) AS nombres FROM livres;';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_ASSOC);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $nbParticipant = $requetePreparee->fetch();

        return $nbParticipant['nombres'];
    }



}
