@extends('gabarit')

@section('contenu')
    <link rel="stylesheet" href="../public/liaisons/css/modules/connexion.css">
    <section class="page_creation">
   <h1>Créez un nouveau compte</h1>
    <legend>Vous avez déja un compte? <a href = "index.php?controleur=compte&action=connexion">Connectez-vous</a></legend>

        <form class="connection-form">
            <fieldset class="connection-fieldset">
                <div class="elements-container">
                    <div class="prenom">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom">
                    </div>
                    <div class="nom">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom">
                    </div>
                    <div class="courriel">
                        <label for="courriel">Courriel</label>
                        <input type="email" id="courriel" name="courriel">
                    </div>
                    <div class="mdp">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" id="mdp" name="mdp">
                    </div>
                </div>
                <div class="btn_container">
                    <button class="btn-creer_compte" type="submit">Créer un compte</button>
                </div>
            </fieldset>
        </form>
    </section>
@endsection
