<?php
public function trouverParCategorie(array $idCategorie, $pdo): array
{
    $nbrCategorie = count($idCategorie);
    if ($nbrCategorie == 1) {
        $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1';
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
    } elseif ($nbrCategorie == 2) {
        $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2';
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
    } elseif ($nbrCategorie == 3) {
        $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2 AND categorie_id=:idCategorie3';
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie3', $idCategorie[2], PDO::PARAM_INT);
    } elseif ($nbrCategorie == 4) {
        $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2 AND categorie_id=:idCategorie3 AND categorie_id=:idCategorie4';
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie3', $idCategorie[2], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie4', $idCategorie[3], PDO::PARAM_INT);
    } elseif ($nbrCategorie == 5) {
        $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2 AND categorie_id=:idCategorie3 AND categorie_id=:idCategorie4 AND categorie_id=:idCategorie5';
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie3', $idCategorie[2], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie4', $idCategorie[3], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie5', $idCategorie[4], PDO::PARAM_INT);
    } elseif ($nbrCategorie == 6) {
        $chaineSQL = 'SELECT * FROM livres WHERE categorie_id=:idCategorie1 AND categorie_id=:idCategorie2 AND categorie_id=:idCategorie3 AND categorie_id=:idCategorie4 AND categorie_id=:idCategorie5 AND categorie_id=:idCategorie6';
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->bindParam(':idCategorie1', $idCategorie[0], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie2', $idCategorie[1], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie3', $idCategorie[2], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie4', $idCategorie[3], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie5', $idCategorie[4], PDO::PARAM_INT);
        $requetePreparee->bindParam(':idCategorie6', $idCategorie[5], PDO::PARAM_INT);
    }

    // Définir le mode de récupération
    $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
    // Exécuter la requête
    $requetePreparee->execute();
    // Récupérer le résultat
    $livres = $requetePreparee->fetchAll();

    return $livres;
}
?>