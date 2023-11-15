<div class="catalogue-pagination">
    @if ($numeroPage > 1)
        <a class="pagination-interaction" href="{{ 'index.php?controleur=livre&action=index' . "&page=" . ($numeroPage - 1) . "&categorie=" . $categorie . "&tri=" . $tri}}">
            <div class="cercle catalogue-cercle">
                <div class="flecheGauche catalogue-fleche"></div>
            </div>
        </a>
        <a class="pagination-interaction" href='index.php?controleur=livre&action=index&page=1&categorie={{$categorie . "&tri=" . $tri}}'>1</a>
        <p>|</p>
    @else
        <div class="cercle catalogue-cercle">
            <div class="flecheGauche catalogue-fleche"></div>
        </div>
    @endif


    <p class="catalogue-page">{{$numeroPage}}</p>

    @if ($numeroPage < $nombreTotalPages)
        <p>|</p>
        <a class="pagination-interaction" href={{ 'index.php?controleur=livre&action=index' . "&page=" . ($nombreTotalPages) . "&categorie=" . $categorie . "&tri=" . $tri}} >{{$nombreTotalPages}}</a>

        <a class="pagination-interaction" href="{{ 'index.php?controleur=livre&action=index' . "&page=" . ($numeroPage + 1) . "&categorie=" . $categorie . "&tri=" . $tri }}">
            <div class="cercle catalogue-cercle">
                <div class="flecheDroite catalogue-fleche"></div>
            </div>
        </a>

    @else
        <div class="cercle catalogue-cercle">
            <div class="flecheDroite catalogue-fleche"></div>
        </div>
    @endif
</div>

