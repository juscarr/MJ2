<div class="catalogue-pagination">
    @if ($numeroPage > 1)
        <a class="pagination-interaction"
           href="{{ 'index.php?controleur=auteur&action=index' . "&page=" . ($numeroPage - 1)}}">
            <div class="cercle catalogue-cercle">
                <div class="flecheGauche catalogue-fleche"></div>
            </div>
        </a>
        <a class="pagination-interaction" href='index.php?controleur=auteur&action=index&page=1'>1</a>
        <p>|</p>
    @else
        <div class="cercle catalogue-cercle">
            <div class="flecheGauche catalogue-fleche"></div>
        </div>
    @endif

    <p class="catalogue-page">{{$numeroPage}}</p>

    @if ($numeroPage < $nombreTotalPages)
        <p>|</p>
        <a class="pagination-interaction"
           href={{ 'index.php?controleur=auteur&action=index' . "&page=" . ($nombreTotalPages)}} >{{$nombreTotalPages}}</a>

        <a class="pagination-interaction"
           href="{{ 'index.php?controleur=auteur&action=index' . "&page=" . ($numeroPage + 1)}}">
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

