@extends('layouts.header')
@section('content')
<main id="content" class="row sbr">
    <section id=" main" class="medium-8 large-8 columns" style="color: black">
        <div class="section padding-off">
            <h2>Projets relatif au BNC-CI</h2>
            <ul class="accordion">
                @foreach($projets as $projet)
                <li class="accordion-navigation">
                    <a href="#" class="acc-trigger" data-mode="">{{ $projet['titre'] }} </a>
                    <div class="content">
                        <img src="{{ asset(env('IMAGE_PATH')) }}/{{$projet['image'] }}" alt="" style="height: auto;">
                        <br><br>
                        {!! $projet['texte'] !!}
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="clear"></div>
            <div class="divider-2"></div>
        </div>
    </section>
    @include ('layouts.sidebar');
</main>
@endsection
