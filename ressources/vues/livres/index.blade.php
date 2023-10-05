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
                <div class="liste-deroulante"></div>

                <span class="filtre-tri">Tri</span>
                <div class="liste-tri"></div>
            </div>
            <div class="catalogue-liste">

                <div class="catalogue-item">

                    <img src="">
                    <p class="item-titre"></p>
                    <p class="item-auteur"></p>
                    <p class="item-version"></p>
                    <p class-="item-prix"></p>

                </div>

                <div class="catalogue-pagination">

                    <!--- Navigation inter-page--->

                </div>

            </div>

        </div>

    </section>

@endsection