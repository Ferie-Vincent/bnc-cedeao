@extends('admin.inc.head')
@section('content')
@include('admin.inc.aside');
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact</h1>
                </div>
                <div class="col-sm-8">
                    <h5 class="card-title">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </h5>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Messages reçus
                </h3>
                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped projects" aria-describedby="">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Nom
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Sujet
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                statut
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                {{$message['name']}}
                            </td>
                            <td>
                                {{$message['email']}}
                            </td>
                            <td>
                                <p>
                                    {{$message['subjet']}}
                                </p>
                            </td>
                            <td>
                                {{$message['date']}}
                            </td>
                            <td>
                                @if($message['statu'] == 0)
                                <span class="badge badge-danger">En attente de réponse</span>
                                @else
                                <span class="badge badge-success">Répondu</span>
                                @endif
                            </td>
                            <td class="project-actions text-center">
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAffiche-{{$message['id']}}">
                                    <i class="fas fa-eye">
                                    </i>
                                </a>

                                <!-- <a class="btn btn-info btn-sm {{ $message['statu'] ? 'disabled' : '' }}" data-toggle="modal" data-target="#modalReponse-{{$message['id']}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a> -->
                                @if (!$message['statu'])
                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalReponse-{{$message['id']}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                @endif




                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete-{{$message['id']}}">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>

</div>

<!-- ------------------------------------------------------------------------------------------- Modal lecture -->
@foreach($messages as $message)
<div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5" id="modalAffiche-{{$message['id']}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-top: 0px !important">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Mail de {{$message['name']}}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">
                            <div class="mailbox-read-info">
                                <h5>Sujet : {{$message['subjet']}}</h5>
                                <h6>De : {{$message['email']}}
                                    <span class="mailbox-read-time float-right">{{$message['date']}}</span>
                                </h6>
                            </div>

                            <p class="text-justify mt-3">
                                {!! $message['contenue'] !!}
                            </p>

                            <p class="text-left mt-4 secondary">
                                <sub>
                                    <i>
                                        <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{$message['date']}}
                                    </i>
                                </sub>
                            </p>
                        </div>
                        @if ($message['statu'] == 1)
                        <div class="shadow p-4">
                            <h3 class="modal-title">Reponse</h3>
                            <div class="mailbox-read-info">
                                <h5>Sujet : {{$message['subjetExpediteur']}}</h5>
                                <h6>De : {{$message['emailExpediteur']}}
                                    <span class="mailbox-read-time float-right">{{$message['nameExpediteur']}}</span>
                                </h6>
                            </div>

                            <p class="text-justify mt-3">
                                {!! $message['contenueExpediteur'] !!}
                            </p>

                            <p class="text-left mt-4 secondary">
                                <sub>
                                    <i>
                                        <i class="fa fa-calendar" aria-hidden="true"></i> Repondu le : {{$message['dateExpediteur']}}
                                    </i>
                                </sub>
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div> <!-- Fermez la boucle foreach ici -->
@endforeach



<!-- ------------------------------------------------------------------------------------------- Modal Réponse -->
@foreach($messages as $message)
<div class="modal fade" id="modalReponse-{{$message['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/sendMessage" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title"> Réponse à {{$message['name']}}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">
                            <input type="hidden" name="id" value="{{$message['id']}}">
                            <input type="hidden" name="statu" value="1">

                            @if(auth()->check())
                            <div class="form-group">
                                <label for="">Nom expediteur</label>
                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">E-mail expediteur</label>
                                <input type="mail" class="form-control" name="email" value="{{ auth()->user()->email }}">
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="">Objet</label>
                                <input type="text" class="form-control" name="subjet" placeholder="Sujet:">
                            </div>
                            <div class="form-group">
                                <label for="">Corps du texte</label>
                                <textarea id="note-{{$message['id']}}" class="form-control" name="contenue">
                                Veuillez entrez votre texte ici
                            </textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Répondre au message</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach


<!-- Modal Supprimer Appel d'offres -->
@foreach($messages as $message)
<div class="modal fade" id="modalDelete-{{$message['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/archive_message" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">SUPPRIMER MAIL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="auteur">Souhaitez-vous supprimer le mail de {{$message['name']}}? <sup class="text-danger">*</sup> </label>
                                <input type="hidden" name="id" value="{{$message['id']}}">
                                <input type="text" class="form-control text-danger" name="subjet" value="Sujet: {{$message['subjet']}}" readonly>
                                <input type="hidden" name="contenue" value="{{$message['contenue']}}">
                                <input type="hidden" name="email" value="{{$message['email']}}">
                                <input type="hidden" name="name" value="{{$message['name']}}">
                                <input type="hidden" name="statu" value="{{$message['statu']}}">
                                <input type="hidden" name="archive" value="1">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Supprimer</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach
<!-- /.Modal Supprimer Appel d'offres -->
<!-- /.Modal Ajout projet -->

@push('scripts')
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
    $(function() {

        // contact
        @foreach($messages as $message)
        $('#note-{{$message['id']}}').summernote({
            // Options de configuration si nécessaire
        });
        @endforeach

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
@endpush

@endsection