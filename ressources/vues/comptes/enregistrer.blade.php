@extends('gabarit')

@section('contenu')
    <link rel="stylesheet" href="../public/liaisons/css/modules/connexion.css">
   <h1>Créez un nouveau compte</h1>
    <legend>Vous avez déja un compte? <a href = "index.php?controleur=compte&action=connexion">Connectez-vous</a></legend>

   <form class="connection-form">
       <fieldset class="connection-fieldset">
           <div class="elements-container">
               <div class="prenom">
                   <label>Prénom</label>
                   <input type="text">
               </div>
               <div class="nom">
                   <label>Nom</label>
                   <input type="text">
               </div>
               <div class="courriel">
                   <label>Courriel</label>
                   <input type="email">
               </div>
               <div class="mdp">
                   <label>Mot de passe</label>
                   <input type="password">
               </div>
           </div>
           <button>Créer un compte</button>
       </fieldset>
   </form>
@endsection
