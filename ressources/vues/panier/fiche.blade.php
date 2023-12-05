@extends('gabarit')

@section('contenu')

    <h1 class="panier-titre">Votre panier</h1>

    {{--    <ul class="catalogue-liste" id="catalogue-liste">--}}
    {{--        @foreach ($article->getLivreAssoc()s as $article->getLivreAssoc())--}}
    {{--            <li>--}}
    {{--                @if($article->getLivreAssoc()->getDateParutionQuebec() < $aujourdhui && $article->getLivreAssoc()->getDateParutionQuebec() > $nouveau)--}}
    {{--                    <div class="container-type--vignette container-type">Nouveau</div>--}}
    {{--                @elseif($article->getLivreAssoc()->getDateParutionQuebec() > $aujourdhui && $article->getLivreAssoc()->getDateParutionQuebec() < $aparaitre)--}}
    {{--                    <div class="container-type--vignette  container-type">À paraître</div>--}}
    {{--                @endif--}}
    {{--                <a class="catalogue-item"--}}
    {{--                   href="index.php?controleur=livre&action=fiche&id={{$article->getLivreAssoc()->getId()}}">--}}

    {{--                    <div class="container-item--img">--}}
    {{--                        <img class="item-img"--}}
    {{--                             src="../images/img_couvert_livres/{{$article->getLivreAssoc()->getCategorieId()}}/{{$article->getLivreAssoc()->getIsbnPapier()}}.jpg">--}}
    {{--                    </div>--}}
    {{--                    <p class="item-titre">{{$article->getLivreAssoc()->getTitre()}}</p>--}}
    {{--                </a>--}}
    {{--                <p class="item-auteur">--}}

    {{--                    @foreach ($article->getLivreAssoc()->getAuteurAssociee($article->getLivreAssoc()->getId()) as $article->getLivreAssoc()AssocAuteur)--}}
    {{--                        <a href="index.php?controleur=auteur&action=fiche&id={{$article->getLivreAssoc()AssocAuteur->getAuteurAssoc($article->getLivreAssoc()AssocAuteur->getIdAuteur())->getId()}}">--}}
    {{--                            {{$article->getLivreAssoc()AssocAuteur->getAuteurAssoc($article->getLivreAssoc()AssocAuteur->getIdAuteur())->getPrenom() . " " . $article->getLivreAssoc()AssocAuteur->getAuteurAssoc($article->getLivreAssoc()AssocAuteur->getIdAuteur())->getNom()}}--}}
    {{--                        </a>--}}
    {{--                    @endforeach--}}

    {{--                </p>--}}
    {{--                <p class="item-categorie">{{$article->getLivreAssoc()->getCategorieAssociee()->getNom()}}</p>--}}

    {{--                <p class="item-prix">{{$article->getLivreAssoc()->getPrixCan()}}$</p>--}}

    {{--            </li>--}}
    {{--        @endforeach--}}
    {{--        <script>let images = document.querySelectorAll("img")--}}
    {{--            images.forEach((image) => {--}}
    {{--                    image.onerror = function () {--}}
    {{--                        image.src = "https://placehold.co/240x320";--}}
    {{--                    };--}}
    {{--                }--}}
    {{--            )--}}
    {{--            console.log(images);--}}

    {{--        </script>--}}
    {{--    </ul>--}}

    <ul class="panier-list">
        <span class="panier-separation"></span>
        @foreach($articles as $article)
            <li class="panier-item">

                <img class="panier-image"
                     src="../images/img_couvert_livres/{{$article->getLivreAssoc()->getCategorieId()}}/{{$article->getLivreAssoc()->getIsbnPapier()}}.jpg">

                <p class="panier-titre">{{$article->getLivreAssoc()->getTitre()}}</p>
                <div class="panier-prix">{{$article->getLivreAssoc()->getPrixCan()}}$</div>

                <form class="panier-quantite"
                      action="index.php?controleur=article&action=quantite&id={{$article->getLivreAssoc()->getId()}}"
                      method="POST">
                    <select id="quantite" name="quantite" class="quantite">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value={{$i}} @if($i == $article->getQuantite()) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                </form>
                <div hidden
                     class="panier-prixtotal">{{intval($article->getLivreAssoc()->getPrixCan()) * $article->getQuantite()}}</div>
                <form action="index.php?controleur=article&action=supprimer&id={{$article->getLivreAssoc()->getId()}}"
                      method="POST">
                    <button type="submit" class="panier-bouton">
                        Supprimer l'article
                    </button>
                </form>
            </li>
            <span class="panier-separation"></span>

        @endforeach
        <form action="index.php?controleur=article&action=supprimerPanier"
              method="POST" class="panier-supprimerTous">
            <button type="submit" class="panier-bouton">
                Supprimer tous
            </button>
        </form>

        <div class="panier-total"></div>
        <div class="panier-livraison"><b>Le délai de livraison est de 10 jours</b></div>
        <div class="panier-lien">
            <a href="index.php?controleur=site&action=livraisonPanier" class="panier-bouton--lien">Confirmer</a>

            {{--            <a href="index.php?controleur=panier&action=paiement" class="panier-bouton--lien">Confirmer</a>--}}
        </div>
        <script>
            let prixtotal = document.querySelectorAll(".panier-prixtotal");
            let total = 0
            prixtotal.forEach(prix => {
                total = total + parseInt(prix.innerHTML);
            });
            document.querySelector('.panier-total').innerHTML = "Votre total: " + total + "$";

            //Form quantite

            let formQuantite = document.querySelectorAll(".panier-quantite");
            formQuantite.forEach(forQuantite => {


                forQuantite.children[0].addEventListener("change", () => {
                    forQuantite.submit();
                })
            })

        </script>

    </ul>

@endsection
