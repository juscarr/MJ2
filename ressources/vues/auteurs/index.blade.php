@extends('gabarit')

@section('contenu')

    <section class="catalogue-main">

        <div class="content">
            <div class="fil-arianne"> @foreach($filAriane as $lien)
                    @if(isset($lien["lien"]))
                        <a class="fil-arianne--lien" href="{{$lien["lien"]}}">{{$lien["titre"]}}</a>
                        <span> | </span>
                    @else
                        <p class="fil-arianne--titre">{{$lien["titre"]}}</p>
                    @endif
                @endforeach
            </div>
            <h1>Artistes</h1>
            <div class="catalogue">
                <div class="catalogue-filtre">
                    <div class="filtre-disposition">

                        <input checked="checked" type="radio" id="disposition-gauche" name="disposition" class="radio"
                               value="Simple">
                        <label class="toggle toggle-left toggle-double" for="disposition-gauche">
                            Vignette
                        </label>

                        <input type="radio" id="disposition-droite" name="disposition" class="radio" value="Mensuel">
                        <label class="toggle toggle-right toggle-double toggle-disabled" for="disposition-droite"
                               id="label-disposition">
                            Liste
                        </label>

                    </div>
                    <input type="search" class="catalogue-search" placeholder="Titre, Auteur, ISBN...">
                </div>
                <ul class="catalogue-liste " id="catalogue-liste">
                    @foreach ($auteurs as $auteur)
                        <li class="catalogue-item--auteur">
                            <a class="catalogue-item"
                               href="index.php?controleur=auteur&action=fiche&id={{$auteur->getId()}}">

                                <div class="container-item--img">
                                    <img class="item-img"
                                         src="../images/photos-auteur/auteurs_optim/optim_{{strtoupper($auteur->getPrenom())}}-{{strtoupper($auteur->getNom())}}_CreditAlexBeausoleil.jpg">
                                </div>
                                <p class="item-titre">{{$auteur->getPrenomNom()}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="catalogue-pagination">

            @include('auteurs.fragments.pagination')

        </div>
        <script>let images = document.querySelectorAll("img")
            images.forEach((image) => {
                    image.onerror = function () {
                        image.src = "https://placehold.co/240x320";
                    };
                }
            )
            console.log(images);

        </script>

        </div>
        <script src="liaisons/js/categorie.js"></script>
        <script src="liaisons/js/dropdown.js"></script>
        <script src="liaisons/js/catalogue.js"></script>
    </section>

@endsection