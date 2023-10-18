<?php
declare(strict_types=1);
require_once('../../vendor/autoload.php');

use App\App;

header("Content-type: application/json; charset=utf-8");
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Pragma: no-cache");
$msgErreur = null;


$categorie = $_GET['categories'];

if ($categorie) {
    $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1';
    $requetePreparee = App::getPDO()->prepare($chaineSQL);
    $requetePreparee->bindParam(':idCategorie1', $categorie, PDO::PARAM_INT);

} else {
    $chaineSQL = 'SELECT * FROM livres';
    $requetePreparee = App::getPDO()->prepare($chaineSQL);
}
$requetePreparee->setFetchMode(PDO::FETCH_OBJ);
//    $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
$requetePreparee->execute();

if ($requetePreparee->rowCount() == 0)
    $msgErreur = "Le id du chandail n'existe pas.";
else {
    $tabLivres[] = $tabLivres = $requetePreparee->fetchAll();
    echo json_encode($tabLivres);
    // le tableau envoyé ressemble à ["bleu","rose","noir"]
    // ceci nous évite d'avoir à écrire un objet JSON comme ci-dessous:
    /*
    echo "{\n";
        echo "\t\"coul1\": \"$coul1\",\n";
        echo "\t\"coul2\": \"$coul2\",\n";
        echo "\t\"coul3\": \"$coul3\"\n";
    echo "}\n";
    */
}
$requetePreparee->closeCursor();

if ($msgErreur != null) {
    echo "{\n";
    echo "\t\"erreur\":\n";
    echo "\t{\n";
    echo "\t\t\"message\": \"" . str_replace("\"", "\\\"", $msgErreur) . "\"\n";
    echo "\t}\n";
    echo "}\n";
}








