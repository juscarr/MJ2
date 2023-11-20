@extends('gabarit')

@section('contenu')
    <link rel="stylesheet" href="../public/liaisons/css/modules/connexion.css">

    <h1 class="h1_connection">Connectez-vous à votre compte</h1>
    <legend>Vous n'avez pas de compte? <a href="index.php?controleur=compte&action=nouveau">Inscrivez-vous</a></legend>

    <form class="connection-form">
        <fieldset class="connection-fieldset">
            <div class="elements-container">
                <div class="courriel">
                    <label>Courriel</label>
                    <input class="email-element" type="email">
                </div>
                <div class="mdp">
                    <label>Mot de passe</label>
                    <input class="mdp-element" type="password">
                </div>
            </div>
            <button>Créer un compte</button>
        </fieldset>
    </form>
@endsection