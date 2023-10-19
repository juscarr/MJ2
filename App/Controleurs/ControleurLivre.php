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

//    public function categorie(): void
//    {
//        $categorie = $_GET["categorie"];
//
//        if ($categorie === "tous") {
//            $livres = Livre::trouverTout();
//        } else {
//            $livres = Livre::trouverParCategorieId($categorie);
//        }
//        echo json_encode($livres);
//    }

    public function index(): void
    {
        $livres = Livre::trouverTout();
        $tDonnees = array("livres" => $livres);
        echo App::getBlade()->run("livres.index", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...

    }

    public function fiche(): void
    {
        $id = (int)$_GET['id'];

        $livre = Livre::trouverParId($id);
        $tDonnees = array("livre" => $livre);
        echo App::getBlade()->run("livres.fiche", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...


    }
}

?>


