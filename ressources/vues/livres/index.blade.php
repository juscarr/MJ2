@extends('gabarit')

@section('contenu')

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
                    <input type="radio" id="bande-dessine" value="1" name="categorie"><label for="bande-dessine">Bande
                        dessinée</label>
                    <input type="radio" id="bande-dessine-jeunesse" value="2" name="categorie"><label
                            for="bande-dessine-jeunesse">Bande dessinée jeunesse</label>
                    <input type="radio" id="livre-illustre" value="3" name="categorie"><label for="livre-illustre">Livre
                        illustrée</label>
                    <input type="radio" id="album-jeunesse" value="4" name="categorie"><label for="album-jeunesse">Album
                        jeunesse</label>
                    <input type="radio" id="documentaire" value="5" name="categorie"><label for="documentaire">Documentaire</label>
                    <input type="radio" id="divers" value="6" name="categorie"><label for="divers">Divers</label>
                </div>

                <span class="filtre-tri">Tri</span>
                <div class="liste-tri"></div>
            </div>
            <ul class="catalogue-liste" id="catalogue-liste">

                @foreach ($livres as $livre)

                    <li class="catalogue-item">
                        <a href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">

                            <img src="">
                            <p class="item-titre">{{$livre->getTitre()}}</p>
                            <p class="item-auteur">
                                @foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                                    {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                                @endforeach
                            </p>
                            <p class="item-version">{{$livre->getStatut()}}</p>
                            <p class-="item-prix">{{$livre->getPrixCan()}}</p>
                        </a>

                    </li>
                @endforeach
            </ul>
            <div class="catalogue-pagination">

                @include('livres.fragments.pagination')

            </div>


        </div>
{{--        <script src="liaisons/js/categorie.js"></script>--}}
    </section>

@endsection