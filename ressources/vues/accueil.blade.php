@extends('gabarit')

@section('contenu')

    <link rel="stylesheet" href="../public/liaisons/css/styles.css">
    <script defer src="../public/liaisons/js/visionneuse.js"></script>
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
        <ul class="itemCacheEnMobile">
            @foreach($livres as $livre)
                <li class="item_li" hidden>
                    <img class="item_image" src="../images/img_couvert_livres/{{$livre->getCategorieId()}}/{{$livre->getIsbnPapier()}}.jpg" alt="">
                    <h3>{{$livre->getTitre()}}</h3>
                    <p>@foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                            {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                        @endforeach</p>
                    <p>{{$livre->getCategorieAssociee($livre->getCategorieId())->getNom()}}</p>
                    <p class="prix">{{$livre->getPrixCan()}}</p>
                </li>
            @endforeach
        </ul>
        <div class="flecheVisionneuse">
            <div class="cercleGauche1">
                <div class="flecheGauche"></div>
            </div>
            <div class="cercleDroit1">
                <div class="flecheDroite"></div>
            </div>
        </div>
    </div>

    <h2 class="h2 h2_section2">Ceux qui ont reçu des prix</h2>
    <div class="prix_recu">
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->

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

        <div class="flecheVisionneuse">
            <div class="cercleGauche">
                <div class="flecheGauche"></div>
            </div>
            <div class="cercleDroit">
                <div class="flecheDroite"></div>
            </div>
        </div>
    </div>

    <h2 class="h2 h2_section3">Des livres recommandés</h2>
    <div class="livres_recommandes">

        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->

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
        <div class="flecheVisionneuse">
            <div class="cercleGauche">
                <div class="flecheGauche"></div>
            </div>
            <div class="cercleDroit">
                <div class="flecheDroite"></div>
            </div>
        </div>
    </div>


@endsection

