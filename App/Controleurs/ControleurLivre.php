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

        $nbLivres = Livre::trouverNbLivres();

        $numeroPage = (int)$_GET['page'];

        $nombreTotalPages = ceil($nbLivres / 6);


        $nombreParPage = ceil($nbLivres / $nombreTotalPages);


        $livres = Livre::paginer($numeroPage, $nombreParPage);

        $tDonnees = array("livres" => $livres, "nbLivres" => $nbLivres, "numeroPage" => $numeroPage, "nombreTotalPages" => $nombreTotalPages);

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


