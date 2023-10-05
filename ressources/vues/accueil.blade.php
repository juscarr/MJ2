@extends('gabarit')

@section('contenu')
    <!-- Importer les infos de la base de donnée en mode aléatoire (Nom / Date / Photo / Description) -->
    <h1>Un nouveau balado</h1>
    <p>14/09/2020</p>

    <div class="nouveautes">
        <h2>Nouveautés</h2>
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->
        <ul>
            <li>
                <img src="" alt="">
                <h3>Jamais contents !</h3>
                <p>Amsallem Baptiste</p>
                <p>Albums jeunesse</p>
                <p>16.95$</p>
            </li>
            <li>
                <img src="" alt="">
                <h3>Fourchon</h3>
                <p>Arsenault Isabelle</p>
                <p>Albums jeunesse</p>
                <p>16.95$</p>
            </li>
            <li>
                <img src="" alt="">
                <h3>Alpha</h3>
                <p>Arsenault Isabelle</p>
                <p>Albums jeunesse</p>
                <p>18.95$</p>
            </li>
        </ul>
    </div>

    <div class="prix_recu">
        <h2>Ceux qui ont reçu des prix</h2>
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->
        <ul>
            <li>
                <img src="" alt="">
                <h3>La quête d'Albert</h3>
                <p>Arsenault Isabelle</p>
                <p>BD jeunesse</p>
                <p>18.95$</p>
            </li>
            <li>
                <img src="" alt="">
                <h3>Mon coeur Pédale</h3>
                <p>Leduc Émilie</p>
                <p>BD jeunesse</p>
                <p>27.95$</p>
            </li>
            <li>
                <img src="" alt="">
                <h3>Le facteur de l'espace</h3>
                <p>Perreault Guillaume</p>
                <p>BD jeunesse</p>
                <p>21.95$</p>
            </li>
        </ul>
    </div>

    <div class="livres_recommandes">
        <h2>Des livres recommandés</h2>
        <!-- Importer les infos de la base de donnée en mode aléatoire (Titre de livre / Nom auteur / Catégorie / Prix en cad) -->
        <ul>
            <li>
                <img src="" alt="">
                <h3>Opération Frankenstein</h3>
                <p>Solis Fermin</p>
                <p>Albums jeunesse</p>
                <p>9.95$</p>
            </li>
            <li>
                <img src="" alt="">
                <h3>Mauvaise herbe</h3>
                <p>Rassat Thibaut</p>
                <p>Albums jeunesse</p>
                <p>21.95$</p>
            </li>
            <li>
                <img src="" alt="">
                <h3>Tom la tondeuse</h3>
                <p>PA Sophie</p>
                <p>Albums jeunesse</p>
                <p>18.95$</p>
            </li>
        </ul>
    </div>


@endsection

