@extends('admin.inc.head')
@section('content')
@include('admin.inc.aside');
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Documentations</h1>
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

        <!-- Traités -->
        @foreach($documents as $idCategorie => $document)
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                {{$document[0]['categorie']}}
                </h3>

                <div class="card-tools">
                    <!-- <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddTraite"> -->
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddDocumentation">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un Traité
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
                            <th>
                                Fichiers
                            </th>
                            <th width="60%">
                                Titre
                            </th>
                            <th>Date</th>
                            <th width="20%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($document as $document)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href="{{ asset(env('IMAGES_PATH')) }}/{{$document['fichier']}}">
                                    <img src="../assets/images/icon/pdf.png" alt="" width="50%">
                                </a>
                            </td>
                            <td width="60%">
                                {{ $document['titre'] }}
                            </td>
                            <td>
                                <p>{{ $document['date'] }}</p>
                            </td>
                            <td width="20%" class="text-center">
                                <a class="btn btn-primary btn-sm" href="{{ asset(env('IMAGES_PATH')) }}/{{$document['fichier']}}">
                                    <i class="fas fa-download">
                                    </i>
                                </a>
                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdate-{{ $document['id'] }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete-{{ $document['id'] }}">
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
         <hr class="bg-success w-50 my-5">
        @endforeach
        <!-- /.Traités -->

    

    </section>

    <!-- ------------------------------------------------------------------------------------------------------------------------------- Modal Traités-->

    <!-- ------------------------------------------------------------------------------------------- Modal Ajout Traités-->
    <div class="modal fade" id="modalAddDocumentation" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/documentation" method="POST" enctype="multipart/form-data">
                    @csrf

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
                                    <label>Titre <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrer le nom du titre" required>
                                </div>

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="categorie" id="categorie" value="Catégorie" required readonly>
                            
                                </div>
                                
                                <div class="form-group">
                                    <label>Type Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control" name="categorie" required>
                                        <option value="">Choix Type Categorie</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->titre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2023 </i>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Traité au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite" name="fichier" accept="Application/pdf" required>
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Ajout Traités-->

    <!-- ------------------------------------------------------------------------------------------- Modal Update Traités-->
    @foreach($documents as $idCategorie => $document)
    @foreach($document as $document)
    <div class="modal fade" id="modalUpdate-{{ $document['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/documentation" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h3 class="modal-title"> MODIFICATION DE LA DOCUMENTATION</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Titre <sup class="text-danger">*</sup> </label>
                                    <input type="hidden" name="id" value="{{ $document['id'] }}">
                                    <input type="text" class="form-control" name="titre" id="titre" value="{{ $document['titre'] }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control" name="categorie" required>
                                        <option value="{{ $document['idCategorie'] }}">{{ $document['categorie'] }}</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->titre}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> {{ $document['date'] }} </i>
                                        <input type="date" class="form-control" name="date" id="date" value="{{ $document['date'] }}">
                                </div>

                                <div class="form-group">
                                    <label for="traite">Traité au format PDF <sup class="text-danger">*</sup> <img src="../assets/images/icon/pdf.png" alt="ok" width="05%"></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite" name="fichier" accept="Application/pdf">
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Update Traités-->
    <!-- Modal Supprimer document -->
    @foreach($documents as $idCategorie => $document)
    @foreach($document as $document)
    <div class="modal fade" id="modalDelete-{{$document['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/archive_documentation" method="POST" enctype="multipart/form-data">
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
                                    <label for="auteur">Souhaitez-vous supprimer la documentation? <sup class="text-danger">*</sup> </label>
                                    <input type="hidden" name="id" value="{{$document['id']}}">
                                    <input type="text" class="form-control text-danger" name="titre" id="titre" value="{{$document['categorie']}}: {{$document['titre']}}" readonly>
                                    <input type="hidden" name="categorie" value="{{$document['idCategorie']}}">
                                    <input type="hidden" name="date" value="{{$document['date']}}">
                                    <input type="hidden" name="fichier" value="{{$document['fichier']}}">
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
    <!-- ------------------------------------------------------------------------------------------------------------------------------- ./Modal Traités-->


    <!-- ------------------------------------------------------------------------------------------------------------------------------- Modal Journaux Officiels-->

    <!-- ------------------------------------------------------------------------------------------- Modal Ajout Journal officiel-->
    <div class="modal fade" id="modalAddJournal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/documentation" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h3 class="modal-title"> AJOUT UN JOURNAL OFFICIEL</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Titre <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrer le nom du titre" required>
                                </div>

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control" name="categorie" required>
                                        <option value="Traités">Traités</option>
                                        <option value="Politique">Politique</option>
                                        <option value="Règlements">Règlements</option>
                                        <option value="Communiqués">Communiqués</option>
                                        <option value="Textes Juridiques">Textes Juridiques</option>
                                        <option value="Journaux Officiels">Journaux Officiels</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2023 </i>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Journal Officiel au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite" name="fichier" accept="Application/pdf" required>
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Ajout Journal officiel-->

    <!-- ------------------------------------------------------------------------------------------- Modal Update Journal officiel-->
    <div class="modal fade" id="modalUpdateJournal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">

                    <div class="modal-header">
                        <h3 class="modal-title"> MODIFICATION D'UN JOURNAL OFFICIEL</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control">
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Traité au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite">
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Update Journal officiel-->

    <!-- ------------------------------------------------------------------------------------------------------------------------------- ./Modal Journaux Officiels-->


    <!-- ------------------------------------------------------------------------------------------------------------------------------- Modal Communiqués-->

    <!-- ------------------------------------------------------------------------------------------- Modal Ajout Communiqués-->
    <div class="modal fade" id="modalAddCommunique" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/documentation" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title"> AJOUT UN COMMUNIQUÉ</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Titre <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrer le nom du titre" required>
                                </div>

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control" name="categorie" required>
                                        <option value="Traités">Traités</option>
                                        <option value="Politique">Politique</option>
                                        <option value="Règlements">Règlements</option>
                                        <option value="Communiqués">Communiqués</option>
                                        <option value="Textes Juridiques">Textes Juridiques</option>
                                        <option value="Journaux Officiels">Journaux Officiels</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2023 </i>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Communiqués au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite" name="fichier" accept="Application/pdf" required>
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Ajout Communiqués-->

    <!-- ------------------------------------------------------------------------------------------- Modal Update Communiqués-->
    <div class="modal fade" id="modalUpdateCommunique" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">

                    <div class="modal-header">
                        <h3 class="modal-title"> MODIFICATION D'UN COMMUNIQUÉ</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control">
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Traité au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite">
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Update Communiqués-->

    <!-- ------------------------------------------------------------------------------------------------------------------------------- ./Modal Communiqués-->


    <!-- ------------------------------------------------------------------------------------------------------------------------------- Modal Textes Juridique-->

    <!-- ------------------------------------------------------------------------------------------- Modal Ajout Textes Juridique-->
    <div class="modal fade" id="modalAddJuridique" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/documentation" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h3 class="modal-title"> AJOUT UN TEXTE JURIDIQUE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Titre <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrer le nom du titre" required>
                                </div>

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control" name="categorie" required>
                                        <option value="Traités">Traités</option>
                                        <option value="Politique">Politique</option>
                                        <option value="Règlements">Règlements</option>
                                        <option value="Communiqués">Communiqués</option>
                                        <option value="Textes Juridiques">Textes Juridiques</option>
                                        <option value="Journaux Officiels">Journaux Officiels</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2023 </i>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Texte Juridique au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite" name="fichier" accept="Application/pdf" required>
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Ajout Textes Juridique-->

    <!-- ------------------------------------------------------------------------------------------- Modal Update Textes Juridique-->
    <div class="modal fade" id="modalUpdateJuridique" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">

                    <div class="modal-header">
                        <h3 class="modal-title"> MODIFICATION D'UN TEXTE JURIDIQUE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control">
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Traité au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite">
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Update Textes Juridique-->

    <!-- ------------------------------------------------------------------------------------------------------------------------------- ./Modal Textes Juridique-->


    <!-- ------------------------------------------------------------------------------------------------------------------------------- Modal Politique-->

    <!-- ------------------------------------------------------------------------------------------- Modal Ajout Politique-->
    <div class="modal fade" id="modalAddPolitique" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/documentation" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h3 class="modal-title"> AJOUT UN POLITIQUE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Titre <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrer le nom du titre" required>
                                </div>

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control" name="categorie" required>
                                        <option value="Traités">Traités</option>
                                        <option value="Politique">Politique</option>
                                        <option value="Règlements">Règlements</option>
                                        <option value="Communiqués">Communiqués</option>
                                        <option value="Textes Juridiques">Textes Juridiques</option>
                                        <option value="Journaux Officiels">Journaux Officiels</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2023 </i>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Politique au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite" name="fichier" accept="Application/pdf" required>
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Ajout Politique-->

    <!-- ------------------------------------------------------------------------------------------- Modal Update Politique-->
    <div class="modal fade" id="modalUpdatePolitique" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">

                    <div class="modal-header">
                        <h3 class="modal-title"> MODIFICATION D'UN POLITIQUE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control">
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Traité au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite">
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Update Politique-->

    <!-- ------------------------------------------------------------------------------------------------------------------------------- ./Modal Politique-->


    <!-- ------------------------------------------------------------------------------------------------------------------------------- Modal Réglements-->

    <!-- ------------------------------------------------------------------------------------------- Modal Ajout Réglements-->
    <div class="modal fade" id="modalAddReglement" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/documentation" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h3 class="modal-title"> AJOUT D'UN RÈGLEMENT</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Titre <sup class="text-danger">*</sup> </label>
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrer le nom du titre" required>
                                </div>

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control" name="categorie" required>
                                        <option value="Traités">Traités</option>
                                        <option value="Politique">Politique</option>
                                        <option value="Règlements">Règlements</option>
                                        <option value="Communiqués">Communiqués</option>
                                        <option value="Textes Juridiques">Textes Juridiques</option>
                                        <option value="Journaux Officiels">Journaux Officiels</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2023 </i>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Règlements au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite" name="fichier" accept="Application/pdf" required>
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Ajout Réglements-->

    <!-- ------------------------------------------------------------------------------------------- Modal Update Réglements-->
    <div class="modal fade" id="modalUpdateReglement" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">

                    <div class="modal-header">
                        <h3 class="modal-title"> MODIFICATION D'UN RÈGLEMENT</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="shadow p-4">

                                <div class="form-group">
                                    <label>Catégorie <sup class="text-danger">*</sup> </label>
                                    <select class="form-control">
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                        <option value="lorem">lorem</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="traite">Traité au format PDF <sup class="text-danger">*</sup> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="traite">
                                        <label class="custom-file-label" for="traite">Choississez le fichier</label>
                                    </div>
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
    <!-- ------------------------------------------------------------------------------------------- ./Modal Update Réglements-->

    <!-- ------------------------------------------------------------------------------------------------------------------------------- ./Modal Réglements-->

</div>

@endsection