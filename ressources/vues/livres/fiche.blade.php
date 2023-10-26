@extends('gabarit')

@section('contenu')
    <div>
        <h1>{{$livre->getTitre()}}</h1>
        <p id="nomAuteur">
            @foreach ($livre->getAuteurAssociee($livre->getId(), $pdo) as $livreAssocAuteur)
                {{$livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur(), $pdo)->getPrenom() . " " . $livreAssocAuteur->getAuteurAssoc($livreAssocAuteur->getIdAuteur(), $pdo)->getNom()}}
            @endforeach</p>
        <p id="age">5 ans et plus</p>
        <p id="nbPages">115 pages</p>
        <p id="prix">75$</p>
        <p>Pauvre Colette, récemment déménagée dans un nouveau quartier, sa mère lui refuse un animal de compagnie.
            Mais lorsqu’elle cherchera à se faire de nouveaux amis, ce sera grâce à une perruche… imaginaire! </p>
        <p><a href="#">Voir plus</a></p>

        <button>Ajouter au panier</button>
        <button>Ajouter aux souhaits</button>

        <h2>Format</h2>
        <button>Audio</button>
        <button>PDF</button>
        <button>Papier</button>
        <button>EWeb</button>
    </div>
    <div>
        <img src="../../../images/img_couvert_livres/4/9782897770167.jpg">
        <div class="commentaire">
            <p>Manon Massé</p>
            <p>Ce livre est le premier d’une série mettant en vedette les personnages de la bande du Mile-End.
                Chaque livre apportera de nouvelles aventures, de nouvelles couleurs et des univers propres à
                la personnalité de chacun.</p>
        </div>
    </div>

    <p id="lprecedent">Livre Précédent</p>
    <p id="lsuivant">Livre Suivant</p>

@endsection
