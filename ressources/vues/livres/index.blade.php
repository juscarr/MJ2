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
                    <div class="custom-select" id="tri-select">
                        <button class="select-button" id="tri-button"
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
                                <input type="radio" id="recent" name="tri" checked/>
                                <label for="recent">Le plus récent</label>
                            </li>
                            <li role="option">
                                <input type="radio" id="ancien" name="tri"/>
                                <label for="ancien">Le plus ancien</label>
                            </li>

                        </ul>
                    </div>
                    <h3>Catégorie</h3>
                    <div class="custom-select" id="categorie-select">
                        <button class="select-button" id="categorie-button"
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
                                <input type="radio" id="0" name="categorie" checked/>
                                <label for="0">Tous</label>
                            </li>
                            <li role="option">
                                <input type="radio" id="1" name="categorie"/>
                                <label for="1">Bande dessinée</label>
                            </li>
                            <li role="option">
                                <input type="radio" id="2" name="categorie"/>
                                <label for="2">Bande dessinée jeunesse</label>
                            </li>
                            <li role="option">
                                <input type="radio" id="3" name="categorie"/>
                                <label for="3">Livre illustré</label>
                            </li>
                            <li role="option">
                                <input type="radio" id="4" name="categorie"/>
                                <label for="4">Album jeunesse</label>
                            </li>
                            <li role="option">
                                <input type="radio" id="5" name="categorie"/>
                                <label for="5">Documentaire</label>
                            </li>
                            <li role="option">
                                <input type="radio" id="6" name="categorie"/>
                                <label for="6">Divers</label>
                            </li>
                        </ul>
                    </div>
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
                                    {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                                @endforeach
                            </p>
                            <p class="item-categorie">{{$livre->getCategorieAssociee()->getNom()}}</p>

                            <p class="item-prix">{{$livre->getPrixCan()}}$</p>

                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="catalogue-pagination">

                @include('livres.fragments.pagination')

            </div>


        </div>
        {{--        <script src="liaisons/js/categorie.js"></script>--}}
        <script src="liaisons/js/dropdown.js"></script>
        <script src="liaisons/js/catalogue.js"></script>
    </section>

@endsection