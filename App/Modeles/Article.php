<?php
declare(strict_types=1);

namespace App\Modeles;

use \PDO;

//importe la classe PDO du langage PHP…
use \PDO\PDOStatement;

//importe la classe PDOStatement du langage PHP…
use App\App;

// Clase modèle
class Article
{
    private int $id = 0;
    private int $quantite = 0;
    private int $livre_id = 0;
    private int $panier_id = 0;


    public function __construct()
    {

    }

    // GET

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function getLivreId(): int
    {
        return $this->livre_id;
    }

    public function getPanierId(): int
    {
        return $this->panier_id;
    }


    // SET

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

    public function setLivreId(int $livre_id): void
    {
        $this->livre_id = $livre_id;
    }

    public function setPanierId(int $panier_id): void
    {
        $this->panier_id = $panier_id;
    }

    public function getLivreAssoc()
    {
        return Livre::trouverParId($this->livre_id);
    }

    public static function trouverArticlesParIdPanier($id_panier)
    {
        $chaineSQL = 'SELECT * FROM articles WHERE panier_id=:idPanier';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idPanier', $id_panier, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Article');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $articles = $requetePreparee->fetchAll();

        return $articles;
    }

    public static function trouverArticleParIdPanierEtIdLivre($id_panier, $id_livre)
    {
        $chaineSQL = 'SELECT * FROM articles WHERE panier_id=:idPanier AND livre_id=:idLivre';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idPanier', $id_panier, PDO::PARAM_INT);
        $requetePreparee->bindParam(':idLivre', $id_livre, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Article');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $panier = $requetePreparee->fetch();

        return $panier;
    }

    public function inserer(): void
    {

        $chaineSQL = 'INSERT INTO articles (quantite, livre_id, panier_id)
            VALUES (:quantite, :livre_id, :panier_id)';

        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        $requetePreparee->bindParam(':quantite', $this->quantite, App::getPDO()::PARAM_INT);
        $requetePreparee->bindParam(':panier_id', $this->panier_id, App::getPDO()::PARAM_INT);
        $requetePreparee->bindParam(':livre_id', $this->livre_id, App::getPDO()::PARAM_INT);

        // Exécuter la requête
        $requetePreparee->execute();

    }

    public function modifierQuantite(): void
    {

        $chaineSQL = ' UPDATE articles
                        SET quantite = :quantite WHERE id = :id';

        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        $requetePreparee->bindParam(':quantite', $this->quantite, App::getPDO()::PARAM_INT);
        $requetePreparee->bindParam(':id', $this->id, App::getPDO()::PARAM_INT);

        // Exécuter la requête
        $requetePreparee->execute();

    }

    public function supprimer(): void
    {

        $chaineSQL = "DELETE FROM articles WHERE id = :id";

        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        $requetePreparee->bindParam(':id', $this->id, App::getPDO()::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();

    }

    public static function supprimerPanier($panier_id): void
    {

        $chaineSQL = "DELETE FROM articles WHERE panier_id = :panierId";

        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        $requetePreparee->bindParam(':panierId', $panier_id, App::getPDO()::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();

    }

    public static function compterNombreArticleParPanier($panier_id): int
    {

        // Définir la chaine SQL
        $chaineSQL = 'SELECT quantite FROM articles WHERE panier_id=:idPanier;';

        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':idPanier', $panier_id, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_ASSOC);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $nbArticle = $requetePreparee->fetchAll();

        $quantiteTotal = 0;

        foreach ($nbArticle as $quantite) {
            $quantiteTotal = $quantiteTotal + $quantite['quantite'];
        }
        return $quantiteTotal;
    }

}
