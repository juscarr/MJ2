<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\FilAriane;
use App\Modeles\Auteur;


class ControleurAuteur
{

    public function __construct()
    {
    }

    public function index(): void
    {
        $numeroPage = (int)$_GET['page'];

        $nbAuteurs = Auteur::trouverNbAuteurs();
        if ($nbAuteurs != 0) {
            $nombreTotalPages = ceil($nbAuteurs / 6);
            $nombreParPage = ceil($nbAuteurs / $nombreTotalPages);
        } else {
            $nombreTotalPages = 1;
            $nombreParPage = 1;
        }

        $auteurs = Auteur::paginer($numeroPage, $nombreParPage);

        $filAriane = FilAriane::majFilArianne();

        $tDonnees = array("auteurs" => $auteurs, "nbAuteurs" => $nbAuteurs, "numeroPage" => $numeroPage, "nombreTotalPages" => $nombreTotalPages, "filAriane" => $filAriane);

        echo App::getBlade()->run("auteurs.index", $tDonnees);


    }

    public function fiche(): void
    {

        $pdo = App::getPDO();

        $id = (int)$_GET['id']; // Attention

        $collectionParticipants = new Participant($pdo);
        $collectionActivites = new Activite($pdo);
        $participant = Participant::trouverParId($id, $pdo);
        $ville = $participant->getVilleAssociee($participant->getVilleId(), $pdo);
        /* Information a propos de l'activite */
        $idActivite = $participant->getActiviteId();
        $activite = Activite::trouverParId($idActivite, $pdo);


        $categorieActivite = $activite->getCategorieAssociee($activite->getCategorieId(), $pdo);
        $niveauActivite = $activite->getNiveauxAssociee($activite->getNiveauId(), $pdo);
        $villeActivite = $activite->getVillesAssociee($activite->getVilleId(), $pdo);
        $regionVille = $ville->getRegionAssociees($villeActivite->getRegionId(), $pdo);


        $tDonnees = array("participant" => $participant, "ville" => $ville, "activite" => $activite, "idActivite" => $idActivite, "categorieActivite" => $categorieActivite, "niveauActivite" => $niveauActivite,
            "regionVille" => $regionVille, "villeActivite" => $villeActivite);

        echo App::getBlade()->run("livres.fiche", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...

    }
}

?>


