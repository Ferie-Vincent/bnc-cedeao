@extends('layouts.header')
@section('content')

<main id="content" class="row sbr">

	<section id=" main" class="medium-8 large-8 columns" style="color: black">

	<div class="large-12 columns">
      <div class="page-title">
        <h1>Traités</h1>
      </div>
    </div>

    <div class="">
      <p>
        Le traité de la Communauté économique des États de l’Afrique de l’Ouest (CEDEAO) est un accord multilatéral signé par les États membres qui formaient la Communauté économique des États de l’Afrique de l’Ouest. Le traité initial a été signé par les chefs d’État et de gouvernement des 16 États membres de l’époque en 1975 à Lagos, au Nigeria. Avec les nouveaux développements et mandats de la Communauté, un traité révisé a été signé à Cotonou, en République du Bénin, en juillet 1993 par les chefs d’État et de gouvernement des 15 États membres actuels.
      </p>
    </div>

    <h2>
      <strong style="color:#f47d1f">Téléchargements</strong>
    </h2>

    <ul>
      @foreach($documents as $document)
      <li class="mb-4">
        <h2>
          <a href="{{ $document['fichier'] }}">
            <img src="assets/images/articles/pdf.png" alt="" width="2%">
            {{ $document['titre'] }}
          </a>
        </h2>
      </li>
      @endforeach

    </ul>



	</section>

    @include ('layouts.sidebar');

</main>


@endsection
