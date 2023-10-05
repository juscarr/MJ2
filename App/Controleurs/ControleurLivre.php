<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Exemple\Activite;

class ControleurLivre
{

    public function __construct()
    {
    }

    public function index(): void
    {
//        $pdo = App::getPDO();
//        $activites = Activite::trouverTout($pdo);
//
//        $tDonnees = array("auteurs"=>$activites);
        echo App::getBlade()->run("livres.index"); // /ressource/vues/accueil.blade.php doit exister...

    }

    public function fiche():void {
        $pdo = App::getPDO();
        $id = (int)$_GET['id']; // Attention

        $collectionActivites = new Activite($pdo);
        $activite = Activite::trouverParId($id, $pdo);
        $villes = $collectionActivites->getVillesAssociee($id, $pdo);
        $niveau = $collectionActivites->getNiveauxAssociee($activite->getNiveauId(), $pdo);
        $categorie = $collectionActivites->getCategorieAssociee($activite->getCategorieId(), $pdo);
        $participants = $collectionActivites->getParticipantsAssociees($id, $pdo);
        $regionVille = $villes->getRegionAssociees($villes->getRegionId(), $pdo);

        $tDonnees = array("activite"=>$activite, "villes"=>$villes, "niveau"=>$niveau, "categorie"=>$categorie, "livres"=>$participants, "regionVille"=>$regionVille);
        echo App::getBlade()->run("auteurs.fiche", $tDonnees); // /ressource/vues/accueil.blade.php doit exister...


    }
}
?>


