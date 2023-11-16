<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Panier;
use App\Modeles\Article;

class ControleurPanier
{

    public function __construct()
    {

    }

    public function fiche(): void
    {

        $panier = Panier::trouverPanierParIdSession();

        $articles = Article::trouverArticlesParIdPanier($panier->getId());

        $tDonnees = array("articles" => $articles, "panier" => $panier);
        echo App::getBlade()->run("panier.fiche", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...
    }


}

?>


