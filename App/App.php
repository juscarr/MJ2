<?php
declare(strict_types=1);

namespace App;

use eftec\bladeone\BladeOne;

use \PDO;
use \PDO\PDOStatement;

use App\Controleurs\ControleurSite;
use App\Controleurs\ControleurLivre;
use App\Controleurs\ControleurAuteur;


class App
{
    private static ?PDO $pdo = null;
    private static ?BladeOne $refBlade = null;

    public function __construct()
    {
        error_reporting(E_ALL | E_STRICT);
        date_default_timezone_set('America/Montreal');
        $this->routerRequete();
    }

    public static function getPDO(): PDO
    {

        if (!App::$pdo) {

// Exemple de paramètre de connexion
            $serveur = 'localhost:8889';
            $utilisateur = 'root';
            $motDePasse = 'root';
            $nomBd = 'pasteque';
            $chaineDSN = "mysql:dbname=$nomBd;host=$serveur";    // Data source name

// Tentative de connexion
            App::$pdo = new PDO($chaineDSN, $utilisateur, $motDePasse);
// Changement d'encodage des caractères UTF-8
            App::$pdo->exec("SET NAMES utf8");
// Affectation des attributs de la connexion : Obtenir des rapports d'erreurs et d'exception avec errorInfo()
            App::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return App::$pdo;
        } else {
            return App::$pdo;
        }
    }

    public static function getBlade(): BladeOne
    {
        if (App::$refBlade === null) {
            $cheminDossierVues = '../ressources/vues';
            $cheminDossierCache = '../ressources/cache';
            App::$refBlade = new BladeOne($cheminDossierVues, $cheminDossierCache, BladeOne::MODE_AUTO);
        }
        return App::$refBlade;
    }


    public function routerRequete(): void
    {
        // Variables locales
        $nomControleur = 'site'; // Nom du controleur par défaut
        $nomAction = 'accueil'; // Nom de l'action par défaut
        $objControleur = null; // Instance du controleur

        // Si disponible, affecter le nom du controleur de la requête
        if (isset($_GET['controleur'])) {
            $nomControleur = $_GET['controleur'];
        }

        // Si disponible, affecter le nom l'action de la requête
        if (isset($_GET['action'])) {
            $nomAction = $_GET['action'];
        }

        // Instantier le bon controleur et executer la bonne action
        if ($nomControleur === 'site') {
            $objControleur = new ControleurSite();
            switch ($nomAction) {
                case 'accueil':
                    $objControleur->accueil();
                    break;
                case 'apropos':
                    $objControleur->apropos();
                    break;
                default:
                    echo 'Erreur 404 - Page introuvable.';
            }

        }

        if ($nomControleur === 'livre') {
            $objControleur = new ControleurLivre();
            switch ($nomAction) {

                case 'index':
                    $objControleur->index();
                    break;
                case 'fiche':
                    $objControleur->fiche();
                    break;
                case 'modifier':
                    $objControleur->modifier();
                    break;
                case 'creer':
                    $objControleur->creer();
                    echo 'Erreur 404 - Page introuvable.';
            }
        }

        if ($nomControleur === 'auteur') {
            $objControleur = new ControleurAuteur();
            switch ($nomAction) {

                case 'index':
                    $objControleur->index();
                    break;
                case 'fiche':
                    $objControleur->fiche();
                    break;
                case 'modifier':
                    $objControleur->modifier();
                    break;
                case 'creer':
                    $objControleur->creer();
                    break;
                default:
                    echo 'Erreur 404 - Page introuvable.';
            }
        }

    }
}