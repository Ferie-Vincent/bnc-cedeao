@extends('layouts.header')
@section('content')

<main id="content" class="row sbr">

	<section id=" main" class="medium-8 large-8 columns" style="color: black">

	<div class="large-12 columns">
      <div class="page-title">
        <h1>TEXTES JURIDIQUES</h1>
      </div>
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
