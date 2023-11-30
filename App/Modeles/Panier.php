<?php
declare(strict_types=1);

namespace App\Modeles;

use \PDO;

//importe la classe PDO du langage PHP…
use \PDO\PDOStatement;

//importe la classe PDOStatement du langage PHP…
use App\App;

// Clase modèle
class Panier
{
    private int $id = 0;
    private string $id_session = '';
    private int $date_unix_dernier_acces = 0;

    public function __construct()
    {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdSession(): string
    {
        return $this->id_session;
    }

    public function getDateUnixDernierAcces(): int
    {
        return $this->date_unix_dernier_acces;
    }

    /* SET */

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setIdSession(string $id_session): void
    {
        $this->id_session = $id_session;
    }

    public function setDateUnixDernierAcces(int $date_unix_dernier_acces): void
    {
        $this->date_unix_dernier_acces = $date_unix_dernier_acces;
    }

    public function getNbArticleParPanier(): int
    {
        return Article::compterNombreArticleParPanier($this->id);
    }

    public static function trouverPanierParIdSession()
    {
        $id_session = App::getIdSession();
        $chaineSQL = 'SELECT * FROM paniers WHERE id_session=:idSession';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idSession', $id_session, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Panier');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $produit = $requetePreparee->fetch();

        return $produit;
    }

    public function inserer(): void
    {

        $chaineSQL = 'INSERT INTO paniers (id_session, date_unix_dernier_acces)
            VALUES (:id_session, :date_unix_dernier_acces)';

        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        $requetePreparee->bindParam(':id_session', $this->id_session, App::getPDO()::PARAM_STR);
        $requetePreparee->bindParam(':date_unix_dernier_acces', $this->date_unix_dernier_acces, App::getPDO()::PARAM_INT);

        // Exécuter la requête
        $requetePreparee->execute();

    }

    public function modifier(): void
    {

        $chaineSQL = ' UPDATE paniers
                        SET id_session = :id_session, date_unix_dernier_acces = :date_unix_dernier_acces WHERE id = :id';

        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        $requetePreparee->bindParam(':id_session', $this->id_session, App::getPDO()::PARAM_STR);
        $requetePreparee->bindParam(':date_unix_dernier_acces', $this->date_unix_dernier_acces, App::getPDO()::PARAM_INT);
        $requetePreparee->bindParam(':id', $this->id, App::getPDO()::PARAM_INT);

        // Exécuter la requête
        $requetePreparee->execute();

    }


}
