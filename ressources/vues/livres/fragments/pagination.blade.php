

<!-- Si on est pas sur la première page et s'il y a plus d'une page -->
@if ($numeroPage > 0)
    <a href= "{{ 'index.php?controleur=livre&action=index' . "&page=1"  }}">Premier</a>
@else
    <span style="color:#999">Premier</span> <!-- Bouton premier inactif -->
@endif

&nbsp;|&nbsp;

@if ($numeroPage > 0)
    <a href="{{ 'index.php?controleur=livre&action=index' . "&page=" . ($numeroPage - 1) }}">Précédent</a>
@else
    <span style="color:#999">Précédent</span><!-- Bouton précédent inactif -->
@endif

&nbsp;|&nbsp;

<!-- Statut de progression: page 9 de 99 -->
{{"Page " . ($numeroPage) . " de " . ($nombreTotalPages)}}

&nbsp;|&nbsp;

<!-- Si on est pas sur la dernière page et s'il y a plus d'une page -->
@if ($numeroPage < $nombreTotalPages)
    <a href="{{ 'index.php?controleur=livre&action=index' . "&page=" . ($numeroPage + 1)  }}">Suivant</a>
@else
    <span style="color:#999">Suivant</span><!-- Bouton suivant inactif -->
@endif

&nbsp;|&nbsp;

@if ($numeroPage < $nombreTotalPages)
    <a href="{{ 'index.php?controleur=livre&action=index' . "&page=" . ($nombreTotalPages)}}">Dernier</a>
@else
    <span style="color:#999">Dernier</span><!-- Bouton dernier inactif -->
@endif





