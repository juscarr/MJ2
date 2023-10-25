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

        $tDonnees = array("livres"=>$livres, "actualites"=>$actualites, "evenements"=>$evenements);

        echo App::getBlade()->run("accueil", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...

    }



}