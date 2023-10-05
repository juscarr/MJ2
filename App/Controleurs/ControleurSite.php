<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;

class ControleurSite
{

    public function __construct()
    {
    }

    public function accueil(): void
    {
        echo App::getBlade()->run("accueil"); // /ressource/vues/accueil.blade.php doit exister...
    }



}