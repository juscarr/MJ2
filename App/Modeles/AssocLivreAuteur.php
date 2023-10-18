<?php
declare(strict_types=1);

namespace App\Modeles;

use App\Modeles\Livre;

use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…


// Clase modèle
class AssocLivreAuteur
{
    private int $id = 0;
    private int $livre_id = 0;
    private int $auteur_id = 0;


    public function __construct()
    {

    }

    /* Méthode GET */
    public function getId(): int
    {
        return $this->id;
    }

    public function getIdLivre(): int
    {
        return $this->livre_id;
    }

    public function getIdAuteur(): int
    {
        return $this->auteur_id;
    }

    public function getAuteurAssoc(int $unIdAuteur, $pdo): Auteur
    {
        return Auteur::trouverParId($unIdAuteur, $pdo);
    }


    /* Méthode STATIC */
    public static function trouverAuteursParIdLivre(int $unIdLivre, $pdo): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres_auteurs WHERE livre_id=:idLivre';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idLivre', $unIdLivre, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\AssocLivreAuteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $auteurs = $requetePreparee->fetchAll();

        return $auteurs;
    }

    public static function trouverLivresParIdAuteur(int $unIdAuteur, $pdo): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres_auteurs WHERE auteur_id=:idAuteur';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idAuteur', $unIdAuteur, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\AssocLivreAuteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }

}
