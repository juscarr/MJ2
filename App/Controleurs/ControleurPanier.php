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

        $date2022 = date('Y-m-d', strtotime('-3 year'));
        $date2024 = date('Y-m-d', strtotime('+1 year'));
        $dateAujourdhui = date('Y-m-d');

        $tDonnees = array("articles" => $articles, "panier" => $panier, "nouveau" => $date2022, "aujourdhui" => $dateAujourdhui, "aparaitre" => $date2024);
        echo App::getBlade()->run("panier.fiche", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...
    }


}

?>


