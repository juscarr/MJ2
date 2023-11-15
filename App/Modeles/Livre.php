<?php
declare(strict_types=1);

namespace App\Modeles;

use App\App;
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

    public function getImpressionAssociee($id): Impression
    {
        return Impression::trouverParId($id);
    }

    public function getCouvertureAssociee($id): Couverture
    {
        return Couverture::trouverParId($id);
    }

    public function getCategorieAssociee(): Categorie
    {
        return Categorie::trouverParId($this->categorie_id);
    }

    public function getAuteurAssociee($id): array
    {
        return AssocLivreAuteur::TrouverAuteursParIdLivre($id);
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
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }

    public static function trouverParId(int $unIdLivre): Livre
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres WHERE id=:idLivre';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idLivre', $unIdLivre, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livre = $requetePreparee->fetch();

        return $livre;
    }

    public static function trouverParCategorieId($categorie): array
    {

        $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCategorie', $categorie, PDO::PARAM_INT);

//        $requetePreparee->setFetchMode(PDO::FETCH_OBJ);
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        $requetePreparee->execute();
        $livres = $requetePreparee->fetchAll();

        return $livres;

    }

    public static function trouverNbLivres(): int
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT COUNT(*) AS nombres FROM livres;';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_ASSOC);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $nbLivre = $requetePreparee->fetch();

        return $nbLivre['nombres'];
    }

    public static function trouverNbLivresParCategorie($categorie): int
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT COUNT(*) AS nombres FROM livres WHERE categorie_id=:idCategorie;';

        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCategorie', $categorie, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_ASSOC);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $nbLivre = $requetePreparee->fetch();

        return $nbLivre['nombres'];
    }



    public static function paginer(int $unNoDePage, float $unNbrParPage, int $categorie, string $tri)
    {

        $unNoDePage = 6 * ($unNoDePage - 1);
        if($tri === "DESC") {
            if($categorie == 0) {
                $chaineSQL = 'SELECT * FROM `livres` ORDER BY date_parution_quebec DESC LIMIT :indexDepart, :nbrParPage ';
                $requetePreparee = App::getPDO()->prepare($chaineSQL);

            } else {
                $chaineSQL = 'SELECT * FROM `livres` WHERE categorie_id=:idCategorie ORDER BY date_parution_quebec DESC LIMIT :indexDepart, :nbrParPage  ';
                $requetePreparee = App::getPDO()->prepare($chaineSQL);
                $requetePreparee->bindParam(':idCategorie', $categorie, PDO::PARAM_INT);
            }
        } else {
            if($categorie == 0) {
                $chaineSQL = 'SELECT * FROM `livres` ORDER BY date_parution_quebec ASC LIMIT :indexDepart, :nbrParPage';
                $requetePreparee = App::getPDO()->prepare($chaineSQL);

            } else {
                $chaineSQL = 'SELECT * FROM `livres` WHERE categorie_id=:idCategorie ORDER BY date_parution_quebec ASC LIMIT :indexDepart, :nbrParPage';
                $requetePreparee = App::getPDO()->prepare($chaineSQL);
                $requetePreparee->bindParam(':idCategorie', $categorie, PDO::PARAM_INT);
            }
        }


        $requetePreparee->bindParam(':indexDepart', $unNoDePage, PDO::PARAM_INT);
        $requetePreparee->bindParam(':nbrParPage', $unNbrParPage, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $paginerLivres = $requetePreparee->fetchAll();

        return $paginerLivres;
    }

}
