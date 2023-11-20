@extends('gabarit')

@section('contenu')

    <section class="catalogue-main">

        <div class="content">
            <div class="fil-arianne"> @foreach($filAriane as $lien)
                    @if(isset($lien["lien"]))
                        <a href="{{$lien["lien"]}}">{{$lien["titre"]}}</a>
                    @else
                        {{$lien["titre"]}}
                    @endif
                    <span> | </span>
                @endforeach
            </div>
            <h1>Catalogue</h1>
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
                    <a href="">Réinitialiser les filtres</a>
                    <input type="search" class="catalogue-search" placeholder="Titre, Auteur, ISBN...">
                    <h2>Filtre</h2>
                    <h3>Tri</h3>
                    <form id="form-categorie" method="POST"
                          action="index.php?controleur=livre&action=index&page=1">
                        <div class="custom-select" id="tri-select">
                            <button type="button" class="select-button" id="tri-button"
                                    role="combobox"
                                    aria-labelledby="select button"
                                    aria-haspopup="listbox"
                                    aria-expanded="false"
                                    aria-controls="select-dropdown">
                                <span class="selected-value">Le plus récent</span>
                                <i class="fa-solid fa-arrow-right arrow"></i>

                            </button>

                            <ul class="select-dropdown display-none" role="listbox" id="tri-list">
                                <li role="option">
                                    <input type="radio" id="recent" name="tri" value="DESC"
                                           @if($tri === "DESC")  checked @endif/>
                                    <label for="recent">Le plus récent</label>
                                </li>
                                <li role="option">
                                    <input type="radio" id="ancien" value="ASC" name="tri"
                                           @if($tri === "ASC") checked @endif/>
                                    <label for="ancien">Le plus ancien</label>
                                </li>

                            </ul>
                        </div>
                        <h3>Catégorie</h3>
                        <div class="custom-select" id="categorie-select">
                            <button type="button" class="select-button" id="categorie-button"
                                    role="combobox"
                                    aria-labelledby="select button"
                                    aria-haspopup="listbox"
                                    aria-expanded="false"
                                    aria-controls="select-dropdown">
                                <span class="selected-value">Tous</span>
                                <i class="fa-solid fa-arrow-right arrow"></i>

                            </button>

                            <ul class="select-dropdown display-none" role="listbox" id="categorie-list">
                                <li role="option">
                                    <input type="radio" id="0" value="0" name="categorie"
                                           @if($categorie == 0) checked @endif/>
                                    <label for="0">Tous</label>
                                </li>
                                <li role="option">
                                    <input type="radio" id="1" value="1" name="categorie"
                                           @if($categorie == 1) checked @endif/>
                                    <label for="1">Bande dessinée</label>
                                </li>
                                <li role="option">
                                    <input type="radio" id="2" value="2" name="categorie"
                                           @if($categorie == 2) checked @endif/>
                                    <label for="2">Bande dessinée jeunesse</label>
                                </li>
                                <li role="option">
                                    <input type="radio" id="3" value="3" name="categorie"
                                           @if($categorie == 3) checked @endif/>
                                    <label for="3">Livre illustré</label>
                                </li>
                                <li role="option">
                                    <input type="radio" id="4" value="4" name="categorie"
                                           @if($categorie == 4) checked @endif/>
                                    <label for="4">Album jeunesse</label>
                                </li>
                                <li role="option">
                                    <input type="radio" id="5" value="5" name="categorie"
                                           @if($categorie == 5) checked @endif/>
                                    <label for="5">Documentaire</label>
                                </li>
                                <li role="option">
                                    <input type="radio" id="6" value="6" name="categorie"
                                           @if($categorie == 6) checked @endif/>
                                    <label for="6">Divers</label>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <ul class="catalogue-liste" id="catalogue-liste">
                    @foreach ($livres as $livre)
                        <li>
                            @if($livre->getDateParutionQuebec() < $aujourdhui && $livre->getDateParutionQuebec() > $nouveau)
                                <div class="container-type--vignette container-type">Nouveau</div>
                            @elseif($livre->getDateParutionQuebec() > $aujourdhui && $livre->getDateParutionQuebec() < $aparaitre)
                                <div class="container-type--vignette  container-type">À paraître</div>
                            @endif
                            <a class="catalogue-item"
                               href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">

                                <div class="container-item--img">
                                    <img class="item-img"
                                         src="../images/img_couvert_livres/{{$livre->getCategorieId()}}/{{$livre->getIsbnPapier()}}.jpg">
                                </div>
                                <p class="item-titre">{{$livre->getTitre()}}</p>
                            </a>
                            <p class="item-auteur">

                                @foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                                    <a href="index.php?controleur=auteur&action=fiche&id={{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getId()}}">
                                        {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                                    </a>
                                @endforeach

                            </p>
                            <p class="item-categorie">{{$livre->getCategorieAssociee()->getNom()}}</p>

                            <p class="item-prix">{{$livre->getPrixCan()}}$</p>

                        </li>
                    @endforeach
                    <script>let images = document.querySelectorAll("img")
                        images.forEach((image) => {
                                image.onerror = function () {
                                    image.src = "https://placehold.co/240x320";
                                };
                            }
                        )
                        console.log(images);

                    </script>
                </ul>
            </div>
        </div>

        <div class="catalogue-pagination">

            @include('livres.fragments.pagination')

        </div>


        </div>
        <script src="liaisons/js/categorie.js"></script>
        <script src="liaisons/js/dropdown.js"></script>
        <script src="liaisons/js/catalogue.js"></script>
    </section>

@endsection