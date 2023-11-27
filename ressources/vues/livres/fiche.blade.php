@extends('gabarit')

@section('contenu')
    <div class="intro">
        <h1>{{$livre->getTitre()}}</h1>
        <h2><p id="nomAuteur" class="auteur">
                @foreach ($livre->getAuteurAssociee($livre->getId()) as $livreAssocAuteur)
                    {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur())->getNom()}}
                @endforeach</p></h2>
        <p><strong>{{$livre->getPrixCan()}} </strong>{{$livre->getPagination()}} pages</p>
        <p><strong>{{$livre->getAgeMin()}} ans et plus</strong></p>
    </div>
    <div class="article">
        <img class="couvert_livre" src="images/colette.jpg">
        <div class="boutons">
            <button class="btn_principal">Ajouter au panier</button>
            <button class="btn_secondaire">Ajouter aux souhaits</button>
        </div>
    </div>
    <div class="description" id="descriptionContenu">
        <p>{!! $livre->getLeLivre() !!}</p>
        <a class="voir_plus" href="javascript:void(0);" onclick="afficherDescription()">Voir plus</a>
    </div>
    <div class="boutons-large_container">
        <div class="boutons-large">
            <button class="btn_principal">Ajouter au panier</button>
            <button class="btn_secondaire">Ajouter aux souhaits</button>
        </div>
    </div>

    <h3>Format</h3>
    <div class="formats">
        <button class="un-format space">Audio</button>
        <button class="un-format">PDF</button>
        <button class="un-format space">Papier</button>
        <button class="un-format">EWeb</button>
    </div>



    <div class="livre-suivant-precedent">
        <a class="precedent" href="">Livre précédent</a>
        <a class="suivant" href="">Livre suivant</a>
    </div>

    <script>
        function afficherDescription() {
            var descriptionContenu = document.getElementById("descriptionContenu");
            var voirPlusLink = document.querySelector(".voir_plus");

            // Si la description est actuellement tronquée, alors afficher tout
            if (descriptionContenu.classList.contains("tronquee")) {
                descriptionContenu.classList.remove("tronquee");
                voirPlusLink.innerHTML = "Voir moins";
            } else {
                // Sinon, tronquer la description et ajouter "Voir plus"
                descriptionContenu.classList.add("tronquee");
                voirPlusLink.innerHTML = "Voir plus";
            }
        }
    </script>
@endsection
