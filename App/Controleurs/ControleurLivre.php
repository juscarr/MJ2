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


    public function ASC(): void
    {

    }

    public function DESC(): void
    {

    }

    public function index(): void
    {
        $numeroPage = (int)$_GET['page'];

        if (isset($_GET["categorie"]) && $_GET["categorie"] != 0) {
            var_dump($_GET["categorie"]);
            $nbLivres = Livre::trouverNbLivresParCategorie(intval($_GET["categorie"]));
            if ($nbLivres != 0) {
                $nombreTotalPages = ceil($nbLivres / 6);
                $nombreParPage = ceil($nbLivres / $nombreTotalPages);
            } else {
                $nombreTotalPages = 1;
                $nombreParPage = 1;
            }

            $livres = Livre::paginer($numeroPage, $nombreParPage, intval($_GET["categorie"]));
            $categorie = $_GET["categorie"];
        } elseif (isset($_POST["categorie"]) && $_POST["categorie"] != 0) {
            $nbLivres = Livre::trouverNbLivresParCategorie(intval($_POST["categorie"]));
            if ($nbLivres != 0) {
                $nombreTotalPages = ceil($nbLivres / 6);
                $nombreParPage = ceil($nbLivres / $nombreTotalPages);
            } else {
                $nombreTotalPages = 1;
                $nombreParPage = 1;
            }
            $livres = Livre::paginer($numeroPage, $nombreParPage, intval($_POST["categorie"]));
            $categorie = $_POST["categorie"];

        } else {
            $nbLivres = Livre::trouverNbLivres();
            if ($nbLivres != 0) {
                $nombreTotalPages = ceil($nbLivres / 6);
                $nombreParPage = ceil($nbLivres / $nombreTotalPages);
            } else {
                $nombreTotalPages = 1;
                $nombreParPage = 1;
            }
            $livres = Livre::paginer($numeroPage, $nombreParPage, 0);
            $categorie = 0;
        }


        $filAriane = FilAriane::majFilArianne();


        $date2022 = date('Y-m-d', strtotime('-3 year'));
        $date2024 = date('Y-m-d', strtotime('+1 year'));
        $dateAujourdhui = date('Y-m-d');

        $tDonnees = array("livres" => $livres, "nbLivres" => $nbLivres, "numeroPage" => $numeroPage, "nombreTotalPages" => $nombreTotalPages, "filAriane" => $filAriane, "aujourdhui" => $dateAujourdhui, "aparaitre" => $date2024, "nouveau" => $date2022, "categorie" => $categorie);

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


