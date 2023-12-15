@extends('gabarit')

@section('contenu')

    <h1 class="panier-titre">Votre panier</h1>

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
