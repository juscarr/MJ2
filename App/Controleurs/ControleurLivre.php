<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;

use App\Modeles\Livre;
class ControleurLivre
{

    public function __construct()
    {
    }

    public function index(): void
    {
        $pdo = App::getPDO();
        $livres = Livre::trouverTout($pdo);
        $tDonnees = array("livres" => $livres, "pdo"=>$pdo);
        echo App::getBlade()->run("livres.index", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...

    }

    public function fiche(): void
    {
        $id = (int)$_GET['id'];

        $livre = Livre::trouverParId($id, App::getPDO());
        $tDonnees = array("livre" => $livre);
        echo App::getBlade()->run("livres.fiche", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...



    }
}

?>


