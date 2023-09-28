<?php

// Exemple de paramètre de connexion
$serveur = 'localhost:8889';
$utilisateur = 'root';
$motDePasse = 'root';
$nomBd = 'pasteque';
$chaineDSN = "mysql:dbname=$nomBd;host=$serveur";    // Data source name

// Tentative de connexion
$pdo = new PDO($chaineDSN, $utilisateur, $motDePasse);
// Changement d'encodage des caractères UTF-8
$pdo->exec("SET NAMES utf8");
// Affectation des attributs de la connexion : Obtenir des rapports d'erreurs et d'exception avec errorInfo()
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Définir la chaine SQL
$chaineSQL = 'SELECT * FROM auteurs';
// Préparer la requête (optimisation)
$requetePreparee = $pdo->prepare($chaineSQL);
// Définir le mode de récupération
$requetePreparee->setFetchMode(PDO::FETCH_ASSOC);
// Exécuter la requête
$requetePreparee->execute();
// Récupérer le résultat
$auteurs = $requetePreparee->fetchAll();

?>


<!doctype html>
<html lang="fr">
<head>
</head>
<body>
<h1>Page index des auteurs</h1>
<?php

echo '<ul>';
foreach ($auteurs as $auteur) {
    echo '<li>' . $auteur['id'] . ',' .  $auteur['nom'] . ',' .  $auteur['prenom'] . '</li>';
}
echo '</ul>';
?>

</body>
</html>



