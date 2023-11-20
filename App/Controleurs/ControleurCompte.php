<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\FilAriane;
use App\Modeles\Auteur;


class ControleurCompte
{

    public function __construct()
    {
    }

    public function connexion(): void
    {
        echo App::getBlade()->run("comptes.identifier");
    }

    public function nouveau(): void
    {
        echo App::getBlade()->run("comptes.enregistrer");
    }
}

?>


