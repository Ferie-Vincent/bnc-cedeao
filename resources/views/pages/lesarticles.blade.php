@extends('layouts.header')
@section('content')
<main id="content" class="row sbr">

    <section id=" main" class="medium-12 large-12 columns" style="color: black">

        <div class="page-title">
            <h1>Tous les articles</h1>
        </div>

        <div class="row post-list two-cols">

            @foreach($lesarticlesalaune as $item)

            <article class="medium-4 lerge-4 columns">
                <div class="post border post-alternate-1 elementFadeRun">
                    <div class="entry-media">
                        <a href="/articles/{{$item->id}}" class="image-post item-overlay ">
                            <img src="{{ asset(env('IMAGE_PATH')) }}/{{$item->image}}" alt="" width="400" height="290">
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
                            <span class="cat-links"><a href="/articles/{{$item->id}}" rel="category tag">Lire plus</a></span>
                        </div>

                        <div class="right">
                            <span class="posted-on">{{$item->date}}</span>
                        </div>

                    </footer>
                </div>
            </article>

            @endforeach


        </div>
        <!--/ #post-area-->


    </section>


</main>
@endsection
