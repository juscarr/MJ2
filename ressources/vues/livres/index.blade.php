@extends('gabarit')

@section('contenu')
    <script defer src="liaisons/js/categorie.js"></script>
    <section class="catalogue-main">
        <div class="catalogue-entete">
            <h1>Catalogue</h1>
            <div><p><a>Accueil</a>/ Catalogue</p></div>
        </div>
        <div class="content">
            <div class="catalogue-filtre">
                <div class="filtre-disposition">
                    <label for="disposition-gauche">Vignette</label>
                    <input id="disposition-gauche" type="radio" class="input input-radio--double">
                    <label for="disposition-droite">Liste</label>
                    <input id="disposition-droite" type="radio" class="input input-radio--double">
                </div>
                <input type="search">
                <a>Réinitialiser les filtres</a>
                <h2>Filtre</h2>
                <span class="filtre-categorie">Catégories</span>
                <div class="liste-deroulante">
                    <input type="checkbox" id="">
                </div>

                <span class="filtre-tri">Tri</span>
                <div class="liste-tri"></div>
            </div>
            <ul class="catalogue-liste">
                @foreach ($livres as $livre)

                    <li class="catalogue-item">
                        <a href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">

                            <img src="">
                            <p class="item-titre">{{$livre->getTitre()}}</p>
                            <p class="item-auteur">
                                @foreach ($livre->getAuteurAssociee($livre->getId(), $pdo) as $livreAssocAuteur)
                                    {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur(), $pdo)->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur(), $pdo)->getNom()}}
                                @endforeach
                            </p>
                            <p class="item-version">{{$livre->getStatut()}}</p>
                            <p class-="item-prix">{{$livre->getPrixCan()}}</p>
                        </a>

                    </li>
                @endforeach
            </ul>
            <div class="catalogue-pagination">

                <!--- Navigation inter-page--->

            </div>


        </div>

    </section>

@endsection