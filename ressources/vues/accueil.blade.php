@extends('gabarit')

@section('contenu')

    <link rel="stylesheet" href="../public/liaisons/css/styles.css">
    <script defer src="../public/liaisons/js/visionneuse.js"></script>
    <!-- Importer les infos de la base de donnée en mode aléatoire (Nom / Date / Photo / Description) -->
    {{$cpt = rand(0, count($evenements))}}
    <h1 class="h1_accueil">{{ $evenements[$cpt]->getTitre() }}</h1>
    <p class="date_evenement">{{ $evenements[$cpt]->getDate() }}</p>

    <div class="image_evenement_div">
        <img class="image_evenement"
             src="../images/img_actualite_evenements/img_actualite_evenements_optim/JPEG/{{$evenements[$cpt]->getId()}}.jpg"
             alt="Image de l'evenement">
    </div>

    <h2 class="h2 h2_section1">Nouveautés</h2>
    <div class="nouveautes">
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->
        <ul class="itemCacheEnMobile">

            @foreach($livres as $livre)


                @if($livre->getDateParutionQuebec() < $aujourdhui && $livre->getDateParutionQuebec() > $nouveau)

                    <li class="item_li" hidden>
                        <div class="container-type--vignette  container-type">Nouveau</div>

                        <a class="accueil-item" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">

                        @php
                            $imagePath = "../images/img_couvert_livres/{$livre->getCategorieId()}/{$livre->getIsbnPapier()}.jpg";
                        @endphp

                        @if (file_exists($imagePath))
                            <img class="item_image" src="{{ $imagePath }}" alt="">
                        @else
                        <!-- Image de remplacement à afficher si l'image n'existe pas -->
                            <img class="item_image" src="https://placehold.co/210x340" alt="Image Placeholder">
                        @endif


                        <h3 class="h3">{{$livre->getTitre()}}</h3>
                        </a>
                        <p class="auteur">@foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                                {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                            @endforeach
                        </p>
                        <p class="categorie">{{$livre->getCategorieAssociee($livre->getCategorieId())->getNom()}}</p>
                        <p class="prix">{{$livre->getPrixCan()}}</p>
                    </li>
                @endif

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

    <h2 class="h2 h2_section2">Bande déssinnées</h2>
    <div class="prix_recu">
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->

        <ul class="itemCacheEnMobile">
            @foreach($livres as $livre)
{{--                @if($livre->getDateParutionQuebec() > $aujourdhui && $livre->getDateParutionQuebec() < $aparaitre)--}}
                @if($livre->getCategorieId() === 1)
{{--                    <div class="container-type--vignette  container-type">À paraître</div>--}}

                    <li class="item_li2" hidden>
{{--                        <div class="container-type--vignette  container-type">À paraitre</div>--}}

                        <a class="accueil-item" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">

                        @php
                            $imagePath = "../images/img_couvert_livres/{$livre->getCategorieId()}/{$livre->getIsbnPapier()}.jpg";
                        @endphp

                        @if (file_exists($imagePath))
                            <img class="item_image" src="{{ $imagePath }}" alt="">
                        @else
                        <!-- Image de remplacement à afficher si l'image n'existe pas -->
                            <img class="item_image" src="https://placehold.co/210x340" alt="Image Placeholder">
                        @endif


                        <h3 class="h3">{{$livre->getTitre()}}</h3>
                        </a>

                        <p class="auteur">@foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                                {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                            @endforeach</p>
                        <p class="categorie">{{$livre->getCategorieAssociee($livre->getCategorieId())->getNom()}}</p>
                        <p class="prix">{{$livre->getPrixCan()}}</p>
                    </li>
                @endif
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

    <h2 class="h2 h2_section3">BD Jeunesse</h2>
    <div class="livres_recommandes">

        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->

        <ul class="itemCacheEnMobile">
            @foreach($livres as $livre)
                @if($livre->getCategorieId() === 2)

                    <li class="item_li3" hidden>

                        <a class="accueil-item" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">

                        @php
                            $imagePath = "../images/img_couvert_livres/{$livre->getCategorieId()}/{$livre->getIsbnPapier()}.jpg";
                        @endphp

                        @if (file_exists($imagePath))
                            <img class="item_image" src="{{ $imagePath }}" alt="">
                        @else
                        <!-- Image de remplacement à afficher si l'image n'existe pas -->
                            <img class="item_image" src="https://placehold.co/210x340" alt="Image Placeholder">
                        @endif


                        <h3 class="h3">{{$livre->getTitre()}}</h3>
                        </a>

                        <p class="auteur">@foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                                {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                            @endforeach</p>
                        <p class="categorie">{{$livre->getCategorieAssociee($livre->getCategorieId())->getNom()}}</p>
                        <p class="prix">{{$livre->getPrixCan()}}</p>
                    </li>
                @endif
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

