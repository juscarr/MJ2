<?php
declare(strict_types=1);

namespace App;

use App\Modeles\Livre;

class FilAriane
{

    /**
     * Constructeur de la classe. Ne reçoit aucun paramètre. Instancié au besoin (classe statique)
     */
    public function __construct()
    {
    }

    /**
     * Fonction retrouvant le fil d'Ariane en fonction de l'URL de navigation.
     * Ex.: index.php?controleur=livre&action=fiche&isbn=2-921114-48-8
     *
     * Utilisations :
     * Ajout dans une classe:
     *
     * use App\FilAriane;
     * ...
     * $filAriane=FilAriane::majFilArianne();
     *
     *
     * Affichage:
     * foreach($filAriane as $lien)
     *  if(isset($lien["lien"]))
     *      <a href="$lien["lien"]">$lien["titre"]</a>
     *  else
     *      $lien["titre"]}
 *      endif
     *  <span> | </span>
     * endforeach
     *
     *
     * Retourne une tableau associatif de liens et titre de liens.
     * @return array
     */
    public static function majFilArianne(): array{
        //Tableau de retour des liens du fil d'Ariane
        $fil=array();

        //Si le contrôleur est défini, on a déjà naviguer quelque part
        if(isset($_GET["controleur"])){

            //Si le contrôleur n'est pas celui du site, nous sommes au deuxième niveau
            if($_GET["controleur"] !== 'site') {

                switch(true){

                    //Si l'action est d'afficher une liste de livres
                    case  $_GET["action"] === 'index' :

                        //On crée un lien de retour vers l'accueil
                        $lien0=array("titre"=>"Accueil","lien"=>"index.php?controleur=site&action=accueil");

                        //@todo adapter cet algo pour les catégories...

                        //Est-ce qu'on affiche les nouveauté ou non?
                        //Afficher la fin du fil, sans lien
                        if(isset($_GET["nouveau"])){
                            $lien1=array("titre"=>"Nouveautés");
                        }else{
                            $lien1=array("titre"=>"Livres");
                        }

                        //Prépare le tableau de liens de retour
                        $fil[0] = $lien0;
                        $fil[1] = $lien1;
                        break;

                    //Si l'action est d'afficher une fiche de livre
                    case  $_GET["action"] === 'fiche' :

                        //Lien de retour vers l'accueil
                        $lien0=array("titre"=>"Accueil","lien"=>"index.php?controleur=site&action=accueil");

                        //@todo adapter cet algo pour les catégories...

                        //Lien vers la liste des pages se qualifiant (catégorie, nouveauté...)
                        if(isset($_GET["nouveau"])){
                            $lien1=array("titre"=>"Nouveautés","lien"=>"index.php?controleur=livre&action=index&nouveau=".$_GET["nouveau"]);
                        }else{
                            $lien1=array("titre"=>"Livres","lien"=>"index.php?controleur=livre&action=index");
                        }

                        //Prépare le tableau de liens de retour
                        $fil[0] = $lien0;
                        $fil[1] = $lien1;

                        //Si un livre particuler est sélectionné par isbn
                        //Afficher la fin du fil, sans lien
                        //Pourrait aussi être fait par ID
                        if(isset($_GET["id"])) {
                            $livre = Livre::trouverParId($_GET["id"]);
                            $fil[2]=array("titre"=>$livre->getTitre());
                        }
                        break;
                }
            }
        }
        return $fil;
    }

    // Getter / Setter (magique)
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}