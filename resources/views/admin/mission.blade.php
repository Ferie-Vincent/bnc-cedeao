@extends('admin.inc.head')
@section('content')
@include('admin.inc.aside');
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Missions</h1>
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
                <h3 class="card-title">Plan Stratégique</h3>

                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            @foreach($missions as $mission)
            <div class="card-body">
                <div class="container">
                    <form action="/plan_strategie" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group w-100 col-8">
                                <label for="traite">Plan Stratégique au format PNG <sup class="text-danger">*</sup> </label>
                                <div class="custom-file">
                                    <input type="hidden" name="id" value="{{ $mission['id'] }}">
                                    <input type="file" class="custom-file-input" id="traite" name="planStrategie" required>
                                    <input type="hidden" name="contenu" value="{{ $mission['contenu'] }}">
                                    <input type="hidden" name="facebook" value="{{ $mission['facebook'] }}">
                                    <input type="hidden" name="linkedIn" value="{{ $mission['linkedIn'] }}">
                                    <input type="hidden" name="twitter" value="{{ $mission['twitter'] }}">
                                    <input type="hidden" name="youTube" value="{{ $mission['youTube'] }}">
                                    <label class="custom-file-label" for="traite">Uploadez le fichier</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <br>
                                <button class="btn btn-success btn-sm" type="submit">
                                    <i class="fas fa-save"></i> Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach

        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Texte infos Bureau National CEDEAO</h3>

                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">
                <table class="table table-striped projects" aria-describedby>
                    <thead>
                        <tr>
                            <th width="80%">
                                Contenu
                            </th>
                            <th class="project-actions text-center">
                                actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($missions as $mission)
                            <td width="80%">
                                {!! Str::limit($mission['contenu'], 300) !!}
                            </td>
                            <td class="project-actions text-center">
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTextInfos">
                                    <i class="fas fa-eye">
                                    </i>
                                </a>
                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateTextInfos">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <!-- <a class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash">
                                    </i>
                                </a> -->
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Réseaux Sociaux</h3>

                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            @foreach($missions as $mission)
            <div class="card-body p-0">
                <table class="table table-striped projects" aria-describedby>
                    <thead>
                        <tr>
                            <th width="80%">
                                Réseau
                            </th>
                            <th class="project-actions text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <form action="/plan_strategie" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td>
                                    <div class="form-group">
                                        <label for="">Facebook :</label>
                                        <input type="hidden" name="id" value="{{$mission['id']}}">
                                        <input type="hidden" name="contenu" value="{{ $mission['contenu'] }}">
                                        <input type="hidden" name="planStrategie" value="{{ $mission['planStrategie'] }}">
                                        <input type="hidden" name="linkedIn" value="{{ $mission['linkedIn'] }}">
                                        <input type="hidden" name="twitter" value="{{ $mission['twitter'] }}">
                                        <input type="hidden" name="youTube" value="{{ $mission['youTube'] }}">
                                        <input type="text" class="form-control" name="facebook" id="" value="{{$mission['facebook']}}">
                                    </div>
                                </td>
                                <td class="project-actions text-center">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class=" fas fa-save ">
                                        </i> Enregistrer
                                    </button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form action="/plan_strategie" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td>
                                    <div class="form-group">
                                        <label for="">LinkedIn:</label>
                                        <input type="hidden" name="id" value="{{$mission['id']}}">
                                        <input type="hidden" name="contenu" value="{{ $mission['contenu'] }}">
                                        <input type="hidden" name="planStrategie" value="{{ $mission['planStrategie'] }}">
                                        <input type="hidden" name="facebook" value="{{ $mission['facebook'] }}">
                                        <input type="hidden" name="twitter" value="{{ $mission['twitter'] }}">
                                        <input type="hidden" name="youTube" value="{{ $mission['youTube'] }}">
                                        <input type="text" class="form-control" name="linkedIn" id="" value="{{$mission['linkedIn']}}">
                                    </div>
                                </td>
                                <td class="project-actions text-center">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class=" fas fa-save ">
                                        </i> Enregistrer
                                    </button>
                                </td>
                            </form>
                        </tr>

                        <tr>
                            <form action="/plan_strategie" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td>
                                    <div class="form-group">
                                        <label for="">Twitter :</label>
                                        <input type="hidden" name="id" value="{{$mission['id']}}">
                                        <input type="hidden" name="contenu" value="{{ $mission['contenu'] }}">
                                        <input type="hidden" name="planStrategie" value="{{ $mission['planStrategie'] }}">
                                        <input type="hidden" name="linkedIn" value="{{ $mission['linkedIn'] }}">
                                        <input type="hidden" name="facebook" value="{{ $mission['facebook'] }}">
                                        <input type="hidden" name="youTube" value="{{ $mission['youTube'] }}">
                                        <input type="text" class="form-control" name="twitter" id="" value="{{$mission['twitter']}}">
                                    </div>
                                </td>
                                <td class="project-actions text-center">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class=" fas fa-save ">
                                        </i> Enregistrer
                                    </button>
                                </td>
                            </form>
                        </tr>

                        <tr>
                            <form action="/plan_strategie" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td>
                                    <div class="form-group">
                                        <label for="">YouTube :</label>
                                        <input type="hidden" name="id" value="{{$mission['id']}}">
                                        <input type="hidden" name="contenu" value="{{ $mission['contenu'] }}">
                                        <input type="hidden" name="planStrategie" value="{{ $mission['planStrategie'] }}">
                                        <input type="hidden" name="linkedIn" value="{{ $mission['linkedIn'] }}">
                                        <input type="hidden" name="facebook" value="{{ $mission['facebook'] }}">
                                        <input type="hidden" name="twitter" value="{{ $mission['twitter'] }}">
                                        <input type="text" class="form-control" name="youTube" id="" value="{{$mission['youTube']}}">
                                    </div>
                                </td>
                                <td class="project-actions text-center">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class=" fas fa-save ">
                                        </i> Enregistrer
                                    </button>
                                </td>
                            </form>
                        </tr>


                    </tbody>
                </table>
            </div>
            @endforeach
        </div>

    </section>

    <!-- Modal Affiche Texte infos -->
    @foreach($missions as $mission)
    <div class="modal-dialog-centered pt-5">
        <div class="modal fade pt-5 " id="modalTextInfos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-top: 100px !important">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="{{ asset(env('IMAGES_PATH')) }}/{{$mission['planStrategie']}}" alt="" class="img-fluid rounded shadow" style="margin-top: -10%; z-index: 999; max-width: 300px!important; height: auto;">

                        <hr class="w-50 my-4">

                        <h3>
                            Le Bureau National CEDEAO Côte d'Ivoire
                        </h3>

                        <p class="text-justify mt-3">
                            {!! $mission['contenu'] !!}
                        </p>

                        <p class="text-left mt-4 secondary">
                            <sub>
                                <i>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{ $mission['created_at']}}
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

    @foreach($missions as $mission)
    <!-- Modal Modifie Texte Infos-->
    <div class="modal fade" id="modalUpdateTextInfos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/plan_strategie" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Modification de Texte infos Bureau National CEDEAO - CI</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{$mission['id']}}">
                                    
                                    <input type="hidden" name="linkedIn" value="{{ $mission['linkedIn'] }}">
                                    <input type="hidden" name="facebook" value="{{ $mission['facebook'] }}">
                                    <input type="hidden" name="twitter" value="{{ $mission['twitter'] }}">
                                    <input type="hidden" name="youTube" value="{{ $mission['youTube'] }}">
                                    <label for="image">Image <sup class="text-danger">*</sup> <img src="{{ asset(env('IMAGES_PATH')) }}/{{$mission['planStrategie']}}" alt="ok" width="05%"></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="planStrategie" accept="image/*,.png,.jpg,.jpeg,.gif" required>
                                        <label class="custom-file-label" for="image">Choississez une image</label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="">Corps du texte</label>
                                    <textarea class="form-control" name="contenu" id="contenu" rows="5"> {{$mission['contenu']}}</textarea>
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


</div>

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

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
@endpush

@endsection