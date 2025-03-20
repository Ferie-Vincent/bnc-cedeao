@extends('layouts.header')
@section('content')
<main id="content" class="row sbr">

    <section id=" main" class="medium-8 large-8 columns" style="color: black">

        <section class="section margin-top-off">

            <div class="page-title" style="text-align:center">
                <h1>BUREAU NATIONAL CEDEAO -CÔTE D'IVOIRE</h1> <br>
            </div>
            @foreach($services as $service)
            <div class="information">
                <h2>{{ $service->service }}</h2>

                <div class="information">
                    <b>Ce Service a pour mission</b>
                    <br>
                    <p>
                    {!! $service->contenu !!}
                    </p>
                </div>
            </div>

            <br>
            <div class="divider-1"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            @endforeach



            <!-- <div class="information">
                <h2>Contact</h2>
                <ul>
                    <li style="color:black">Adresse : Immeuble ELNASR rue du commerce en face de l'agence MOOV au dessus de l'agence MTN</li>
                    <li style="color:black">Contact : 20-24-25-75 / 20-24-25-72</li>
                    <li style="color:black">Site web: en construction</li>
                    </br>
                </ul>
            </div> -->

        </section>
    </section>

    @include ('layouts.sidebar');
</main>
@endsection
