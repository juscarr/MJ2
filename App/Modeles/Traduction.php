<?php
declare(strict_types=1);

namespace App\Modeles;

use App\App;
use PDO;
use PDO\PDOStatement;

//importe la classe PDO du langage PHP…
//importe la classe PDOStatement du langage PHP…

// Clase modèle
class Traduction
{
    private int $id = 0;
    private string $traduit_en = '';
    private string $traduit_de = '';
    private string $traduit_par = '';
    private int $livre_id = 0;


    public function __construct()
    {

    }

    /* Méthode GET */
    public function getId(): int
    {
        return $this->id;
    }

    public function getTraduitEn(): string
    {
        return $this->traduit_en;
    }

    public function getTraduitDe(): string
    {
        return $this->traduit_de;
    }

    public function getTraduitPar(): string
    {
        return $this->traduit_par;
    }

    public function getIdLivre(): int
    {
        return $this->livre_id;
    }

    /* Méthode STATIC */
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM traductions';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Traduction');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $traductions = $requetePreparee->fetchAll();

        return $traductions;
    }

    public static function trouverParId(int $unIdTraduction): Traduction
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM traductions WHERE id=:idTraduction';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idTraduction', $unIdTraduction, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Traduction');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $traduction = $requetePreparee->fetch();

        return $traduction;
    }

    public static function trouverParLivre(int $unIdLivre): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM traductions WHERE livre_id=:idLivre';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idLivre', $unIdLivre, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Traduction');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $traductions = $requetePreparee->fetchAll();

        return $traductions;
    }


}
