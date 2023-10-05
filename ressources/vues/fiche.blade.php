@extends('gabarit');

@section('contenu');

<div>

    <section>
        @yield('gauche')
    </section>

    <section>
        @yield('droite')

    </section>


</div>

@yield('auteur')

@endsection
