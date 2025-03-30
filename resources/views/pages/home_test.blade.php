@extends('layouts.header')

@section('content')

<main id="content" class="row sbr">

    <div class="section padding-off custom-grid">
        <div class="tmm_row row home-post-slider">
            <article class="medium-8 large-8 columns">
                <div class="post-type-gallery">
                    <div class="post-slider post-image">
                    @foreach($actualiteSilder as $item)
                        <div class="post-alternate-3 item post">
                            <div class="entry-media">
                                <a href="articles/{{ $item->id }}" class="image-post  item-overlay">
                                    <img src="{{ asset(env('IMAGE_PATH')) }}/{{$item->image}}" alt="">
                                </a>

                                <div class="entry-content">
                                    <header class="entry-header">
                                        <h3 class="entry-title">
                                            <a href="articles/{{ $item->id }}">
                                            {{ $item->title }}
                                            </a>
                                        </h3>
                                    </header>

                                    <footer class="entry-footer">
                                        <span class="posted-on"><a href="#">{{ $item->date }}</a></span>
                                    </footer>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </article>
            <article class="medium-4 large-4 columns">
                <div class="row post-list full-width">
                    <div class="post post-alternate-3">
                        <h3 style="text-align:center">Le Ministre</h3>
                        <hr class="hr" />
                        <div class="entry-media">
                            <a href="#" class="image-post ">
                                <img src="assets/images/kandia.jpg" alt="" width="100%" />
                            </a>
                        </div>
                        <h3 style="text-align:center;">CEDEAO</h3>
                        <div class="post post-alternate-3">
                            <p style="text-align:justify; font-size: 15px; font-style: italic; margin-bottom: 12px">
                                « La Communauté économique des États de l'Afrique de l'Ouest (CEDEAO) a été créée par
                                les Chefs d'État et de
                                Gouvernement de quinze pays d'Afrique de l'Ouest, lors de la signature le 28 mai 1975 à
                                Lagos, au Nigeria, du
                                Traité de la CEDEAO. »
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </article>

        </div>

    </div>
    <!--/ .section-->

    <section id="main" class="medium-8 large-8 columns">

        <div class="section padding-off columns medium-12 large-12 background-color-off">

            <div class="row">

                <div class="relative">
                    <h2 class="section-title">A la une</h2>

                    <div class="row post-list two-cols">
                    @foreach($alaune as $item)
                        <article class="medium-6 large-6 columns">

                            <div class="post border post-alternate-1 slideUp">

                                <div class="entry-media">

                                    <a href="#" class="image-post item-overlay ">
                                        <img src="{{ asset(env('IMAGE_PATH')) }}/{{$item->image}}" alt="" />
                                    </a>

                                    <header class="entry-header">
                                        <h3 class="entry-title"><a href="#">{!! Str::limit($item->title, 30,) !!}</a></h3>
                                    </header>

                                </div>

                                <div class="">{!! Illuminate\Support\Str::limit($item->corpsTexte, 200,'...') !!} </div>

                                <footer class="entry-footer">

                                    <div class="left">
                                        <span class="cat-links">
                                            <a href="articles/{{$item->id}}" rel="category tag">Lire plus ....</a>
                                        </span>
                                    </div>

                                    <div class="right">
                                        <span class="posted-on"><a href="#">{{$item->date}}</a></span>
                                    </div>

                                </footer>

                            </div>
                            <!--/ .post-extra-->

                        </article>
                    @endforeach


                    </div>
                    <!--/ .post-area-->

                    <span class="learn-more"> <a href="tous_les_articles/1" style="font-style: italic;">(Voir tous les articles à la
                            une)</a> </span>

                </div>

            </div>

        </div>
        <!--/ .section -->

        <div class="section padding-off columns medium-12 large-12 background-color-off"
            style="margin-top: 30px !important;">

            <div class="row">

                <div class="relative">
                    <h2 class="section-title">Plus d'infos</h2>

                    <div class="row post-list two-cols">

                    @foreach($plusInfos as $item)
                        <article class="medium-6 large-6 columns">

                            <div class="post border post-alternate-1 slideUp">

                                <div class="entry-media">

                                    <a href="#" class="image-post item-overlay ">
                                        <img src="{{ asset(env('IMAGE_PATH')) }}/{{$item->image}}" alt="" />
                                    </a>

                                    <header class="entry-header">
                                        <h3 class="entry-title"><a href="#">{{$item->title}}</a></h3>
                                    </header>

                                </div>

                                <div class="entry-content">
                                    <p>
									{!! Illuminate\Support\Str::limit($item->corpsTexte, 200,'...') !!}
                                    </p>
                                </div>

                                <footer class="entry-footer">

                                    <div class="left">
                                        <span class="cat-links">
                                            <a href="articles/{{$item->id}}" rel="category tag">Lire plus ....</a>
                                        </span>
                                    </div>

                                    <div class="right">
                                        <span class="posted-on"><a href="#">{{$item->date}}</a></span>
                                    </div>

                                </footer>

                            </div>
                            <!--/ .post-extra-->

                        </article>
                    @endforeach

                    </div>
                    <!--/ .post-area-->

                    <span class="learn-more"> <a href="tous_les_articles/2" style="font-style: italic;">(Voir tous les articles en plus
                            d'infos)</a> </span>

                </div>

            </div>

        </div>
        <!--/ .section -->

        <div class="section columns medium-12 large-12 background-color-off">
            <div class="tmm_row row">
                <div class="relative" style="margin-top: 30px !important ;">
                    <img src="assets/images/pub/ban1.jpg" alt="" width="100%">
                </div>
            </div>
        </div>

        <div class="section margin-bottom-10 columns medium-12 large-12 background-color-off">

            <div class="tmm_row row">

                <div class="relative" style="margin-top: 50px !important ;">

                    <h2 class="section-title">
                        Avis de publication
                    </h2>

                    <div class="row post-list full-width">

                    @foreach($avispublication as $item)

                        <article class="medium-12 large-12 columns">

                            <div class="post border post-classic elementFadeRun">

                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="">
                                            {{ $item->titre }}
                                        </a></h3>
                                </header>

                                <div class="entry-content">

                                    <p>
                                        <span>CONTENU </span> :
                                        {!! Str::limit($item->contenu, 200,) !!}

                                    </p>
                                    <p>
                                        <span>FICHIERS RATTACHÉS</span> : <a href="" title="Cliquez pour télécharger">
                                            <img src="assets/images/icon/pdf.png" alt="" width="5%">
                                        </a>
                                    </p>
                                </div>

                            </div>
                            <!--/ .post-extra-->

                        </article>

                    @endforeach

                    </div>

                    <span style="font-size:15px"> <a href="/les_avis_publications">(Voir tous les avis de publications)</a> </span>

                </div>

            </div>

        </div>

        <div class="section columns medium-12 large-12 background-color-off">
            <div class="tmm_row row">
                <div class="relative" style="margin-top: 30px !important ;">
                    <img src="assets/images/pub/ban-1.gif" alt="" width="100%">
                </div>
            </div>
        </div>

        <div class="section margin-bottom-10 columns medium-12 large-12 background-color-off">

            <div class="tmm_row row">

                <div class="relative" style="margin-top: 50px !important ;">

                    <h2 class="section-title">
                        Appel d'offres
                    </h2>

                    <div class="row post-list full-width">
                    @foreach($appelOffres as $item)
                        <article class="medium-12 large-12 columns">
                            <div class="post border post-classic elementFadeRun">

                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="">
                                            {{ $item->titre }}
                                        </a></h3>
                                </header>

                                <div class="entry-content">

                                    <p>
                                        <span>CONTENU </span> :
                                        {!! Str::limit($item->contenu, 200,) !!}

                                    </p>
                                    <p>
                                        <span>FICHIERS RATTACHÉS</span> : <a href="" title="Cliquez pour télécharger">
                                            <img src="assets/images/icon/pdf.png" alt="" width="5%">
                                        </a>
                                    </p>
                                </div>

                            </div>
                            <!--/ .post-extra-->

                        </article>

                        @endforeach

                    </div>

                    <span style="font-size:15px"> <a href="/les_appels_offres">(Voir tous les appels d'offres)</a> </span>

                </div>

            </div>

        </div>

    </section>



    @include ('layouts.sidebar');

</main>
@endsection

