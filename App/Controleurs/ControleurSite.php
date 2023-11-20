<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Actualite;
use App\Modeles\Evenement;
use App\Modeles\Livre;

class ControleurSite
{

    public function __construct()
    {
    }

    public function accueil(): void
    {

        $actualites = Actualite::trouverTout();
        $evenements = Evenement::trouverTout();
        $livres = Livre::trouverTout();

        $date2022 = date('Y-m-d', strtotime('-4 year'));
        $date2024 = date('Y-m-d', strtotime('+1 year'));
        $aujourdhui = date('Y-m-d');

        $tDonnees = array("livres"=>$livres, "actualites"=>$actualites, "evenements"=>$evenements, "nouveau" => $date2022, "aparaitre" => $date2024, "aujourdhui" => $aujourdhui);

        echo App::getBlade()->run("accueil", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...

    }



}