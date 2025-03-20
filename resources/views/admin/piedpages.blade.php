@extends('admin.inc.head')
@section('content')
@include('admin.inc.aside');
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Pied de page</h1>
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
        @foreach($piedPages as $idCategorie => $piedPage)
        <!-- Liens Institutionnels -->
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                {{$piedPage[0]['categorie']}}
                </h3>

                <div class="card-tools">
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAdd">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un lien intitutionnel
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
                            <th>N°</th>
                            <th>Nom du détenteur du site</th>
                            <th>
                                Nom afficher
                            </th>
                            <th>
                                Lien du site
                            </th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    @foreach($piedPage as $pied)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                {{$pied['nom']}}
                            </td>
                            <td>
                                {{$pied['nomAfficher']}}
                            </td>
                            <td>
                                {{$pied['linkS']}}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdate-{{$pied['id']}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete-{{$pied['id']}}">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
                       @endforeach
                       
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item">
                        
                    </li>
                </ul>
            </div>

        </div>
        <!-- /.Liens Institutionnels -->
        @endforeach
       
    </section>

    <!-- ------------------------------------------------------------------------------------------------------------------------------- Modal Liens Institutionnel -->

    <!-- ------------------------------------------------------------------------------------------- Modal Ajout Liens Institutionnel -->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/pied" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h3 class="modal-title"> AJOUT D'UN PIED DE PAGE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">
                                <div class="form-group">
                                    <label>Categorie de pied de page <sup class="text-danger">*</sup> </label>
                                    <select class="form-control" name="categorie" required>
                                        <option value="">Choix Categorie</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->titre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nom">Nom du détenteur du site <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Veuillez entrer le nom du détenteur du site" required>
                                </div>

                                <div class="form-group">
                                    <label for="nomAfficher">Nom à afficher <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nomAfficher" id="nomAfficher" placeholder="Veuillez entrer le nom à afficher" required>
                                </div>

                                <div class="form-group">
                                    <label for="link">Lien du site<sup class="text-danger">*</sup> </label>
                                    <input type="url" class="form-control" name="linkS" id="link" placeholder="Veuillez entrer le site" required>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Ajout Liens Institutionnel -->

    <!-- ------------------------------------------------------------------------------------------- Modal Update Liens Institutionnel -->
    @foreach($piedPages as $idCategorie => $piedPage)
    @foreach($piedPage as $pied)
    <div class="modal fade" id="modalUpdate-{{$pied['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/pied" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h3 class="modal-title"> MODIFICATION DU PIED DE PAGE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">
                                <div class="form-group">
                                    <label>Type pied de page <sup class="text-danger">*</sup> </label>
                                    <input type="hidden" name="id" value="{{ $pied['id'] }}">
                                    <select class="form-control" name="categorie" required>
                                        <option value="{{$pied['categorie']}}">{{$pied['categorie']}}</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->titre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nom">Nom du détenteur du site <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nom" id="nom" value="{{$pied['nom']}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="nomAfficher">Nom à afficher <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nomAfficher" id="nomAfficher" value="{{$pied['nomAfficher']}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="link">Lien du site<sup class="text-danger">*</sup> </label>
                                    <input type="url" class="form-control" name="linkS" id="link" value="{{$pied['linkS']}}" required>
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
    @endforeach
    <!-- ------------------------------------------------------------------------------------------- ./Modal Update Liens Institutionnel -->

    <!-- ------------------------------------------------------------------------------------------------------------------------------- ./Modal Liens Institutionnel -->
    <!-- Modal Supprimer document -->
    @foreach($piedPages as $idCategorie => $piedPage)
    @foreach($piedPage as $pied)
    <div class="modal fade" id="modalDelete-{{$pied['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="piedpage">
            <div class="modal-content">
                <form action="/archive_pied" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title">SUPPRIMER LA DOCUMENTATION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label for="auteur">Souhaitez-vous supprimer le pied de page? <sup class="text-danger">*</sup> </label>
                                    <input type="hidden" name="id" value="{{$pied['id']}}">
                                    <input type="text" class="form-control text-danger" name="titre" id="titre" value="{{$pied['categorie']}}: {{$pied['nom']}}" readonly>
                                    <input type="hidden" name="categorie" value="{{$pied['idCategorie']}}">
                                    <input type="hidden" name="nom" value="{{$pied['nom']}}">
                                    <input type="hidden" name="nomAfficher" value="{{$pied['nomAfficher']}}">
                                    <input type="hidden" name="linkS" value="{{$pied['linkS']}}">
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
    <!-- /.Modal Supprimer document -->


    <!-- ------------------------------------------------------------------------------------------------------------------------------- Modal Liens utiles -->

    <!-- ------------------------------------------------------------------------------------------- Modal Ajout Liens utiles -->
    <div class="modal fade" id="modalAddLink" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">

                    <div class="modal-header">
                        <h3 class="modal-title"> AJOUT D'UN LIEN UTILE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label for="nom">Nom du détenteur du site <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Veuillez entrer le nom du détenteur du site" required>
                                </div>

                                <div class="form-group">
                                    <label for="nomAfficher">Nom à afficher <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nomAfficher" id="nomAfficher" placeholder="Veuillez entrer le nom à afficher" required>
                                </div>

                                <div class="form-group">
                                    <label for="link">Lien du site<sup class="text-danger">*</sup> </label>
                                    <input type="url" class="form-control" name="link" id="link" placeholder="Veuillez entrer le site" required>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Ajout Liens utiles -->

    <!-- ------------------------------------------------------------------------------------------- Modal Update Liens utiles -->
    <div class="modal fade" id="modalUpdateLink" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">

                    <div class="modal-header">
                        <h3 class="modal-title"> MODIFICATION D'UN LIEN UTILE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label for="nom">Nom du détenteur du site <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nom" id="nom" value="Lorem ipsum" required>
                                </div>

                                <div class="form-group">
                                    <label for="nomAfficher">Nom à afficher <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nomAfficher" id="nomAfficher" value="Lorem ipsum" required>
                                </div>

                                <div class="form-group">
                                    <label for="link">Lien du site<sup class="text-danger">*</sup> </label>
                                    <input type="url" class="form-control" name="link" id="link" value="Lorem ipsum" required>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="Modifier" class="btn btn-success">Modifier</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------- ./Modal Update Liens utiles -->

    <!-- ------------------------------------------------------------------------------------------------------------------------------- ./Modal Liens utiles -->



    <!-- ------------------------------------------------------------------------------------------------------------------------------- Modal Documentation du pied de page -->

    <!-- ------------------------------------------------------------------------------------------- Modal Ajout Documentation du pied de page -->
    <div class="modal fade" id="modalAddDocumentation" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">

                    <div class="modal-header">
                        <h3 class="modal-title"> AJOUT D'UNE DOCUMENTATION</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label for="nom">Nom du détenteur du site <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Veuillez entrer le nom du détenteur du site" required>
                                </div>

                                <div class="form-group">
                                    <label for="nomAfficher">Nom à afficher <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nomAfficher" id="nomAfficher" placeholder="Veuillez entrer le nom à afficher" required>
                                </div>

                                <div class="form-group">
                                    <label for="link">Lien du site<sup class="text-danger">*</sup> </label>
                                    <input type="url" class="form-control" name="link" id="link" placeholder="Veuillez entrer le site" required>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Ajout Documentation du pied de page -->

    <!-- ------------------------------------------------------------------------------------------- Modal Update Documentation du pied de page -->
    <div class="modal fade" id="modalUpdateDocumentation" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">

                    <div class="modal-header">
                        <h3 class="modal-title"> MODIFICATION D'UNE DOCUMENTATION</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label for="nom">Nom du détenteur du site <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nom" id="nom" value="Lorem ipsum" required>
                                </div>

                                <div class="form-group">
                                    <label for="nomAfficher">Nom à afficher <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="nomAfficher" id="nomAfficher" value="Lorem ipsum" required>
                                </div>

                                <div class="form-group">
                                    <label for="link">Lien du site<sup class="text-danger">*</sup> </label>
                                    <input type="url" class="form-control" name="link" id="link" value="Lorem ipsum" required>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="Modifier" class="btn btn-success">Modifier</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------- ./Modal Update Documentation du pied de page -->

    <!-- ------------------------------------------------------------------------------------------------------------------------------- ./Modal Documentation du pied de page -->



</div>

@endsection