@extends('gabarit')

@section('contenu')
    <link rel="stylesheet" href="../public/liaisons/css/modules/connexion.css">
    <section class="page_creation">
    <h1>Créez un nouveau compte</h1>
    <legend>Vous avez déja un compte? <a href="index.php?controleur=compte&action=connexion">Connectez-vous</a></legend>

    <form class="connection-form" method="POST" action="index.php?controleur=compte&action=inserer">
        <fieldset class="connection-fieldset">
            <p><label for="prenom">Prénom</label>
                <input value="@isset($tValidation['Prenom']['valeur']) {{$tValidation['Prenom']['valeur']}} @endisset"
                       type="text"
                       name="prenom" id="prenom"
                       pattern="[a-zA-ZÀ-ÿ -]+"
                       title="Caractères alphabétiques français seulement."></p>

            <p class="erreur__message">
                @if(isset($tValidation['Prenom']) && isset($tValidation['Prenom']['valide']))
                    @if($tValidation['Prenom']['valide'])
                        <span class="spriteRETRO spriteRETRO--ok"></span>
                    @else
                        {{ $tValidation['Prenom']['message'] }}
                        <span class="spriteRETRO spriteRETRO--warning"></span>
                    @endif
                @endif
            </p>

            <!-- Nom ---------------------->
            <p><label for="nom">Nom</label>
                <input @isset($tValidation['Nom']['valeur'])
                       value="{{ $tValidation['Nom']['valeur'] }}"
                       @endisset
                       type="text"
                       name="nom" id="nom"
                       pattern="[a-zA-ZÀ-ÿ' -]+"
                       title="Caractères alphabétiques français seulement."></p>


            <p class="erreur__message">
                @if(isset($tValidation['Nom']) && isset($tValidation['Nom']['valide']))
                    @if($tValidation['Nom']['valide'])
                        <span class="spriteRETRO spriteRETRO--ok"></span>
                    @else
                        {{ $tValidation['Nom']['message'] }}
                        <span class="spriteRETRO spriteRETRO--warning"></span>
                    @endif
                @endif
            </p>

            <!-- Courriel ---------------------->
            <div class="ctnForm ctnForm--regulier">
                <p>
                    <label for="courriel">Courriel</label>
                    <input @isset($tValidation['Courriel']['valeur']) value="{{ $tValidation['Courriel']['valeur'] }}"
                           @endisset
                           type="email"
                           name="courriel"
                           id="courriel">

                </p>
                <p class="erreur__message">
                    @if(isset($tValidation['Courriel']) && isset($tValidation['Courriel']['valide']))
                        @if(!$tValidation['Courriel']['valide'])
                            {{ $tValidation['Courriel']['message'] }}
                            <span class="spriteRETRO spriteRETRO--warning"></span>
                        @else
                            <span class="spriteRETRO spriteRETRO--ok"></span>
                        @endif
                    @endif
                </p>

            </div>
            <!-- Mot de passe ---------------------->
            <div class="ctnForm ctnForm--regulier">
                <p>
                    <label for="mdp">Mot de passe</label>
                    <input @isset($tValidation['Mdp']['valeur']) value="{{ $tValidation['Mdp']['valeur'] }}"
                           @endisset
                           type="text"
                           name="mdp"
                           id="mdp">
                <ul>
                    <li>Votre mot de passe doit contenir au moin une lettre minuscule</li>
                    <li>Votre mot de passe doit contenir au moin une lettre majuscule</li>
                    <li>Votre mot de passe doit contenir au moin un chiffre</li>
                    <li>Votre mot de passe doit contenir au moin un caractère spécial</li>
                    <li>Votre mot de passe doit contenir au moin 8 caractères</li>
                </ul>
                </p>
                <p class="erreur__message">
                    @if(isset($tValidation['Mdp']) && isset($tValidation['Mdp']['valide']))
                        @if(!$tValidation['Mdp']['valide'])
                            {{ $tValidation['Mdp']['message'] }}
                            <span class="spriteRETRO spriteRETRO--warning"></span>
                        @else
                            <span class="spriteRETRO spriteRETRO--ok"></span>
                        @endif
                    @endif
                </p>

            </div>

            <button type="submit">Créer un compte</button>
        </fieldset>
    </form>
@endsection
