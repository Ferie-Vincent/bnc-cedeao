@extends('admin.inc.head')
@section('content')
@include('admin.inc.aside');
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Projets</h1>
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
                    Projets
                </h3>

                <div class="card-tools">
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddProjet">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un projet
                    </button>
                    <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-striped projects" aria-describedby="">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Titre</th>
                            <th>Image</th>
                            <th>Texte</th>
                            <th>Thématique</th>
                            <th class="project-actions text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projets as $projet)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$projet['titre'] }}</td>
                            <td>
                                <img src="{{ asset(env('IMAGES_PATH')) }}/{{$projet['image'] }}" alt="" class="rounded shadow" style="max-width: 50px!important; height: auto;">
                            </td>
                            <td>
                                <p>{!! Str::limit($projet['texte'], 300) !!}</p>
                            </td>
                            <td>
                                <span class="badge badge-info">{{$projet['thematique'] }}</span>
                            </td>
                            <td class="project-actions text-center">
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalProjet-{{$projet['id'] }}">
                                    <i class="fas fa-eye">
                                    </i>
                                </a>
                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateProjet-{{$projet['id'] }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDeleteProjet-{{$projet['id'] }}">
                                    <i class="fas fa-trash">
                                    </i>
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

<!-- ------------------------------------------------------------------------------------------- Modal Ajout projet -->
<div class="modal fade" id="modalAddProjet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/projet" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h3 class="modal-title"> AJOUT D'ARTICLE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="title">Titre du projet <sup class="text-danger">*</sup> </label>
                                <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre" required>
                            </div>

                            <div class="form-group">
                                <label>Thématique <sup class="text-danger">*</sup> </label>
                                <select class="form-control" name="idThematique" id="type" required>
                                    <option value="">Choix du thématique</option>
                                    @foreach( $thematiques as $thematique)
                                    <option value="{{$thematique['id']}}">{{$thematique['titre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image <sup class="text-danger">*</sup> </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" accept="image/*,.png,.jpg,.jpeg,.gif">
                                    <label class="custom-file-label" for="inputGroupFile01">Choississez une
                                        image</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Corps du texte</label>
                                <textarea id="summernote" name="texte" class="form-control">
                                    Veuillez entrez votre texte ici
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modifier</button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- /.Modal Ajout projet -->


<!-- ------------------------------------------------------------------------------------------- Modal Modification projet -->
@foreach($projets as $projet)
<div class="modal fade" id="modalUpdateProjet-{{$projet['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/projet" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h3 class="modal-title"> MODIFICATION D'UN PROJET</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="title">Titre du projet <sup class="text-danger">*</sup> </label>
                                <input type="hidden" name="id" value="{{$projet['id']}}">
                                <input type="text" class="form-control" name="titre" id="titre" value="{{$projet['titre']}}" required>
                            </div>

                            <div class="form-group">
                            <select class="form-control" name="idThematique" id="type" required>
                                    <option value="{{$projet['idThematique']}}">{{$projet['thematique']}}</option>
                                    @foreach( $thematiques as $thematique)
                                    <option value="{{$thematique['id']}}">{{$thematique['titre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image <sup class="text-danger">*</sup> <img src="{{ asset(env('IMAGES_PATH')) }}/{{$projet['image']}}" alt="ok" width="05%"></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                    <label class="custom-file-label" for="inputGroupFile01">Choississez une
                                        image</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Corps du texte</label>
                                <textarea id="summernote-{{$projet['id'] }}" name="texte" class="form-control">
                                {{$projet['texte'] }}
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modifier</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach
<!-- /.Modal Ajout projet -->

<!-- Modal Affiche l'article -->
@foreach($projets as $projet)
<div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="modalProjet-{{$projet['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-top: 0px !important">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset(env('IMAGES_PATH')) }}/{{$projet['image'] }}" alt="" class="img-fluid rounded shadow" sstyle="margin-top: -10%; z-index: 999; max-width: 300px!important; height: auto;">

                    <hr class="w-50 my-4">
                    <p>
                        <span class="badge badge-info">{{$projet['thematique'] }}</span>
                    </p>

                    <h3>
                        {{$projet['titre'] }}
                    </h3>

                    <p class="text-justify mt-3">
                        {!! $projet['texte'] !!}
                    </p>

                    <p class="text-left mt-4 secondary">
                        <sub>
                            <i>
                                <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{$projet['created_at'] }}
                            </i>
                        </sub>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- /.Modal pour l'image -->

<!-- Modal Supprimer projet -->
@foreach($projets as $projet)
<div class="modal fade" id="modalDeleteProjet-{{$projet['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/archive_projet" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">SUPPRIMER EMPLOIS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="auteur">Souhaitez-vous supprimer l'appel d'offre? <sup class="text-danger">*</sup> </label>
                                <input type="hidden" name="id" value="{{$projet['id']}}">
                                <input type="text" class="form-control text-danger" name="titre" id="titre" value="{{$projet['titre']}}" readonly>
                                <input type="hidden" name="thematique" value="{{$projet['thematique']}}">
                                <input type="hidden" name="texte" value="{{$projet['texte']}}">
                                <input type="hidden" name="image" value="{{$projet['image']}}">
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
<!-- /.Modal Supprimer projet -->

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
        $('#summernote').summernote()

        // Projet
        @foreach($projets as $projet)
        $('#summernote-{{$projet['id']}}').summernote({
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