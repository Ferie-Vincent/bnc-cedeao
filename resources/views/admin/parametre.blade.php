@extends('admin.inc.head')
@section('content')
@include('admin.inc.aside');
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Articles</h1>
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
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Flashs infos</h3>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddFlash">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un libellé Flash
                                </button>
                                <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped projects" aria-describedby="">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Libellé</th>
                                        <th>Couleur</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $typeFlashInfos as $typeFlashInfo)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$typeFlashInfo['titre']}}</th>
                                        <th>
                                            <span style="background-color: {{$typeFlashInfo['couleur']}}; padding: 3px; color:#fff">Couleur</span>
                                        </th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateFlash-{{$typeFlashInfo['id']}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDeleteFlash-{{$typeFlashInfo['id']}}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Projets</h3>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddProjet">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter une thématique Projet
                                </button>
                                <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped projects" aria-describedby="">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Thématique </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $thematiques as $thematique)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{ $thematique['titre']}} </th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateProjet-{{ $thematique['id']}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDeleteProjet-{{ $thematique['id']}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <hr class="bg-success w-50 my-5">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Documentations</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                @foreach( $typeCategorieDocuments as $idCategorie => $typeCategorieDocument)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>{{$typeCategorieDocument[0]['categorie']}}</h3>
                            </div>
                            <div class="card-tools">
                                <!-- <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddTraite"> -->
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAdd-{{$typeCategorieDocument[0]['idCategorie']}}">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter une catégorie aux
                                    catégories {{$typeCategorieDocument[0]['categorie']}}
                                </button>
                                <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        @if( $typeCategorieDocument[0]['id'])
                        <div class="card-body">
                            <table class="table table-striped projects" aria-describedby="">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Catégorie </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($typeCategorieDocument as $typeCategorie)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$typeCategorie['typeCategorie']}}</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdate-{{$typeCategorie['id']}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete-{{$typeCategorie['id']}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Journaux Officiels</h3>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddJournaux">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter une catégorie aux
                                    Journaux Officiels
                                </button>
                                <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped projects" aria-describedby="">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Catégorie </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateJournaux">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <th>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateJournaux">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto,
                                            obcaecati!</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateJournaux">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Communiqués</h3>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddCommunique">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter une catégorie aux
                                    Communiqués
                                </button>
                                <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped projects" aria-describedby="">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Catégorie </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateCommunique">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <th>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateCommunique">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto,
                                            obcaecati!</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateCommunique">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Textes Juridiques</h3>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddTexte">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter une catégorie aux
                                    Textes Juridiques
                                </button>
                                <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped projects" aria-describedby="">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Catégorie </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateTexte">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <th>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateCommunique">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto,
                                            obcaecati!</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateCommunique">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Politiques</h3>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddPolitique">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter une catégorie aux
                                    Politiques
                                </button>
                                <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped projects" aria-describedby="">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Catégorie </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdatePolitique">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <th>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateCommunique">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto,
                                            obcaecati!</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateCommunique">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Règlements</h3>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddPolitique">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter une catégorie aux
                                    Règlements
                                </button>
                                <button class="btn btn-tool" type="button" data-card-widget="collapse" title="Collapse">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped projects" aria-describedby="">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Catégorie </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateReglement">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <th>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateReglement">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto,
                                            obcaecati!</th>
                                        <th>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateReglement">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->


            </div>
        </div>
    </section>

</div>

<!-- ------------------------------------------------------------------------------------------- Modal add Flash Infos-->
<div class="modal fade" id="modalAddFlash" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/type_flash_info" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h3 class="modal-title"> AJOUT DE LIBELLÉ FLASH</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="libelle">Libellé</label>
                                <input type="text" class="form-control" name="titre" id="titre" placeholder="entrez le libellé">
                            </div>

                            <div class="form-group">
                                <label for="couleur">Couleur</label>
                                <input type="color" class="form-control" name="couleur" id="couleur">
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
<!-- ------------------------------------------------------------------------------------------- Modal modification Flash Infos-->
@foreach( $typeFlashInfos as $typeFlashInfo)
<div class="modal fade" id="modalUpdateFlash-{{$typeFlashInfo['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/type_flash_info" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h3 class="modal-title"> MODIFICATION DE LIBELLÉ FLASH</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="libelle">Libellé</label>
                                <input type="hidden" name="id" value="{{ $typeFlashInfo['id'] }}">
                                <input type="text" class="form-control" name="titre" id="titre" value="{{$typeFlashInfo['titre']}}">
                            </div>

                            <div class="form-group">
                                <label for="couleur">Couleur</label>
                                <input type="color" class="form-control" name="couleur" id="couleur" value="{{$typeFlashInfo['couleur']}}">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modification</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach
<!-- ------------------------------------------------ Modate delete flash info --------------------------------------------------->
@foreach( $typeFlashInfos as $typeFlashInfo)
<div class="modal fade" id="modalDeleteFlash-{{$typeFlashInfo['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="piedpage">
        <div class="modal-content">
            <form action="/archive_type_flash_info" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">SUPPRIMER LE LIBELLE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="auteur">Souhaitez-vous supprimer le libellé? <sup class="text-danger">*</sup> </label>
                                <input type="hidden" name="id" value="{{$typeFlashInfo['id']}}">
                                <input type="text" class="form-control text-danger" name="titre" value="{{$typeFlashInfo['titre']}}" readonly>
                                <input type="hidden" name="couleur" value="{{$typeFlashInfo['idCategorie']}}">
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


<!-- ------------------------------------------------------------------------------------------- Modal add Projet -->
<div class="modal fade" id="modalAddProjet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/projet_thematique" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h3 class="modal-title"> AJOUT D'UNE THÉMATIQUE DE PROJET </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="thematique">Thématique</label>
                                <input type="text" class="form-control" name="titre" id="thematique" placeholder="Entrez la thématique">
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
<!-- ------------------------------------------------------------------------------------------- Modal modification Projet -->
@foreach( $thematiques as $thematique)
<div class="modal fade" id="modalUpdateProjet-{{ $thematique['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/projet_thematique" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h3 class="modal-title"> MODIFICATION DE LA THÉMATIQUE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="thematique">Thématique</label>
                                <input type="hidden" name="id" value="{{ $thematique['id'] }}">
                                <input type="text" class="form-control" name="titre" id="thematique" value="{{ $thematique['titre']}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modification</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach

<!-- ------------------------------------------------ Modate delete flash info --------------------------------------------------->
@foreach( $thematiques as $thematique)
<div class="modal fade" id="modalDeleteProjet-{{$thematique['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="">
        <div class="modal-content">
            <form action="/archive_projet_thematique" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">SUPPRIMER LA THEMATIQUE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="auteur">Souhaitez-vous supprimer la thématique? <sup class="text-danger">*</sup> </label>
                                <input type="hidden" name="id" value="{{$thematique['id']}}">
                                <input type="text" class="form-control text-danger" name="titre" value="{{$thematique['titre']}}" readonly>
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


<!-- ------------------------------------------------------------------------------------------- Modal add Traité -->
<!-- <div class="modal fade" id="modalAddTraite" tabindex="-1" role="dialog" aria-hidden="true">-->

@foreach( $typeCategorieDocuments as $idCategorie => $typeCategorieDocument)
@foreach($typeCategorieDocument as $typeCategorie)
<div class="modal fade" id="modalAdd-{{$typeCategorieDocument[0]['idCategorie']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/type_categorie_document" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h3 class="modal-title" style="text-transform: uppercase;"> AJOUT D'UNE CATÉGORIE AUX {{$typeCategorieDocument[0]['categorie']}}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="hidden" name="idCategorie" value="{{$typeCategorieDocument[0]['idCategorie']}}">
                                <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez la catégorie">
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
@endforeach
@endforeach
<!-- ------------------------------------------------------------------------------------------- Modal modification Traité -->
@foreach( $typeCategorieDocuments as $idCategorie => $typeCategorieDocument)
@foreach($typeCategorieDocument as $typeCategorie)
<div class="modal fade" id="modalUpdate-{{$typeCategorie['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/type_categorie_document" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h3 class="modal-title" style="text-transform: uppercase;"> MODIFICATION DE LA CATÉGORIE {{$typeCategorieDocument[0]['categorie']}}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="hidden" name="idCategorie" value="{{$typeCategorieDocument[0]['idCategorie']}}">
                                <input type="hidden" name="id" value="{{$typeCategorie['id']}}">
                                <input type="text" class="form-control" name="titre" id="titre" value="{{$typeCategorie['typeCategorie']}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modification</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach
@endforeach

<!-- ------------------------------------------------ Modate delete flash info --------------------------------------------------->
@foreach( $typeCategorieDocuments as $idCategorie => $typeCategorieDocument)
@foreach($typeCategorieDocument as $typeCategorie)
<div class="modal fade" id="modalDelete-{{$typeCategorie['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="">
        <div class="modal-content">
            <form action="/archive_type_categorie_document" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" style="text-transform: uppercase;">SUPPRIMER LA CATÉGORIE {{$typeCategorieDocument[0]['categorie']}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="auteur">Souhaitez-vous supprimer la catégorie? <sup class="text-danger">*</sup> </label>
                                <input type="hidden" name="idCategorie" value="{{$typeCategorieDocument[0]['idCategorie']}}">
                                <input type="hidden" name="id" value="{{$typeCategorie['id']}}">
                                <input type="text" class="form-control text-danger" name="titre" value="{{$typeCategorie['typeCategorie']}}" readonly>
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
@endforeach

<!-- ------------------------------------------------------------------------------------------- Modal add Journaux Officiels -->
<div class="modal fade" id="modalAddJournaux" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> AJOUT D'UNE CATÉGORIE AUX JOURNAUX OFFICIELS</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" placeholder="entrez la catégorie">
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
<!-- ------------------------------------------------------------------------------------------- Modal modification Journaux Officiels -->
<div class="modal fade" id="modalUpdateJournaux" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> MODIFICATION DE LA CATÉGORIE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" value="Lorem ipsum dolor sit amet consectetur adipisicing elit.">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modification</button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- ------------------------------------------------------------------------------------------- Modal add Communiqués -->
<div class="modal fade" id="modalAddCommunique" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> AJOUT D'UNE CATÉGORIE AUX COMMUNIQUÉS</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" placeholder="entrez la catégorie">
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
<!-- ------------------------------------------------------------------------------------------- Modal modification Communiqués -->
<div class="modal fade" id="modalUpdateCommunique" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> MODIFICATION DE LA CATÉGORIE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" value="Lorem ipsum dolor sit amet consectetur adipisicing elit.">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modification</button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- ------------------------------------------------------------------------------------------- Modal add Textes Juridiques -->
<div class="modal fade" id="modalAddTexte" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> AJOUT D'UNE CATÉGORIE AUX TEXTES JURIDIQUES</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" placeholder="entrez la catégorie">
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
<!-- ------------------------------------------------------------------------------------------- Modal modification Textes Juridiques -->
<div class="modal fade" id="modalUpdateTexte" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> MODIFICATION DE LA CATÉGORIE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" value="Lorem ipsum dolor sit amet consectetur adipisicing elit.">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modification</button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- ------------------------------------------------------------------------------------------- Modal add Politique -->
<div class="modal fade" id="modalAddPolitique" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> AJOUT D'UNE CATÉGORIE AUX POLITIQUES</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" placeholder="entrez la catégorie">
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
<!-- ------------------------------------------------------------------------------------------- Modal modification Politique -->
<div class="modal fade" id="modalUpdatePolitique" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> MODIFICATION DE LA CATÉGORIE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" value="Lorem ipsum dolor sit amet consectetur adipisicing elit.">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modification</button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- ------------------------------------------------------------------------------------------- Modal add Règlement -->
<div class="modal fade" id="modalAddReglement" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> AJOUT D'UNE CATÉGORIE AUX RÈGLEMENTS</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" placeholder="entrez la catégorie">
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
<!-- ------------------------------------------------------------------------------------------- Modal modification Règlements -->
<div class="modal fade" id="modalUpdateReglement" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h3 class="modal-title"> MODIFICATION DE LA CATÉGORIE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="shadow p-4">

                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" name="categorie" id="categorie" value="Lorem ipsum dolor sit amet consectetur adipisicing elit.">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Modification</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection