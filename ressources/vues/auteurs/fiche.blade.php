@extends('gabarit')

@section('contenu')
    <div class="intro">
        <h1>L'Oiseau de Colette</h1>
        <h2><a class="auteur" href="">Isabelle Arsenault</a></h2>
    </div>
    <p><strong>75$</strong>115 pages</p>
    <p><strong>5 ans et plus</strong></p>
    <div class="article">
        <img class="couvert_livre" src="images/colette.jpg">
        <div class="boutons">
            <button class="btn_principal">Ajouter au panier</button>
            <button class="btn_secondaire">Ajouter aux souhaits</button>
        </div>
    </div>
    <p>Dans ce conte féerique captivant, l'héroïne, Colette, est une petite
        fille tout à fait ordinaire qui découvre un jour un mystérieux œuf dans son jardin.
        Convaincue qu'il s'agit d'un œuf de dinosaure, elle décide de l'incuber en
        utilisant des méthodes totalement farfelues, comme chanter... <a class="voir_plus" href="">Voir plus</a></p>

    <h3>Format</h3>
    <div class="formats">
        <button class="un-format space">Audio</button>
        <button class="un-format">PDF</button>
        <button class="un-format space">Papier</button>
        <button class="un-format">EWeb</button>
    </div>

    <h4>Commentaires</h4>
    <p><strong>Manon Massé</strong></p>
    <p>Ce livre est le premier d’une série mettant en vedette les personnages de la bande du Mile-End.
        Chaque livre apportera de nouvelles aventures, de nouvelles couleurs et des univers propres à
        la personnalité de chacun.</p>

    <div class="livre-suivant-precedent">
        <a class="precedent" href="">Livre précédent</a>
        <a class="suivant" href="">Livre suivant</a>
    </div>

@endsection

