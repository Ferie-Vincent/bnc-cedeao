@extends('layouts.header')
@section('content')

<main id="content" class="row">

    <div class="large-12 columns">
        <div class="page-title">
            <h1 style="color: black"><i>SOMMAIRE</i></h1>
            <br>
            <div style="margin-left: 50px">
                <ol style="font-size: 20px">
                    <a href="#presidente">
                        <li>
                           La Directrice, Responsable du Bureau National CEDEAO - CI
                        </li>
                    </a>
                    <a href="#historique">
                        <li>
                            Le Bureau National CEDEAO
                        </li>
                    </a>
                    <a href="#bnc">
                        <li>LA CÔTE D'IVOIRE</li>
                    </a>
                </ol>

            </div>

        </div>
    </div>

    <section id=" main" class="medium-8 large-8 columns" style="color: black">
        <h1 class="title" id="presidente">1. La Directrice, Responsable du <br> Bureau National CEDEAO - CI</h1>

        <div id="events_listing">
            <article class="event slideUpRun">

                <div class="post post-alternate-3 elementFadeRun">
                    <div class="entry-media" style="text-align: center;">

                        <a class="image-post ">
                            <img src="assets/images/people/sf-1.jpg" alt="" width="50%" style="display: block !important; margin: auto !important" class="shadow">
                        </a>
                    </div>
                </div>

                <div class="entry-content">

                    <header class="entry-header text-center">
                        <h3 class="entry-title">
                            <a>Mme FOLQUET Sandra</a>
                        </h3>
                    </header>

                </div>

                <div class="event-content clearfix mt-5">

                    <h3 class="event-title">La vision du Bureau</h3>

                    <p>
                        Un Bureau National CEDEAO dynamique
                        pour une meilleure coordination des actions de la CEDEAO, au service d'une
                        communauté de peuples pleinement intégrée dans une Côte d'Ivoire
                        rayonnante et prospère, au cœur du processus d'intégration régionale
                    </p>

                    <hr class="hr">

                    <h3 class="event-title">Le slogan</h3>
                    <p>
                        Le Bureau National CEDEAO, un cadre de référence des
                        actions de la CEDEAO en Côte d'Ivoire
                    </p>

                </div>


            </article>

        </div>

        <h1 class="title" id="historique">2. Le Bureau National CEDEAO</h1>

        <p class="text-justify">
            <img src="images/blog/plateau.jpg" alt="" width="100%">

        </p>

        <div class="text-justify">
            @foreach($mission as $info)
               {!! $info->contenu !!}
            @endforeach
        </div>


        <div class="divider"></div>
        <div class="divider-1"></div>


        <div class="section">
            <div class="divider"></div>
            <h1 class="title" id="bnc">3. LA CÔTE D'IVOIRE</h1>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="section padding-off">

                <div class="container">
                    <div class="row">
                        <div class="medium-4 columns rounded">
                            <div class="section padding-off">
                                <div class="testimonial">
                                    <img src="https://ecowas.int/wp-content/uploads/2022/07/Alassane-Ouattara-cote-divoire.png" alt="" width="120%" class="rounded">
                                </div>
                            </div>
                        </div>
                        <div class="medium-8 columns">

                            <div class="section padding-off">
                                <div class="testimonial">
                                    <div class="relative">
                                        <img src="assets/images/users.png" alt="" class="alignleft" width="20%">

                                        <p>
                                            Population: <br>
                                        <h2>
                                            <span style="font-weight: bold; color: orange">
                                                25 millions d'habitants
                                            </span>
                                        </h2>

                                        </p>

                                        <hr>
                                        <img src="assets/images/capital.png" alt="" class="alignleft" width="20%">
                                        <p>
                                            Capital: <br>
                                        <h2>
                                            <span style="font-weight: bold; color: orange">
                                                {{ $cotedivoire->capitalePolitique ?? '' }}
                                            </span>
                                        </h2>
                                        </p>

                                        <hr>
                                        <img src="assets/images/langue.png" alt="" class="alignleft" width="20%">
                                        <p>
                                            Langue officielle: <br>
                                        <h2>
                                            <span style="font-weight: bold; color: orange">
                                                Français
                                            </span>
                                        </h2>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <ul class="accordion">
                    <li class="accordion-navigation">
                        <a href="#" class="acc-trigger" data-mode="">Information de base </a>

                        <div class="content" style="display: none;">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>Chef de Gouvernement</th>
                                        <td>{{ $cotedivoire->chefGouvernement ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gouvernement</th>
                                        <td>{{ $cotedivoire->gouvernement ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Capitale Politique</th>
                                        <td>{{ $cotedivoire->capitalePolitique ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Superficie</th>
                                        <td>{{ $cotedivoire->superficie ?? '' }} <sup>2</sup> </td>
                                    </tr>
                                    <tr>
                                        <th>Population</th>
                                        <td>{{ $cotedivoire->population ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Indépendance</th>
                                        <td>{{ $cotedivoire->independanceDay ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Langue officielle</th>
                                        <td>{{ $cotedivoire->langOfficielle ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Langue la plus parlé</th>
                                        <td>{{ $cotedivoire->langParle ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Espérance de vie</th>
                                        <td>{{ $cotedivoire->esperanceVie ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>PIP par habitant</th>
                                        <td>{{ $cotedivoire->pipHabitant ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Taux de croissance annuel</th>
                                        <td>{{ $cotedivoire->tauxCroissanceAnnuel ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Monnaie</th>
                                        <td>{{ $cotedivoire->monnaie ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Indice de développement humain</th>
                                        <td>{{ $cotedivoire->indiceDeveHumain ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fuseau horaire</th>
                                        <td>{{ $cotedivoire->fuseauHoraire ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Liens du gouvernement officiel</th>
                                        <td>{{ $cotedivoire->websiteGouvernement ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>

                    <li class="accordion-navigation">
                        <a href="#" class="acc-trigger" data-mode="">Ministère de Tutelle</a>

                        <div class="content">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>Nom du Ministère</th>
                                        <td>{{ $cotedivoire->ministery ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nom du Ministre</th>
                                        <td>{{ $cotedivoire->ministerName ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Addresse</th>
                                        <td>{{ $cotedivoire->ministerAdress ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telehone</th>
                                        <td>{{ $cotedivoire->ministerTel ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fax</th>
                                        <td>{{ $cotedivoire->ministerTel ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $cotedivoire->ministerEmail ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Site Web</th>
                                        <td>
                                            <a href="{{ $cotedivoire->ministerOfficialWebsite ?? '' }}">
                                                {{ $cotedivoire->ministerOfficialWebsite ?? '' }}
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>

                    <li class="accordion-navigation">
                        <a href="#" class="acc-trigger" data-mode="">Bureau National CEDEAO </a>

                        <div class="content">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>Nom du chef de bureau</th>
                                        <td>{{ $cotedivoire->managerBnc ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fonction</th>
                                        <td>{{ $cotedivoire->managerBncFunction ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telephone</th>
                                        <td>{{ $cotedivoire->managerBncTel ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fax</th>
                                        <td>{{ $cotedivoire->managerBncFax ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $cotedivoire->managerBncEmail ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Site web</th>
                                        <td>{{ $cotedivoire->managerBncOfficialWebsite ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>

                    <!--<li class="accordion-navigation">
                        <a href="#" class="acc-trigger" data-mode="">Représentants permanents auprès de la
                            CEDEAO</a>

                        <div class="content">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>Nom du représentant permanent</th>
                                        <td>{{ $cotedivoire->outCedeao ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Addresse</th>
                                        <td>{{ $cotedivoire->outCedeaoAdresse ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telehone</th>
                                        <td>{{ $cotedivoire->outCedeaoTel ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fax</th>
                                        <td>{{ $cotedivoire->outCedeaoFax ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $cotedivoire->outCedeaoMail ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>-->

                </ul>
                <div class="clear"></div>
                <div class="divider-2"></div>
            </div>
        </div>

    </section>


    @include ('layouts.sidebar');

</main>

@endsection