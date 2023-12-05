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

    public function categorie(): void
    {
        $categorie = $_GET["categorie"];

        if ($categorie === "tous") {
            $livres = Livre::trouverTout();
        } else {
            $livres = Livre::trouverParCategorieId($categorie);
        }
        echo json_encode($livres);
    }

    public function index(): void
    {
        $numeroPage = (int)$_GET['page'];


        // Regarde si il y a une catégorie + une page

        if (isset($_GET["categorie"]) && $_GET["categorie"] != 0) {

            // Si oui, regarde le nombre de livre pour cette catégorie

            $categorie = $_GET["categorie"];

            $nbLivres = Livre::trouverNbLivresParCategorie(intval($categorie));

            // Si il n'y a qu'une seul page de livre, on affiche la page #1, aussi non on affiche les autres pages
            if ($nbLivres != 0) {
                $nombreTotalPages = ceil($nbLivres / 6);
                $nombreParPage = ceil($nbLivres / $nombreTotalPages);
            } else {
                $nombreTotalPages = 1;
                $nombreParPage = 1;
            }

            //Aussi non, si il y a une catégorie seulement
        } elseif (isset($_POST["categorie"]) && $_POST["categorie"] != 0) {

            $categorie = $_POST["categorie"];

            $nbLivres = Livre::trouverNbLivresParCategorie(intval($categorie));

            if ($nbLivres != 0) {
                $nombreTotalPages = ceil($nbLivres / 6);
                $nombreParPage = ceil($nbLivres / $nombreTotalPages);
            } else {
                $nombreTotalPages = 1;
                $nombreParPage = 1;
            }


        } else {
            $categorie = "0";

            $nbLivres = Livre::trouverNbLivres();
            if ($nbLivres != 0) {
                $nombreTotalPages = ceil($nbLivres / 6);
                $nombreParPage = ceil($nbLivres / $nombreTotalPages);
            } else {
                $nombreTotalPages = 1;
                $nombreParPage = 1;
            }

        }

        //Si il y a un tri avec la pagination ou juste le filtre, on ajoute le type de filtre dans la requète SQL en plus de
        if (isset($_GET["tri"]) || isset($_POST["tri"])) {
            if (isset($_POST["tri"])) {
                $tri = $_POST["tri"];
                $livres = Livre::paginer($numeroPage, $nombreParPage, intval($categorie), $tri);
            }
            if (isset($_GET["tri"])) {
                $tri = $_GET["tri"];
                $livres = Livre::paginer($numeroPage, $nombreParPage, intval($categorie), $tri);
            }
        } else {
            $tri = "ASC";
            $livres = Livre::paginer($numeroPage, $nombreParPage, intval($categorie), $tri);
        }

        $filAriane = FilAriane::majFilArianne();

        $date2022 = date('Y-m-d', strtotime('-3 year'));
        $date2024 = date('Y-m-d', strtotime('+1 year'));
        $dateAujourdhui = date('Y-m-d');

        $tDonnees = array("livres" => $livres, "nbLivres" => $nbLivres, "numeroPage" => $numeroPage, "nombreTotalPages" => $nombreTotalPages, "filAriane" => $filAriane, "aujourdhui" => $dateAujourdhui, "aparaitre" => $date2024, "nouveau" => $date2022, "categorie" => $categorie, "tri" => $tri);


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


