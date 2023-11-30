@extends('gabarit')

@section('contenu')
    <script defer src="liaisons/js/panier.js"></script>

    <div class="section1" id="section1">
        <h2 class="h2_livraisonPanier">Adresse de livraison</h2>

        <div class="rectangle">
            <div class="etape1" id="etape1_section1"></div>
            <div class="etape2" id="etape2_section1"></div>
            <div class="etape3" id="etape3_section1"></div>
        </div>

        <div class="cadre">
            <div class="livraisonPanier">


                <label class="label_champTexte label_prenom" for="prenom">Prénom :</label>
                <input type="text" class="champTexte prenom" id="prenom" name="prenom">

                <label class="label_champTexte label_nom" for="nom">Nom :</label>
                <input type="text" class="champTexte nom" id="nom" name="nom">


                <label class="label_champTexte label_adresse" for="adresse">Adresse :</label>
                <input type="text" class="champTexte adresse" id="adresse" name="adresse">

                <label class="label_champTexte label_province" for="province">Province :</label>
                <select name="province" id="province" class="champTexte province">
                    <option value="">Choisissez une province</option>
                    <option value="1">Québec</option>
                    <option value="2">Ontario</option>
                    <option value="3">Nouvelle Écosse</option>
                    <option value="4">Nouveau-Brunswick</option>
                    <option value="5">Manitoba</option>
                    <option value="6">Colombie-Britannique</option>
                    <option value="7">L'île-du-Prince-Édouard</option>
                    <option value="8">Saskatchewan</option>
                    <option value="9">Terre-Neuve-et-Labrador</option>
                    <option value="10">Yukon</option>
                    <option value="11">Les territoires de Nord-Ouest</option>
                    <option value="12">Nunavut</option>
                </select>

                <label class="label_champTexte label_ville" for="ville">Ville :</label>
                <input type="text" class="champTexte ville" id="ville" name="ville">

                <label class="label_champTexte label_codePostal" for="codePostal">Code postal :</label>
                <input type="text" class="champTexte codePostal" id="codePostal" name="codePostal">

                <div class="checkbox">
                    <input type="checkbox" id="memeAdresse">
                    <label for="memeAdresse">Utilisé l'adresse de livraison comme adresse de facturation</label>
                </div>

                <button class="btn_principal_livraisonPanier--section1" id="btn_principal_livraisonPanier--section1">
                    Poursuivre
                </button>
                <a class="retourLivre--section1" href="">Retour aux livres</a>
            </div>
        </div>
    </div>

    {{-- ------------------------------------------------------------------------------------------------------------   --}}

    <div class="section2" id="section2" style="display: none">
        <h2 class="h2_livraisonPanier">Adresse de facturation</h2>

        <div class="rectangle">
            <div class="etape1" id="etape1_section2"></div>
            <div class="etape2" id="etape2_section2"></div>
            <div class="etape3" id="etape3_section2"></div>
        </div>

        <div class="cadre">
            <div class="livraisonPanier">


                <label class="label_champTexte label_prenom" for="prenom">Prénom :</label>
                <input type="text" class="champTexte prenom" id="prenom" name="prenom">

                <label class="label_champTexte label_nom" for="nom">Nom :</label>
                <input type="text" class="champTexte nom" id="nom" name="nom">


                <label class="label_champTexte label_adresse" for="adresse">Adresse :</label>
                <input type="text" class="champTexte adresse" id="adresse" name="adresse">

                <label class="label_champTexte label_province" for="province">Province :</label>
                <select name="province" id="province" class="champTexte province">
                    <option value="">Choisissez une province</option>
                    <option value="1">Québec</option>
                    <option value="2">Ontario</option>
                    <option value="3">Nouvelle Écosse</option>
                    <option value="4">Nouveau-Brunswick</option>
                    <option value="5">Manitoba</option>
                    <option value="6">Colombie-Britannique</option>
                    <option value="7">L'île-du-Prince-Édouard</option>
                    <option value="8">Saskatchewan</option>
                    <option value="9">Terre-Neuve-et-Labrador</option>
                    <option value="10">Yukon</option>
                    <option value="11">Les territoires de Nord-Ouest</option>
                    <option value="12">Nunavut</option>
                </select>

                <label class="label_champTexte label_ville" for="ville">Ville :</label>
                <input type="text" class="champTexte ville" id="ville" name="ville">

                <label class="label_champTexte label_codePostal" for="codePostal">Code postal :</label>
                <input type="text" class="champTexte codePostal" id="codePostal" name="codePostal">

                <div class="ligne-horizontale"></div>

                <h3 class="h3">Paiement</h3>


                <button class="btn_principal_livraisonPanier--section2" id="btn_principal_livraisonPanier--section2">Poursuivre</button>
                <a class="retourLivre--section2" href="">Retour aux livres</a>
            </div>
        </div>
    </div>

    {{-- ------------------------------------------------------------------------------------------------------------   --}}

    <div class="section3" id="section3" style="display: none">
        <h2 class="h2_livraisonPanier">Résumé de la transaction</h2>

        <div class="rectangle">
            <div class="etape1" id="etape1_section3"></div>
            <div class="etape2" id="etape2_section3"></div>
            <div class="etape3" id="etape3_section3"></div>
        </div>

        <div class="cadre">
            <div class="livraisonPanier">


                <label class="label_champTexte label_prenom" for="prenom">Prénom :</label>


                <label class="label_champTexte label_nom" for="nom">Nom :</label>



                <label class="label_champTexte label_adresse" for="adresse">Adresse :</label>


                <label class="label_champTexte label_province" for="province">Province :</label>


                <label class="label_champTexte label_ville" for="ville">Ville :</label>


                <label class="label_champTexte label_codePostal" for="codePostal">Code postal :</label>



                <button class="btn_principal_livraisonPanier--section2">Poursuivre</button>
                <a class="retourLivre--section2" href="">Retour aux livres</a>
            </div>
        </div>
    </div>
@endsection