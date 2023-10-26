@extends('gabarit')

@section('contenu')

    <link rel="stylesheet" href="../public/liaisons/css/styles.css">
    <!-- Importer les infos de la base de donnée en mode aléatoire (Nom / Date / Photo / Description) -->
    {{$cpt = rand(0, count($evenements))}}
    <h1>{{$evenements[$cpt]->getTitre()}}</h1>
    <p class="date_evenement">{{$evenements[$cpt]->getDate()}}</p>


    <div class="image_evenement_div">
        <img class="image_evenement" src="https://placehold.co/300x215" alt="Image de l'evenement">
    </div>

    <h2 class="h2 h2_section1">Nouveautés</h2>
    <div class="nouveautes">
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->
        <div class="cercle">
            <div class="flecheGauche"></div>
        </div>
        <ul>
            <li class="item_li">
                <img class="item_image" src="https://placehold.co/210x340" alt="">
                <h3>{{$livres[1]->getTitre()}}</h3>
                <p>@foreach ($livres[1]->getAuteurAssociee($livres[1]->getId()) as $livreAssocAuteur)
                        {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                    @endforeach</p>
                <p>{{$livres[1]->getCategorieAssociee($livres[1]->getCategorieId())->getNom()}}</p>
                <p class="prix">{{$livres[1]->getPrixCan()}}</p>
            </li>
            <li class="item_li">
                <img class="item_image" src="https://placehold.co/210x340" alt="">
                <h3>Fourchon</h3>
                <p>Arsenault Isabelle</p>
                <p>Albums jeunesse</p>
                <p class="prix">16.95$</p>
            </li>
            <li class="item_li">
                <img class="item_image" src="https://placehold.co/210x340" alt="">
                <h3>Alpha</h3>
                <p>Arsenault Isabelle</p>
                <p>Albums jeunesse</p>
                <p class="prix">18.95$</p>
            </li>
        </ul>
        <div class="cercle">
            <div class="flecheDroite"></div>
        </div>
    </div>

    <h2 class="h2 h2_section2">Ceux qui ont reçu des prix</h2>
    <div class="prix_recu">
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->
        <div class="cercle">
            <div class="flecheGauche"></div>
        </div>
        <ul>
            <li class="item_li">
                <img class="item_image" src="https://placehold.co/210x340" alt="">
                <h3>La quête d'Albert</h3>
                <p>Arsenault Isabelle</p>
                <p>BD jeunesse</p>
                <p class="prix">18.95$</p>
            </li>
            <li class="item_li">
                <img class="item_image" src="https://placehold.co/210x340" alt="">
                <h3>Mon coeur Pédale</h3>
                <p>Leduc Émilie</p>
                <p>BD jeunesse</p>
                <p class="prix">27.95$</p>
            </li>
            <li class="item_li">
                <img class="item_image" src="https://placehold.co/210x340" alt="">
                <h3>Le facteur de l'espace</h3>
                <p>Perreault Guillaume</p>
                <p>BD jeunesse</p>
                <p class="prix">21.95$</p>
            </li>
        </ul>
        <div class="cercle">
            <div class="flecheDroite"></div>
        </div>
    </div>

    <h2 class="h2 h2_section3">Des livres recommandés</h2>
    <div class="livres_recommandes">

        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->
        <div class="cercle">
            <div class="flecheGauche"></div>
        </div>
        <ul>
            <li class="item_li">
                <img class="item_image" src="https://placehold.co/210x340" alt="">
                <h3>Opération Frankenstein</h3>
                <p>Solis Fermin</p>
                <p>Albums jeunesse</p>
                <p class="prix">9.95$</p>
            </li>
            <li class="item_li">
                <img class="item_image" src="https://placehold.co/210x340" alt="">
                <h3>Mauvaise herbe</h3>
                <p>Rassat Thibaut</p>
                <p>Albums jeunesse</p>
                <p class="prix">21.95$</p>
            </li>
            <li class="item_li">
                <img class="item_image" src="https://placehold.co/210x340" alt="">
                <h3>Tom la tondeuse</h3>
                <p>PA Sophie</p>
                <p>Albums jeunesse</p>
                <p class="prix">18.95$</p>
            </li>
        </ul>
        <div class="cercle">
            <div class="flecheDroite"></div>
        </div>
    </div>


@endsection

