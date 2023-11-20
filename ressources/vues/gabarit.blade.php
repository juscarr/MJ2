<!DOCTTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../public/liaisons/css/styles.css">
        <script defer src="liaisons/js/main.js"></script>
        <title>La Pastèque | Technique d'intégration multimédia - Cégep de Sainte-Foy</title>
        <meta name="description" content="Voici un exemple de description" />
        <meta name="keywords" content="Livres, vente, auteurs, site web, design, nouveautes, a paraitre, bande dessinnee, jeunesse, comedie, pasteque, fruit" />
        <link rel="icon" type="image/x-icon" href="../images/logo_LaPasteque/icons/favicon.ico">
    </head>
    <body class="body">
        <header role="banner">
            @include('fragments.entete')
        </header>

        <main>
            @yield('contenu')
        </main>

        <footer role="contentinfo">
            @include('fragments.pieddepage')
        </footer>
    </body>
</html>




