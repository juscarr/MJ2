@extends('gabarit')

@section('contenu')

    <div class="intro">
        <h1>{{$livre->getTitre()}}</h1>
        <h2><p id="nomAuteur" class="auteur">
                @foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                    {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                @endforeach</p></h2>
        <p><strong>{{$livre->getPrixCan()}} </strong>|| {{$livre->getPagination()}} pages</p>
        <p><strong>{{$livre->getAgeMin()}} ans et plus</strong></p>
    </div>
    {{$livre->getId()}}

    <div class="article">
        @php
            $imagePath = "../images/img_couvert_livres/{$livre->getCategorieId()}/{$livre->getIsbnPapier()}.jpg";
        @endphp

        @if (file_exists($imagePath))
            <img class="couvert_livre" src="{{ $imagePath }}" alt="">
        @else
        <!-- Image de remplacement à afficher si l'image n'existe pas -->
            <img class="item_image" src="https://placehold.co/210x340" alt="Image Placeholder">
        @endif
        <div class="boutons">
            <form action="index.php?controleur=article&action=ajouter&id={{$livre->getId()}}" method="POST">
                <button class="btn_principal" id="btn_principal" type="submit">Ajouter au panier</button>
            </form>
            <button class="btn_secondaire">Ajouter aux souhaits</button>
        </div>

    </div>
    <div class="description" id="descriptionContenu">
        <p>{!!$livre->getLeLivre()!!}</p>
        <a class="voir_plus" href="#" onclick="afficherDescription()">Voir plus</a>
    </div>
    <div class="boutons-large_container">
        <div class="boutons-large">

            <button class="btn_principal" id="btn_principal2">Ajouter au panier</button>

            <input id="idLivre" value="{{$livre->getId()}}" hidden>

            <button class="btn_secondaire" id="btn_secondaire">Ajouter aux souhaits</button>
            <div class="container_quantite">
                <label for="quantite">Quantite : </label>
                <input class="input_quantite" id="quantite" name="quantite" type="number">
            </div>
            <legend>Choisir la quantité</legend>
            <div class="quantite_container">
                <button type="button" title="Down" class="sub">Down</button>
                <input type="number" name="quantity" pattern="[0-9]+">
                <button type="button" title="Up" class="add">Up</button>
            </div>
        </div>
    </div>

    <h3>Format</h3>
    <div class="formats">
        <button class="un-format space">Audio</button>
        <button class="un-format">PDF</button>
        <button class="un-format space">Papier</button>
        <button class="un-format">EWeb</button>
    </div>

    <div class="commentaires">
        <h4>Commentaires</h4>
        <p><strong>Manon Massé</strong></p>
        <p>Ce livre est le premier d’une série mettant en vedette les personnages de la bande du Mile-End.
            Chaque livre apportera de nouvelles aventures, de nouvelles couleurs et des univers propres à
            la personnalité de chacun.</p>
    </div>


    <div class="livre-suivant-precedent">
        <a class="precedent" href="">Livre précédent</a>
        <a class="suivant" href="">Livre suivant</a>
    </div>
    <script defer src="liaisons/js/panier.js"></script>

    <script defer src="public/liaisons/js/panier.js">
        // Si la description est actuellement tronquée, alors afficher tout
        if (descriptionContenu.classList.contains("tronquee")) {
            descriptionContenu.classList.remove("tronquee");
            voirPlusLink.innerHTML = "Voir plus";
        } else {
            // Sinon, tronquer la description et ajouter "Voir plus"
            descriptionContenu.classList.add("tronquee");
            voirPlusLink.innerHTML = "Voir moins";
        }

    </script>
@endsection
