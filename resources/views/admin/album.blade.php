@extends('admin.inc.head')
@section('content')
@include('admin.inc.aside');
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <hr>
                <div class="col-sm-4">
                    <h1>Albums</h1>

                    <br>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                        Ajouter un album
                    </button>

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
                <hr>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach( $albums as $album)
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">{{ $album['nom'] }}</h4>

                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAdd-{{ $album['id'] }}">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter image
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if (!empty($album->image))
                                @foreach( json_decode($album->image) as $index => $image)

                                <!-- <div class="col-sm-3">
                                    <img src="{{ asset(env('IMAGE_PATH')) }}/{{$image}}" class="img-fluid mb-2" alt="black sample" style="max-width: 110px!important; max-height: auto;" />
                                </div> -->

                                <div class="col-sm-3" x-data="{ isHovered: false }">
                                    <div class="image-container" @mouseover="isHovered = true" @mouseout="isHovered = false">
                                        <img src="{{ asset(env('IMAGE_PATH')) }}/{{$image}}" class="img-fluid mb-2" alt="black sample" style="max-width: 110px!important; max-height: auto; position: relative;" />
                                        <div class="row" x-show="isHovered" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: flex; justify-content: center; align-items: center;">
                                            <!-- <div class="col-6">
                                                <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalUpdateProjet-{{$index}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </div> -->
                                            <div class="col-6">
                                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDeleteProjet-{{ $album['nom'] }}{{$index}}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de mise à jour spécifique à l'image -->
                                <div class="modal fade" id="modalAdd-{{ $album['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <form action="/album" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">

                                                    <h5 class="modal-title">Modifier l'album</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="nom">Nom de l'album</label>
                                                    <input type="hidden" name="id" value="{{ $album['id'] }}">
                                                        <input type="text" class="form-control" name="nom" id="nom" value="{{ $album['nom'] }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="images">Sélectionnez votre album</label>
                                                        <input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*,.png,.jpg,.jpeg,.gif" required>
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


                                <!-- Modal de suppression spécifique à l'image -->
                                <div class="modal fade" id="modalDeleteProjet-{{ $album['nom'] }}{{$index}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteProjet{{$image}}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="/archive_album" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalDeleteProjet{{$index}}">Supprimer l'image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir supprimer cette image ?
                                                    <img src="{{ asset(env('IMAGE_PATH')) }}/{{$image}}" class="img-fluid mb-2" style="max-width: 50px!important; height: auto;" />
                                                    <input type="hidden" name="id" value="{{ $album['id'] }}">
                                                    <input type="hidden" name="nom" value="{{ $album['nom'] }}">
                                                    <input type="hidden" name="image" value="{{$image}}">
                                                    <input type="hidden" name="archive" value="1">
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Album 2</h4>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Album 3</h4>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Album 4</h4>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="/album" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body mt-5">
                    <div class="container-fluid">

                        <!-- /.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3>
                                                Création d'album
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="nom">Nom de l'album</label>
                                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Choississez le nom de l'album" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="images">Sélectionnez votre album</label>
                                            <input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*,.png,.jpg,.jpeg,.gif" required>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Créer l'album</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>

<script>
    Alpine.start();
</script>
@endpush

@endsection
