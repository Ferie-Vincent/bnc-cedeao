@extends('layouts.header')
@section('content')
<main id="content" class="row sbr">

    <section id=" main" class="medium-12 large-12 columns" style="color: black">


        <div class="page-title">
            <h1>Avis de publication</h1>
        </div>

        <div class="section margin-bottom-10 columns medium-12 large-12 background-color-off">

            <div class="tmm_row row">

                <div class="relative" style="margin-top: 10px !important ;">

                    <div class="row post-list full-width">
                        @foreach($tousAvispublication as $item)

                        <article class="medium-12 large-12 columns">

                            <div class="post border post-classic elementFadeRun">

                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="">
                                            Avis de publication
                                        </a></h3>
                                </header>

                                <div class="entry-content">
                                    <p>
                                        TITRE : {{ $item->titre }}.
                                    </p>
                                    <p>
                                        CONTENU : {{ $item->contenu }}.
                                    </p>
                                    <p>
                                    <div class="right">
                                        <span class="cat-links">
                                            <a href="{{ asset(env('IMAGE_PATH')) }}/{{$item->fichierPDF }}" download="{{$item->fichierPDF }}" rel="category tag">
                                                <img src="assets/images/icon/pdf.png"  alt="" width="5%">
                                                Télécharger le fichier...
                                            </a>
                                        </span>
                                    </div>
                                    </p>
                                </div>

                                <footer class="entry-footer">

                                    <div class="left">
                                        <span class="posted-on"><a href="#">10.02.2022</a></span>
                                    </div>

                                </footer>
                            </div>
                            <!--/ .post-extra-->

                        </article>

                        @endforeach


                    </div>

                </div>

            </div>

        </div>

    </section>

</main>
@endsection
