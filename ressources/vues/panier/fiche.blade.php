@extends('gabarit')

@section('contenu')
    <h1>Fiche du panier</h1>
    <ul>

        <li><b> Id du panier : </b><i> {{ $panier->getId() }}</i><br>
        <li><b> Id de session du panier : </b><i> {{ $panier->getIdSession() }}</i><br>
        <li><b> Dernier accès au panier : </b><i> {{ $panier->getDateUnixDernierAcces() }}</i><br>
            <br>
        <li><b>Articles associés au panier:</b></li>

        @foreach($articles as $article)
            <br>
            <ul>
                <li>
                    <img src="../images/img_couvert_livres/{{$article->getLivreAssoc()->getCategorieId()}}/{{$article->getLivreAssoc()->getIsbnPapier()}}.jpg">
                </li>
                <li><b>Nom:</b>{{$article->getLivreAssoc()->getTitre()}}</li>
                <li><b>Description:</b>{{$article->getLivreAssoc()->getLeLivre()}}</li>
                <li><b>Quantité:</b>{{$article->getQuantite()}}</li>
            </ul>
            <form action="index.php?controleur=article&action=quantite&id={{$article->getLivreAssoc()->getId()}}"
                  method="POST">

                <h2>Formulaire de mise à jour de quantité :</h2>

                <br>

                <label for="quantite">Quantité :</label>
                <select id="quantite" name="quantite">

                    @for ($i = 1; $i <= 10; $i++)

                        <option value={{$i}} @if($i == $article->getQuantite()) selected @endif>{{$i}}</option>

                    @endfor
                </select>

                <br>

                <button type="submit">

                    Mettre à jour la quantité

                </button>

            </form>
            <br>
            <form action="index.php?controleur=article&action=supprimer&id={{$article->getLivreAssoc()->getId()}}"
                  method="POST">
                <button type="submit">

                    Supprimer l'article

                </button>

            </form>
            <br>
        @endforeach
    </ul>
    <form action="index.php?controleur=article&action=supprimerPanier"
          method="POST">
        <button type="submit">

            Supprimer tous les articles du panier

        </button>

    </form>
    <br>

@endsection
