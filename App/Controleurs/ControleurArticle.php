<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Article;
use App\Modeles\Panier;


class ControleurArticle
{

    public function __construct()
    {

    }

    public function ajouter(): void
    {

        $quantite = $_POST["quantite"];

        $idLivre = $_GET["id"];

        $panier = Panier::trouverPanierParIdSession();

        $article = Article::trouverArticleParIdPanierEtIdLivre($panier->getId(), intval($idLivre));

        $idPanier = $panier->getId();

        if ($quantite > 10) {
            header('Location:index.php?controleur=livre&action=fiche&id=' . $idLivre);
            exit;
        } else {
            if (!$article) {
                $nouveauArticle = new Article;
                $nouveauArticle->setPanierId($idPanier);
                $nouveauArticle->setLivreId(intval($idLivre));
                $nouveauArticle->setQuantite(intval($quantite));
                $nouveauArticle->inserer();
                header('Location:index.php?controleur=panier&action=fiche');
                exit;
            } else {
                if ($article->getLivreId() === intval($idLivre)) {
                    $quantiteArticle = intval($quantite) + $article->getQuantite();
                    if ($quantiteArticle > 10) {
                        header('Location:index.php?controleur=livre&action=fiche&id=' . $idLivre);
                        exit;
                    } else {
                        $article->setQuantite($quantiteArticle);
                        $article->modifierQuantite();
                        header('Location:index.php?controleur=livre&action=fiche&id=' . $idLivre);
                        exit;
                    }
                }
            }

        }
    }

    public function modifierQuantite(): void
    {
        $quantite = $_POST["quantite"];

        $idLivre = $_GET["id"];

        $panier = Panier::trouverPanierParIdSession();

        $article = Article::trouverArticleParIdPanierEtIdLivre($panier->getId(), $idLivre);

        $article->setQuantite(intval($quantite));
        $article->modifierQuantite();

        header('Location:index.php?controleur=panier&action=fiche');

        exit;

    }

    public function supprimer(): void
    {
        $idLivre = $_GET["id"];

        $panier = Panier::trouverPanierParIdSession();

        $article = Article::trouverArticleParIdPanierEtIdLivre($panier->getId(), $idLivre);

        $article->supprimer();

        header('Location:index.php?controleur=panier&action=fiche');

        exit;

    }

    public function supprimerPanier(): void
    {

        $panier = Panier::trouverPanierParIdSession();

        Article::supprimerPanier($panier->getId());

        header('Location:index.php?controleur=panier&action=fiche');

        exit;

    }

}







