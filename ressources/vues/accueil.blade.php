@extends('gabarit')

@section('contenu')

    <link rel="stylesheet" href="../public/liaisons/css/styles.css">
    <script defer src="../public/liaisons/js/visionneuse.js"></script>
    <!-- Importer les infos de la base de donnée en mode aléatoire (Nom / Date / Photo / Description) -->
    {{$cpt = rand(0, count($evenements))}}
    <h1 class="h1_accueil">{{$evenements[$cpt]->getTitre()}}</h1>
    <p class="date_evenement">{{$evenements[$cpt]->getDate()}}</p>


    <div class="image_evenement_div">
        <img class="image_evenement" src="" alt="Image de l'evenement">
    </div>

    <h2 class="h2 h2_section1">Nouveautés</h2>
    <div class="nouveautes">
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->
        <ul class="itemCacheEnMobile">

            @foreach($livres as $livre)
                <li class="item_li" hidden>
                    <img class="item_image" src="../images/img_couvert_livres/{{$livre->getCategorieId()}}/{{$livre->getIsbnPapier()}}.jpg" alt="">
                    <h3 class="h3">{{$livre->getTitre()}}</h3>
                    <p class="auteur">@foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                            {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                        @endforeach
                    </p>
                    <p class="categorie">{{$livre->getCategorieAssociee($livre->getCategorieId())->getNom()}}</p>
                    <p class="prix">{{$livre->getPrixCan()}}</p>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="flecheVisionneuse">
        <div class="cercleGauche1">
            <div class="flecheGauche"></div>
        </div>
        <div class="cercleDroit1">
            <div class="flecheDroite"></div>
        </div>
    </div>

    <h2 class="h2 h2_section2">Ceux qui ont reçu des prix</h2>
    <div class="prix_recu">
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->

        <ul class="itemCacheEnMobile">
            @foreach($livres as $livre)
                <li class="item_li2" hidden>
                    <img class="item_image" src="../images/img_couvert_livres/{{$livre->getCategorieId()}}/{{$livre->getIsbnPapier()}}.jpg" alt="">
                    <h3 class="h3">{{$livre->getTitre()}}</h3>
                    <p class="auteur">@foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                            {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                        @endforeach</p>
                    <p class="categorie">{{$livre->getCategorieAssociee($livre->getCategorieId())->getNom()}}</p>
                    <p class="prix">{{$livre->getPrixCan()}}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="flecheVisionneuse">
        <div class="cercleGauche2">
            <div class="flecheGauche"></div>
        </div>
        <div class="cercleDroit2">
            <div class="flecheDroite"></div>
        </div>
    </div>

    <h2 class="h2 h2_section3">Des livres recommandés</h2>
    <div class="livres_recommandes">

        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->

        <ul class="itemCacheEnMobile">
            @foreach($livres as $livre)
                <li class="item_li3" hidden>
                    <img class="item_image" src="../images/img_couvert_livres/{{$livre->getCategorieId()}}/{{$livre->getIsbnPapier()}}.jpg" alt="">
                    <h3 class="h3">{{$livre->getTitre()}}</h3>
                    <p class="auteur">@foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                            {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                        @endforeach</p>
                    <p class="categorie">{{$livre->getCategorieAssociee($livre->getCategorieId())->getNom()}}</p>
                    <p class="prix">{{$livre->getPrixCan()}}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="flecheVisionneuse">
        <div class="cercleGauche3">
            <div class="flecheGauche"></div>
        </div>
        <div class="cercleDroit3">
            <div class="flecheDroite"></div>
        </div>
    </div>


@endsection

