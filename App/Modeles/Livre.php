<?php
declare(strict_types=1);

namespace App\Modeles;

use App\Modeles\AssocLivreAuteur;
use App\Modeles\Categorie;
use App\Modeles\Impression;
use App\Modeles\Couverture;
use DateTime;

use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…

// Clase modèle
class Livre
{
    private int $id = 0;
    private string $isbn_papier = '';
    private string $isbn_pdf = '';
    private string $isbn_epub = '';
    private $url_audio = null;
    private string $titre = '';
    private string $le_livre = '';
    private string $arguments_commerciaux = '';
    private int $statut = 0;
    private int $pagination = 0;
    private int $age_min = 0;
    private string $format = '';
    private int $tirage = 0;
    private string $prix_can = '';
    private string $prix_euro = '';
    private string $date_parution_quebec = '';
    private string $date_parution_france = '';
    private int $categorie_id = 0;
    private $type_impression_id = null;
    private $type_couverture_id = null;

    public function __construct()
    {

    }

    /* Méthode GET */

    public function getId(): int
    {
        return $this->id;
    }

    public function getIsbnPapier(): string
    {
        return $this->isbn_papier;
    }

    public function getIsbnPdf(): string
    {
        return $this->isbn_pdf;
    }

    public function getIsbnEpub(): string
    {
        return $this->isbn_epub;
    }

    public function getUrlAudio(): string
    {
        return $this->url_audio;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getLeLivre(): string
    {
        return $this->le_livre;
    }


    public function getArgumentsCommerciaux(): string
    {
        return $this->arguments_commerciaux;
    }

    public function getStatut(): int
    {
        return $this->statut;
    }

    public function getPagination(): int
    {
        return $this->pagination;
    }

    public function getAgeMin(): int
    {
        return $this->age_min;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getTirage(): int
    {
        return $this->tirage;
    }

    public function getPrixCan(): string
    {
        return $this->prix_can;
    }

    public function getPrixEuro(): string
    {
        return $this->prix_euro;
    }

    public function getDateParutionQuebec(): string
    {
        return $this->date_parution_quebec;
    }

    public function getDateParutionFrance(): string
    {
        return $this->date_parution_france;
    }

    public function getCategorieId(): int
    {
        return $this->categorie_id;
    }

    public function getTypeImpressionId(): int
    {
        return $this->type_impression_id;
    }

    public function getTypeCouvertureId(): int
    {
        return $this->type_couverture_id;
    }

    public function getImpressionAssociee($id, $pdo): Impression
    {
        return Impression::trouverParId($id, $pdo);
    }

    public function getCouvertureAssociee($id, $pdo): Couverture
    {
        return Couverture::trouverParId($id, $pdo);
    }

    public function getCategorieAssociee($id, $pdo): Categorie
    {
        return Categorie::trouverParId($id, $pdo);
    }

    public function getAuteurAssociee($id, $pdo): array
    {
        return AssocLivreAuteur::TrouverAuteursParIdLivre($id, $pdo);
    }



    /* Calculer champ */
//    public function calculerChamp(): int
//    {
//        $dateActuelle = new DateTime();
//        $dateNaissance = new DateTime($this->getNaissance());
//
//        $age = $dateActuelle->diff($dateNaissance);
//        $annee = $age->y;
//
//        return $annee;
//
//    }


    /* Méthode STATIC */
    public static function trouverTout($pdo): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }

    public static function trouverParId(int $unIdLivre, $pdo): Livre
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres WHERE id=:idLivre';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idLivre', $unIdLivre, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livre = $requetePreparee->fetch();

        return $livre;
    }

    public static function trouverParCategorie(array $idCategorie, $pdo): array
    {
        $nbrCategorie = count($idCategorie);
        if ($nbrCategorie == 1) {
            $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1';
            $requetePreparee = $pdo->prepare($chaineSQL);
            $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
        } elseif ($nbrCategorie == 2) {
            $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2';
            $requetePreparee = $pdo->prepare($chaineSQL);
            $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
        } elseif ($nbrCategorie == 3) {
            $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2 AND categorie_id=:idCategorie3';
            $requetePreparee = $pdo->prepare($chaineSQL);
            $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie3', $idCategorie[2], PDO::PARAM_INT);
        } elseif ($nbrCategorie == 4) {
            $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2 AND categorie_id=:idCategorie3 AND categorie_id=:idCategorie4';
            $requetePreparee = $pdo->prepare($chaineSQL);
            $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie3', $idCategorie[2], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie4', $idCategorie[3], PDO::PARAM_INT);
        } elseif ($nbrCategorie == 5) {
            $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2 AND categorie_id=:idCategorie3 AND categorie_id=:idCategorie4 AND categorie_id=:idCategorie5';
            $requetePreparee = $pdo->prepare($chaineSQL);
            $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie3', $idCategorie[2], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie4', $idCategorie[3], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie5', $idCategorie[4], PDO::PARAM_INT);
        } elseif ($nbrCategorie == 6) {
            $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2 AND categorie_id=:idCategorie3 AND categorie_id=:idCategorie4 AND categorie_id=:idCategorie5 AND categorie_id=:idCategorie6';
            $requetePreparee = $pdo->prepare($chaineSQL);
            $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie3', $idCategorie[2], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie4', $idCategorie[3], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie5', $idCategorie[4], PDO::PARAM_INT);
            $requetePreparee->bindParam(':idCategorie6', $idCategorie[5], PDO::PARAM_INT);
        }

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }

    public static function trouverNbLivres($pdo): int
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT COUNT(*) AS nombres FROM livres;';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_ASSOC);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $nbLivre = $requetePreparee->fetch();

        return $nbLivre['nombres'];
    }


}
