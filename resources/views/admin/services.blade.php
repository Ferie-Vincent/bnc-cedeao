@extends('admin.inc.head')
@section('content')
@include('admin.inc.aside');
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Services</h1>
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
                    Services
                </h3>

                <div class="card-tools">
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddService">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un service
                    </button>
                    <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped projects" aria-describedby="">
                    <thead>
                        <tr>
                            <th>Nom du service</th>
                            <th>Attributions du service</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>

                            <td>{{ $service['service'] }}</td>
                            <td>{!! Str::limit($service['contenu'], 300) !!}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTextInfos-{{ $service['id'] }}">
                                    <i class="fas fa-eye">
                                    </i>
                                </a>
                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateService-{{ $service['id'] }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDeleteService-{{ $service['id'] }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>

</div>

<!-- ------------------------------------------------------------------------------------------- Modal Ajout Service -->
<div class="modal fade" id="modalAddService" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="/service" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h3 class="modal-title"> AJOUT DE SERVICE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">

                        <div class="shadow p-4 rounded">

                            <div class="form-group">
                                <label for="service">Nom du service<sup class="text-danger">*</sup> </span></label>
                                <input type="text" class="form-control" name="service" id="service" placeholder="Entrer le nom du service" required>
                            </div>

                            <div class="form-group">
                                <label for="">Attributions du service</label>
                                <textarea class="form-control" name="contenu" id="contenu" rows="5">Veuillez entrez votre texte ici</textarea>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- Modal Affiche service -->
@foreach($services as $key => $service)
<div class="modal fade" id="modalTextInfos-{{ $service['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title"> SERVICE N° {{$key +1}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                

                <h3 class="text-center">
                    {{ $service['service'] }}
                </h3>
                <hr class="w-50 my-4">
                <p>
                    {!! $service['contenu'] !!}
                </p>
                <p class="text-left mt-4 secondary">
                    <sub>
                        <i>
                            <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{$service['created_at']}}
                        </i>
                    </sub>
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="Ajouter" class="btn btn-success">Modifier</button>
            </div>

        </div>
    </div>
</div>
@endforeach
<!-- /.Modal Affiche service -->

<!-- ------------------------------------------------------------------------------------------- Modal Modif Service -->
@foreach($services as $service)
<div class="modal fade" id="modalUpdateService-{{ $service['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="/service" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h3 class="modal-title"> MODIFICATIONS DE SERVICE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">

                        <div class="shadow p-4 rounded">

                            <div class="form-group">
                                <label for="service">Nom du service<sup class="text-danger">*</sup> </span></label>
                                <input type="hidden" name="id" value="{{$service['id']}}">
                                <input type="text" class="form-control" name="service" id="service" value="{{$service['service']}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">Attributions du service</label>
                                <textarea class="form-control" name="contenu" id="attribut-{{$service['id']}}" rows="5" placeholder="Veuillez entrez votre texte ici">
                                {!! $service['contenu'] !!}
                                </textarea>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="Ajouter" class="btn btn-success">Ajouter</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach

<!-- Modal Supprimer service -->
@foreach($services as $service)
<div class="modal fade" id="modalDeleteService-{{$service['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/archive_service" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">SUPPRIMER SERVICE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="auteur">Souhaitez-vous supprimer le service? <sup class="text-danger">*</sup> </label>
                                <input type="hidden" name="id" value="{{$service['id']}}">
                                <input type="text" class="form-control text-danger" name="service" id="service" value="{{$service['service']}}" readonly>
                                <input type="hidden" name="contenu" value="{{$service['contenu']}}">
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
<!-- /.Modal Supprimer service -->

@push('scripts')
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
    $(function() {
        // // Summernote
        $('#contenu').summernote()

        // Actualites
        @foreach($services as $service)
        $('#attribut-{{$service['
            id ']}}').summernote({
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