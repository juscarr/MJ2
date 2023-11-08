<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\FilAriane;
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

        $filAriane = FilAriane::majFilArianne();
        $nbLivres = Livre::trouverNbLivres();

        $numeroPage = (int)$_GET['page'];

        $nombreTotalPages = ceil($nbLivres / 6);

        $nombreParPage = ceil($nbLivres / $nombreTotalPages);

        $date2022 = date('Y-m-d', strtotime('-2 year'));
        $date2024 = date('Y-m-d', strtotime('+1 year'));
        $dateAujourdhui = date('Y-m-d');

        $livres = Livre::paginer($numeroPage, $nombreParPage);

        $tDonnees = array("livres" => $livres, "nbLivres" => $nbLivres, "numeroPage" => $numeroPage, "nombreTotalPages" => $nombreTotalPages, "filAriane" => $filAriane, "aujourdhui" => $dateAujourdhui, "aparaitre" => $date2024, "nouveau" => $date2022);

        echo App::getBlade()->run("livres.index", $tDonnees);

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


