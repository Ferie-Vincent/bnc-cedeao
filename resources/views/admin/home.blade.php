@extends('admin.inc.head')
<?php $page="home" ; ?>
@section('content')

@include('admin.inc.aside');
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1>Tableau de bord</h1>

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

  <!-- Main content -->
  <section class="content">

    <!-- Actualités -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ACTUALITÉS</h3>

        <div class="card-tools">
          <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddArticle1">
            <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter une actualité 
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>

      </div>

      <div class="card-body p-0">

        <table class="table table-striped projects" aria-describedby="">
          <thead>
            <tr>
              <th style="width: 1%">
                N°
              </th>
              <th style="width: 20%">
                Titre
              </th>
              <th style="width: 8%">
                Date
              </th>
              <th style="width: 35%">
                Contenu
              </th>
              <th style="width: 10%">
                Auteur
              </th>
              <th style="width: 5%" class="text-center">
                Status
              </th>
              <th style="width: 15%" class="text-center">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($actualites as $key=>$actualite)
            <tr>
              <td>
                {{$key +1}}
              </td>
              <td>
                {!! Str::limit($actualite['title'], 45) !!}
              </td>
              <td>
                {{$actualite['date']}}
              </td>
              <td>
                {!! Str::limit($actualite['corpsTexte'], 200) !!}
              </td>
              <td class="project_progress">
                {{$actualite['auteur']}}
              </td>
              <td class="text-center">
                <span class="badge badge-success">Publié</span>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalArticle1-{{$actualite['id']}}">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateArticle1-{{$actualite['id']}}">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDeleteArticle1-{{$actualite['id']}}">
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
            {{ $actualites->links('pagination::bootstrap-4') }}

          </li>
        </ul>
      </div>
    </div>
    <!-- /.Actualités -->

    <hr class="bg-success w-50 my-5">

    <!-- Flash Infos -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">FLASH-INFOS</h3>

        <div class="card-tools">
          <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddFlash">
            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un flash info
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>

      </div>
      <div class="card-body p-0">

        <table class="table table-striped projects" aria-describedby="">
          <thead>
            <tr>
              <th style="width: 1%">
                N°
              </th>
              <th style="width: 10%">
                Type
              </th>
              <th>
                Contenu
              </th>
              <th style="width: 8%">
                Date
              </th>
              <th style="width: 15%" class="text-center">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($flashInfos as $key=>$flash)
            <tr>
              <td>
                {{$key +1}}
              </td>
              <td>

                <span class="badge badge-danger" style="background-color: '{{$flash['couleur']}}; padding: 3px; color:#fff">{{$flash['type']}}</span>

              </td>
              <td>
              {{ Str::limit(strip_tags($flash['corpsTexte']), 200) }}
              </td>
              <td>
                {{$flash['date']}}
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalFlash1-{{$flash['id']}}">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateFlash1-{{$flash['id']}}">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDeleteFlash1-{{$flash['id']}}">
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
    <!-- /.Flash Infos -->

    <hr class="bg-success w-50 my-5">

    <!-- La Côte d'Ivoire -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">LA CÔTE D'IVOIRE</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>

      </div>
      <div class="card-body p-0">

        <table class="table table-striped projects" aria-describedby="">
          <thead>
            <tr>
              <th style="width: 10%">
                P.R
              </th>
              <th style="width: 15%">
                Ministère de Tutelle
              </th>
              <th style="width: 15%">
                Chef BNC
              </th>
              <th style="width: 15%">
                R.P à la CEDEAO
              </th>
              <th style="width: 15%">
                R.R en Côte d'Ivoire
              </th>
              <th>
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($coteIvoires as $coteIvoire)
            <tr>
              <td>
                {{ $coteIvoire['chefGouvernement'] }}
              </td>
              <td>
                {{ $coteIvoire['ministery'] }}
              </td>
              <td>
                {{ $coteIvoire['managerBnc'] }}
              </td>
              <td>
                {{ $coteIvoire['outCedeao'] }}
              </td>
              <td>
                {{ $coteIvoire['inCedeao'] }}
              </td>
              <td style="width: 10%;">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalInformation-{{$coteIvoire['id']}}">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateInformation1-{{$coteIvoire['id']}}">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDeleteInformation1-{{$coteIvoire['id']}}">
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
    <!-- /.La Côte d'Ivoire -->

    <hr class="bg-success w-50 my-5">

    <!-- Avis de publication -->
    <div class="card">

      <div class="card-header">
        <h3 class="card-title">AVIS DE PUBLICATION</h3>

        <div class="card-tools">
          <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAddAvisPublication">
            <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un avis de publication
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>

      </div>

      <div class="card-body p-0">
        <table class="table table-striped projects" aria-describedby="">
          <thead>
            <tr>
              <th style="width: 1%">
                N°
              </th>
              <th style="width: 20%">
                Titre
              </th>
              <th style="width: 8%">
                Date
              </th>
              <th style="width: 35%">
                Contenu
              </th>
              <th style="width: 5%" class="text-center">
                fichier rattaché
              </th>
              <th style="width: 15%" class="text-center">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($avisPublications as $key => $avis)
            <tr>
              <td>
                {{$key + 1}}
              </td>
              <td>
                {{$avis['titre']}}
              </td>
              <td>
                {{$avis['date']}}
              </td>
              <td>
                <!--{!! Str::limit($avis['contenu'], 100) !!}-->
                {{ Str::limit(strip_tags($avis['contenu']), 50, '...') }}
              </td>
              <td class="text-center">
                <a href="/storage/app/public/uploads/{{$avis['fichierPDF'] }}">
                  <img src="../assets/images/icon/pdf.png" alt="AVIS DE PUBLICATION" width="50%">
                </a>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#avisDePublication-{{ $avis['id'] }}">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateAvisPublication-{{ $avis['id'] }}">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDeleteAvisPublication-{{ $avis['id'] }}">
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
            {{ $avisPublications->links('pagination::bootstrap-4') }}
          </li>
        </ul>
      </div>
    </div>
    <!-- /.Avis de publication -->


    <hr class="bg-success w-50 my-5">

    <!-- Appel Offre -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">APPEL D'OFFRES</h3>

        <div class="card-tools">
          <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#addAppelOffres">
            <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un appel d'offres
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>

      </div>

      <div class="card-body p-0">
        <table class="table table-striped projects" aria-describedby="">
          <thead>
            <tr>
              <th style="width: 1%">
                N°
              </th>
              <th style="width: 20%">
                Titre
              </th>
              <th style="width: 8%">
                Date
              </th>
              <th style="width: 35%">
                Contenu
              </th>
              <th style="width: 5%" class="text-center">
                fichier rattaché
              </th>
              <th style="width: 15%" class="text-center">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($appelOffres as $key => $offre)
            <tr>
              <td>
                {{$key + 1}}
              </td>
              <td>
                {{$offre['titre']}}
              </td>
              <td>
                {{$offre['date']}}
              </td>
              <td>
                {!! Str::limit($offre['contenu'], 100) !!}
              </td>
              <td class="text-center">
                <a href="{{ asset(env('IMAGE_PATH')) }}/{{$offre['fichierPDF'] }}">
                  <img src="../assets/images/icon/pdf.png" alt="APPEL D'OFFRES" width="50%">
                </a>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#appelOffres-{{ $offre['id'] }}">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#UpdateAppelOffres-{{ $offre['id'] }}">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteAppelOffres-{{ $offre['id'] }}">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>
            <div class="card-footer clearfix">

            </div>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item">
            {{ $appelOffres->links('pagination::bootstrap-4') }}
          </li>
        </ul>
      </div>
    </div>
    <!-- /.Appel Offre -->

    <hr class="bg-success w-50 my-5">

    <!-- RECRUTEMENT CEDEAO -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">RECRUTEMENT CEDEAO</h3>

        <div class="card-tools">
          <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#addEmplois">
            <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un emploi
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>

      </div>

      <div class="card-body p-0">
        <table class="table table-striped projects" aria-describedby="">
          <thead>
            <tr>
              <th style="width: 1%">
                N°
              </th>
              <th style="width: 20%">
                Titre de l'emploi
              </th>
              <th style="width: 8%">
                Date de fin de l'offre
              </th>
              <th style="width: 35%">
                Contenu
              </th>
              <th style="width: 5%" class="text-center">
                Lien de l'emploi
              </th>
              <th style="width: 15%" class="text-center">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($recrutements as $key => $recrutement)
            <tr>
              <td>
                {{$key + 1}}
              </td>
              <td>
                {{$recrutement['titre']}}
              </td>
              <td>
                {{$recrutement['date']}}
              </td>
              <td>
                {!! Str::limit($recrutement['contenu'], 200) !!}
              </td>
              <td class="text-center">
                <a href="{{$recrutement['links']}}">
                  {{$recrutement['links']}}
                </a>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateEmplois-{{$recrutement['id']}}">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteEmplois-{{$recrutement['id']}}">
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
            {{ $recrutements->links('pagination::bootstrap-4') }}
          </li>
        </ul>
      </div>
    </div>
    <!-- /.RECRUTEMENT CEDEAO -->

    <hr class="bg-success w-50 my-5">

    <!-- ÉVÈNEMENT À VENIR -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ÉVÈNEMENT À VENIR</h3>

        <div class="card-tools">
          <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#addEvenement">
            <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un évènement
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>

      </div>

      <div class="card-body p-0">
        <table class="table table-striped projects" aria-describedby="">
          <thead>
            <tr>
              <th style="width: 1%">
                N°
              </th>
              <th style="width: 20%">
                Titre de l'évènement
              </th>
              <th style="width: 20%">
                Libellé
              </th>
              <th style="width: 8%">
                Date à afficher
              </th>
              <th style="width: 5%" class="text-center">
                Lien de l'évènement
              </th>
              <th style="width: 15%" class="text-center">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($evens as $key => $even)
            <tr>
              <td>
                {{$key + 1}}
              </td>
              <td>
                {{$even['titre']}}
              </td>
              <td>
                {{$even['libele']}}
              </td>
              <td class="text-center">
                {{$even['date']}}
              </td>
              <td class="text-center">
                <a href="{{$even['links']}}">
                  {{$even['links']}}
                </a>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#afficheEvenement-{{$even['id']}}">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateEvenement-{{$even['id']}}">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEvenement-{{$even['id']}}">
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
            {{ $evens->links('pagination::bootstrap-4') }}
          </li>
        </ul>
      </div>
    </div>
    <!-- /.ÉVÈNEMENT À VENIR -->

    <hr class="bg-success w-50 my-5">

    <!-- LE MAGAZINE DE LA CEDEAO -->
    <div class="card">

      <div class="card-header">
        <h3 class="card-title">LE MAGAZINE DE LA CEDEAO</h3>

        <div class="card-tools">
          <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#addMagazine">
            <i class="fa fa-plus mr-2" aria-hidden="true"></i> Ajouter un magazine
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>

      </div>

      <div class="card-body p-0">
        <table class="table table-striped projects" aria-describedby="">
          <thead>
            <tr>
              <th style="width: 1%">
                N°
              </th>
              <th style="width: 20%">
                Titre
              </th>
              <th style="width: 8%">
                Date
              </th>
              <th style="width: 35%">
                Contenu
              </th>
              <th style="width: 5%" class="text-center">
                fichier rattaché
              </th>
              <th style="width: 15%" class="text-center">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($magazines as $key => $magazine)
            <tr>
              <td>
                {{$key + 1}}
              </td>
              <td>
                {{$magazine['titre']}}
              </td>
              <td>
                {{$magazine['date']}}
              </td>
              <td>
                {!! Str::limit($magazine['contenu'], 200) !!}
              </td>
              <td class="text-center">
                <a href="{{ asset(env('IMAGE_PATH')) }}/{{$magazine['fichierPDF'] }}">
                  <img src="../assets/images/icon/pdf.png" alt="" width="50%">
                </a>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#appelMagazine-{{$magazine['id']}}">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateMagazine-{{$magazine['id']}}">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteMagazine-{{$magazine['id']}}">
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
            {{ $magazines->links('pagination::bootstrap-4') }}
          </li>
        </ul>
      </div>
    </div>
    <!-- /.LE MAGAZINE DE LA CEDEAO -->

  </section>

  <!-- /.content -->


  <!-- ------------------------------------------------------------------------------------------- Modal Ajout article -->
  <div class="modal fade" id="modalAddArticle1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/actualite" method="POST" enctype="multipart/form-data">
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
                  <label for="auteur">Auteur <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="auteur" id="auteur" placeholder="Veuillez entrez le nom et prénom de l'auteur" required>
                </div>

                <div class="form-group">
                  <label for="title">Appel de titre de l'article <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="appelTitre" id="appelTitre" placeholder="Veuillez entrez l'appel de titre" required>
                </div>

                <div class="form-group">
                  <label for="title">Titre de l'article <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Veuillez entrez le titre" required>
                </div>

                <div class="form-group">
                  <label for="legende">Légende <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="legende" id="legende" placeholder="Veuillez entrer la légende" required>
                </div>

                <div class="form-group">
                  <label for="chapeau">Chapeau <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="chapeau" id="chapeau" placeholder="Veuillez le chapeau" required>
                </div>

                <div class="form-group">
                  <label for="">Corps du texte</label>
                  <textarea name="corpsTexte" id="summernote" rows="20">
                  Veuillez entrez votre texte ici
                        </textarea>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="tags">Tags</label>
                  <select class="form-control" name="tags" required>
                    <option selected="" disabled="">Choix Tags</option>
                    @foreach($tags as $tag)
                    <option value="{{$tag['id'] }}">{{$tag['name'] }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="image">Image <sup class="text-danger">*</sup> <span class="text-danger">(1140x670)</span></label>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" accept="image/*,.png,.jpg,.jpeg,.gif">
                    <label class="custom-file-label" for="inputGroupFile01">Choississez une image</label>
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
  <!-- /.Modal Ajout article -->

  <!-- Modal Affiche l'article -->
  @foreach($actualites as $actualite)
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="modalArticle1-{{$actualite['id']}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-top: 0px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="{{ asset(env('IMAGE_PATH')) }}/{{$actualite['image']}}" alt="" class="img-fluid rounded shadow" style="margin-top: -10%; z-index: 999; max-width: 300px!important; height: auto;">
            <!-- <img src="{{ asset(env('IMAGE_PATH')) }}/{{$actualite['image']}}" alt="" class="img-fluid rounded shadow" style="margin-top: -10%; z-index: 999" width="400px!important" height="400!important"> -->
            <!-- <img src="{{asset('storage/actualites/' . $actualite['image'])}}" alt="" class="img-fluid rounded shadow" style="margin-top: -10%; z-index: 999" width="500"> -->

            <hr class="w-50 my-4">

            <h3>
              {{$actualite['title']}}
            </h3>

            <p class="text-justify mt-3">
              {!! $actualite['corpsTexte'] !!}
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{$actualite['date']}}
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

  <!-- Modal Modifie article -->
  @foreach($actualites as $actualite)
  <div class="modal fade" id="modalUpdateArticle1-{{$actualite['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/actualite" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title">Modification de l'article 2</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="auteur">Auteur <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$actualite['id']}}">
                  <input type="text" class="form-control" name="auteur" id="auteur" value="{{$actualite['auteur']}}" required>
                </div>

                <div class="form-group">
                  <label for="title">Appel de titre de l'article <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="appelTitre" id="appelTitre" value="{{$actualite['appelTitre']}}" required>
                </div>

                <div class="form-group">
                  <label for="title">Titre de l'article <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="title" id="title" value="{{$actualite['title']}}" required>
                </div>

                <div class="form-group">
                  <label for="legende">Légende <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="legende" id="legende" value="{{$actualite['legende']}}" required>
                </div>

                <div class="form-group">
                  <label for="chapeau">Chapeau <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="chapeau" id="chapeau" value="{{$actualite['chapeau']}}" required>
                </div>

                <div class="form-group">
                  <label for="corpsTexte">Corps du texte</label>
                  <textarea class="form-control text-left" name="corpsTexte" id="summernote-{{$actualite['id']}}" rows="5">{!! $actualite['corpsTexte'] !!}</textarea>
                  <!-- <textarea class="form-control text-left" name="corpsTexte" id="summernote" rows="5">{!! $actualite['corpsTexte'] !!}</textarea> -->
                </div>


                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> {{$actualite['date']}} </i>
                    <input type="text" class="form-control" name="date" id="date" value="{{$actualite['date']}}" required>
                </div>

                <div class="form-group">
                  <label for="tags">Tags</label>
                  <select class="form-control" name="tags" required>
                    @if($actualite['id_tags'] == $tag['id'])
                    <option value="{{$actualite['id_tags']}}">{{$tag['name'] }}</option>
                    @endif
                    @foreach($tags as $tag)
                    <option value="{{$tag['id'] }}">{{$tag['name'] }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="image">Image <sup class="text-danger">*</sup> <img src="{{ asset(env('IMAGE_PATH')) }}/{{$actualite['image']}}" alt="ok" width="05%"></label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" accept="image/*,.png,.jpg,.jpeg,.gif">
                    <label class="custom-file-label" for="image">Choississez une image</label>
                  </div>
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
  <!-- /.Modal modifie article -->

  <!-- Modal Supprimer article -->
  @foreach($actualites as $actualite)
  <div class="modal fade" id="modalDeleteArticle1-{{$actualite['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/archive_actualite" method="POST" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h5 class="modal-title">Supprimer l'article</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="auteur">Souhaitez-vous supprimer l'article? <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$actualite['id']}}">
                  <input type="text" class="form-control text-danger" name="title" id="auteur" value="{{$actualite['title']}}" readonly>
                  <input type="hidden" name="appelTitre" value="{{$actualite['appelTitre']}}">
                  <input type="hidden" name="auteur" value="{{$actualite['auteur']}}">
                  <input type="hidden" name="legende" value="{{$actualite['legende']}}">
                  <input type="hidden" name="chapeau" value="{{$actualite['chapeau']}}">
                  <input type="hidden" name="corpsTexte" value="{{$actualite['corpsTexte']}}">
                  <input type="hidden" name="date" value="{{$actualite['date']}}">
                  <input type="hidden" name="image" value="{{$actualite['image']}}">
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
  <!-- /.Modal Supprimer article -->


  <!-- ------------------------------------------------------------------------------------------- Modal Ajout flash Infos -->
  <div class="modal fade" id="modalAddFlash" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <form action="/flash_infos" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="modal-header">
            <h3 class="modal-title"> AJOUT DE FLASH INFOS</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">

              <div class="shadow p-4 rounded">

                <div class="form-group">
                  <label for="type">Type <sup class="text-danger">*</sup> </label>
                  <select class="form-control" name="type" id="type" required>
                    <option value="">Choix du type</option>
                    @foreach( $typeFlashInfos as $typeFlashInfo)
                    <option value="{{$typeFlashInfo['id']}}">{{$typeFlashInfo['titre']}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="corpsTexte">Corps du texte</label>
                  <textarea class="form-control" name="corpsTexte" id="corpsTexte" rows="5" placeholder="Veuillez entrez votre texte ici">Veuillez entrez votre texte ici</textarea>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2023 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
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
  <!-- /.Modal pour l'image -->

  <!-- Modal Affiche flash -->
  @foreach($flashInfos as $key=>$flash)
  <div class="modal fade" id="modalFlash1-{{$flash['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h3 class="modal-title"> FLASH INFOS N° {{$key +1}}</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <span class="mb-4" style="background-color: {{$flash['couleur']}}; padding: 3px; color:#fff">
            {{$flash['type']}}
          </span>
          <p>
            {!! $flash['corpsTexte'] !!}
          </p>
          <p class="text-left mt-4 secondary">
            <sub>
              <i>
                <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{$flash['date']}}
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
  <!-- /.Modal Affiche flash -->

  <!-- Modal Modifie flash -->
  @foreach($flashInfos as $key=>$flash)
  <div class="modal fade" id="modalUpdateFlash1-{{$flash['id']}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <form action="/flash_infos" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h3 class="modal-title"> MODIFIER FLASH INFOS</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">

              <div class="shadow p-4 rounded">

                <div class="form-group">
                  <label for="type">Type <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$flash['id']}}">
                  <select class="form-control" name="type" id="type">
                    <option value="{{$flash['idType']}}" >{{$flash['type']}}</option>
                    @foreach( $typeFlashInfos as $typeFlashInfo)
                    <option value="{{$typeFlashInfo['id']}}">{{$typeFlashInfo['titre']}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Corps du texte</label>
                  <textarea class="form-control" name="corpsTexte" id="corpsTexte-{{$flash['id']}}" rows="5">{{$flash['corpsTexte']}}</textarea>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2023 </i>
                    <input type="text" class="form-control" name="date" id="date" value="{{$flash['date']}}" required>
                </div>

              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            <button type="Ajouter" class="btn btn-success">Modifier</button>
          </div>

        </form>

      </div>
    </div>
  </div>
  @endforeach
  <!-- /.Modal modifie flash -->

  <!-- Modal Supprimer flash -->
  @foreach($flashInfos as $flash)
  <div class="modal fade" id="modalDeleteFlash1-{{$flash['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/archive_flash_infos" method="POST" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h5 class="modal-title">SUPPRIMER FLASH</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="auteur">Souhaitez-vous supprimer le flash? <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$flash['id']}}">
                  <input type="hidden" name="type" value="{{$flash['type']}}">
                  <input type="text" class="form-control text-danger" name="corpsTexte" id="type" value="{{$flash['corpsTexte']}}" readonly>
                  <input type="hidden" name="date" value="{{$flash['date']}}">
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
  <!-- /.Modal Supprimer flash -->


  <!-- ------------------------------------------------------------------------------------------- Modal Affiche Informations -->
  @foreach($coteIvoires as $coteIvoire)
  <div class="modal fade" id="modalInformation-{{$coteIvoire['id']}}" tabindex="-1" role="dialog" aria-labelledby="model" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

          <div class="modal-header">
            <h5 class="modal-title">LA CÔTE D'IVOIRE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div id="accordianId" role="tablist" aria-multiselectable="true">

              <div class="card">
                <div class="card-header" role="tab" id="section1HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                      INFORMATION DE BASE
                    </a>
                  </h5>
                </div>

                <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th>Chef de Gouvernement</th>
                          <td>{{ $coteIvoire['chefGouvernement'] }}</td>
                        </tr>
                        <tr>
                          <th>Gouvernement</th>
                          <td>{{ $coteIvoire['gouvernement'] }}</td>
                        </tr>
                        <tr>
                          <th>Capitale Politique</th>
                          <td>{{ $coteIvoire['capitalePolitique'] }}</td>
                        </tr>
                        <tr>
                          <th>Superficie</th>
                          <td>{{ $coteIvoire['superficie'] }} <sup>2</sup> </td>
                        </tr>
                        <tr>
                          <th>Population</th>
                          <td>{{ $coteIvoire['population'] }}</td>
                        </tr>
                        <tr>
                          <th>Indépendance</th>
                          <td>{{ $coteIvoire['independanceDay'] }}</td>
                        </tr>
                        <tr>
                          <th>Langue officielle</th>
                          <td>{{ $coteIvoire['langOfficielle'] }}</td>
                        </tr>
                        <tr>
                          <th>Langue la plus parlé</th>
                          <td>{{ $coteIvoire['langParle'] }}</td>
                        </tr>
                        <tr>
                          <th>Espérance de vie</th>
                          <td>{{ $coteIvoire['esperanceVie'] }}</td>
                        </tr>
                        <tr>
                          <th>PIP par habitant</th>
                          <td>{{ $coteIvoire['pipHabitant'] }}</td>
                        </tr>
                        <tr>
                          <th>Taux de croissance annuel</th>
                          <td>{{ $coteIvoire['tauxCroissanceAnnuel'] }}</td>
                        </tr>
                        <tr>
                          <th>Monnaie</th>
                          <td>{{ $coteIvoire['monnaie'] }}</td>
                        </tr>
                        <tr>
                          <th>Indice de développement humain</th>
                          <td>{{ $coteIvoire['indiceDeveHumain'] }}</td>
                        </tr>
                        <tr>
                          <th>Fuseau horaire</th>
                          <td>{{ $coteIvoire['fuseauHoraire'] }}</td>
                        </tr>
                        <tr>
                          <th>Liens du gouvernement officiel</th>
                          <td>
                            <a href="{{ $coteIvoire['websiteGouvernement'] }}">
                              {{ $coteIvoire['websiteGouvernement'] }}
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              <div class="card">
                <div class="card-header" role="tab" id="section2HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true" aria-controls="section2ContentId">
                      MINISTÈRE DE TUTELLE
                    </a>
                  </h5>
                </div>

                <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th>Nom du Ministère</th>
                          <td>{{ $coteIvoire['ministery'] }}</td>
                        </tr>
                        <tr>
                          <th>Nom du Ministre</th>
                          <td>{{ $coteIvoire['ministerName'] }}</td>
                        </tr>
                        <tr>
                          <th>Addresse</th>
                          <td>{{ $coteIvoire['ministerAdress'] }}</td>
                        </tr>
                        <tr>
                          <th>Telehone</th>
                          <td>{{ $coteIvoire['ministerTel'] }}</td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>{{ $coteIvoire['ministerFax'] }}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>{{ $coteIvoire['ministerEmail'] }}</td>
                        </tr>
                        <tr>
                          <th>Site Web</th>
                          <td>
                            <a href="{{ $coteIvoire['ministerOfficialWebsite'] }}">
                              {{ $coteIvoire['ministerOfficialWebsite'] }}
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" role="tab" id="section2HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section3ContentId" aria-expanded="true" aria-controls="section3ContentId">
                      BUREAU NATIONAL DE LA CEDEAO
                    </a>
                  </h5>
                </div>

                <div id="section3ContentId" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th>Nom du chef de bureau</th>
                          <td>{{ $coteIvoire['managerBnc'] }}</td>
                        </tr>
                        <tr>
                          <th>Fonction</th>
                          <td>{{ $coteIvoire['managerBncFunction'] }}</td>
                        </tr>
                        <tr>
                          <th>Telephone</th>
                          <td>{{ $coteIvoire['managerBncTel'] }}</td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>{{ $coteIvoire['managerBncFax'] }}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>{{ $coteIvoire['managerBncEmail'] }}</td>
                        </tr>
                        <tr>
                          <th>Site web</th>
                          <td>
                            <a href="{{ $coteIvoire['managerBncOfficialWebsite'] }}">
                              {{ $coteIvoire['managerBncOfficialWebsite'] }}
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" role="tab" id="section2HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section4ContentId" aria-expanded="true" aria-controls="section4ContentId">
                      REPRÉSENTANT PERMANENT AUPRÈS DE LA CEDEAO
                    </a>
                  </h5>
                </div>

                <div id="section4ContentId" class="collapse in" role="tabpanel" aria-labelledby="section4HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th>Nom du représentant permanent</th>
                          <td>{{ $coteIvoire['outCedeao'] }}</td>
                        </tr>
                        <tr>
                          <th>Addresse</th>
                          <td>{{ $coteIvoire['outCedeaoAdresse'] }}</td>
                        </tr>
                        <tr>
                          <th>Telehone</th>
                          <td>{{ $coteIvoire['outCedeaoTel'] }}</td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>{{ $coteIvoire['outCedeaoFax'] }}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>{{ $coteIvoire['outCedeaoMail'] }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" role="tab" id="section5HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section5ContentId" aria-expanded="true" aria-controls="section4ContentId">
                      REPRÉSENTANT RÉSIDENT EN CÔTE D'IVOIRE
                    </a>
                  </h5>
                </div>

                <div id="section5ContentId" class="collapse in" role="tabpanel" aria-labelledby="section5HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th>Nom</th>
                          <td>{{ $coteIvoire['inCedeao'] }}</td>
                        </tr>
                        <tr>
                          <th>Addresse</th>
                          <td>{{ $coteIvoire['inCedeaoAdresse'] }}</td>
                        </tr>

                        <tr>
                          <th>Email</th>
                          <td>{{ $coteIvoire['inCedeaoMail'] }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            <!-- <button type="button" class="btn btn-primary">Enregistrer</button> -->
          </div>

        </form>
      </div>
    </div>
  </div>
  @endforeach
  <!-- /.Modal Affiche Informations -->

  <!-- Modal modifie Informations -->
  @foreach($coteIvoires as $coteIvoire)
  <div class="modal fade" id="modalUpdateInformation1-{{$coteIvoire['id']}}" tabindex="-1" role="dialog" aria-labelledby="model" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/cote_ivoire" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="modal-header">
            <h5 class="modal-title">MODIFICATION LA CÔTE D'IVOIRE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div id="accordianId" role="tablist" aria-multiselectable="true">

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                  <div class="card-header bg-success" role="tab" id="section1HeaderId">
                    <h5 class="mb-0 text-white">
                      INFORMATION DE BASE
                    </h5>
                  </div>
                </a>

                <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th class="w-25">Chef de Gouvernement</th>
                          <td>
                            <input type="hidden" name="id" value="{{$coteIvoire['id']}}">
                            <input type="text" class="form-control" name="chefGouvernement" id="" value="{{$coteIvoire['chefGouvernement']}}">
                          </td>
                        </tr>
                        <tr>
                          <th class="w-25">Gouvernement</th>
                          <td>
                            <input type="text" class="form-control" name="gouvernement" id="" value="{{$coteIvoire['gouvernement']}}">
                          </td>
                        </tr>
                        <tr>
                          <th class="w-25">Capitale Politique</th>
                          <td>
                            <input type="text" class="form-control" name="capitalePolitique" id="" value="{{$coteIvoire['capitalePolitique']}}">
                          </td>
                        </tr>
                        <tr>
                          <th class="w-25">Superficie</th>
                          <td>
                            <input type="text" class="form-control" name="superficie" id="" value="{{$coteIvoire['superficie']}}">
                          </td>
                        </tr>
                        <tr>
                          <th class="w-25">Population</th>
                          <td>
                            <input type="text" class="form-control" name="population" id="" value="{{$coteIvoire['population']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Indépendance</th>
                          <td>
                            <input type="text" class="form-control" name="independanceDay" id="" value="{{$coteIvoire['independanceDay']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Langue officielle</th>
                          <td>
                            <input type="text" class="form-control" name="langOfficielle" id="" value="{{$coteIvoire['langOfficielle']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Langue la plus parlé</th>
                          <td>
                            <input type="text" class="form-control" name="langParle" id="" value="{{$coteIvoire['langParle']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Espérance de vie</th>
                          <td>
                            <input type="text" class="form-control" name="esperanceVie" id="" value="{{$coteIvoire['esperanceVie']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>PIP par habitant</th>
                          <td>
                            <input type="text" class="form-control" name="pipHabitant" id="" value="{{$coteIvoire['pipHabitant']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Taux de croissance annuel</th>
                          <td>
                            <input type="text" class="form-control" name="tauxCroissanceAnnuel" id="" value="{{$coteIvoire['tauxCroissanceAnnuel']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Monnaie</th>
                          <td>
                            <input type="text" class="form-control" name="monnaie" id="" value="{{$coteIvoire['monnaie']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Indice de développement humain</th>
                          <td>
                            <input type="text" class="form-control" name="indiceDeveHumain" id="" value="{{$coteIvoire['indiceDeveHumain']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Fuseau horaire</th>
                          <td>
                            <input type="text" class="form-control" name="fuseauHoraire" id="" value="{{$coteIvoire['fuseauHoraire']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Liens du gouvernement officiel</th>
                          <td>
                            <input type="text" class="form-control" name="websiteGouvernement" id="" value="{{$coteIvoire['websiteGouvernement']}}">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true" aria-controls="section2ContentId">
                  <div class="card-header bg-success" role="tab" id="section2HeaderId">
                    <h5 class="mb-0 text-white">
                      MINISTÈRE DE TUTELLE
                    </h5>
                  </div>
                </a>

                <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th class="w-25">Nom du Ministère</th>
                          <td>
                            <input type="text" class="form-control" name="ministery" id="" value="{{$coteIvoire['ministery']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Nom du Ministre</th>
                          <td>
                            <input type="text" class="form-control" name="ministerName" id="" value="{{$coteIvoire['ministerName']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Addresse</th>
                          <td>
                            <input type="text" class="form-control" name="ministerAdress" id="" value="{{$coteIvoire['ministerAdress']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Telehone</th>
                          <td>
                            <input type="text" class="form-control" name="ministerTel" id="" value="{{$coteIvoire['ministerTel']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>
                            <input type="text" class="form-control" name="ministerFax" id="" value="{{$coteIvoire['ministerFax']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>
                            <input type="text" class="form-control" name="ministerEmail" id="" value="{{$coteIvoire['ministerEmail']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Site Web</th>
                          <td>
                            <input type="text" class="form-control" name="ministerOfficialWebsite" id="" value="{{$coteIvoire['ministerOfficialWebsite']}}">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section3ContentId" aria-expanded="true" aria-controls="section3ContentId">
                  <div class="card-header bg-success" role="tab" id="section3HeaderId">
                    <h5 class="mb-0 text-white">
                      BUREAU NATIONAL DE LA CEDEAO
                    </h5>
                  </div>
                </a>

                <div id="section3ContentId" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th class="w-25">Nom du chef de bureau</th>
                          <td>
                            <input type="text" class="form-control" name="managerBnc" id="" value="{{$coteIvoire['managerBnc']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Fonction</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncFunction" id="" value="{{$coteIvoire['managerBncFunction']}}">

                          </td>
                        </tr>
                        <tr>
                          <th>Telephone</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncTel" id="" value="{{$coteIvoire['managerBncTel']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncFax" id="" value="{{$coteIvoire['managerBncFax']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncEmail" id="" value="{{$coteIvoire['managerBncEmail']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Site web</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncOfficialWebsite" id="" value="{{$coteIvoire['managerBncOfficialWebsite']}}">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section4ContentId" aria-expanded="true" aria-controls="section4ContentId">
                  <div class="card-header bg-success" role="tab" id="section2HeaderId">
                    <h5 class="mb-0 text-white">
                      REPRÉSENTANT PERMANENT AUPRÈS DE LA CEDEAO
                    </h5>
                  </div>
                </a>

                <div id="section4ContentId" class="collapse in" role="tabpanel" aria-labelledby="section4HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th class="w-25">Nom du représentant permanent</th>
                          <td>
                            <input type="text" class="form-control" name="outCedeao" id="" value="{{$coteIvoire['outCedeao']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Addresse</th>
                          <td>
                            <input type="text" class="form-control" name="outCedeaoAdresse" id="" value="{{$coteIvoire['outCedeaoAdresse']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Telehone</th>
                          <td>
                            <input type="text" class="form-control" name="outCedeaoTel" id="" value="{{$coteIvoire['outCedeaoTel']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>
                            <input type="text" class="form-control" name="outCedeaoFax" id="" value="{{$coteIvoire['outCedeaoFax']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>
                            <input type="text" class="form-control" name="outCedeaoMail" id="" value="{{$coteIvoire['outCedeaoMail']}}">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section5ContentId" aria-expanded="true" aria-controls="section5ContentId">
                  <div class="card-header bg-success" role="tab" id="section5HeaderId">
                    <h5 class="mb-0 text-white">
                      REPRÉSENTANT RÉSIDENT EN CÔTE D'IVOIRE
                    </h5>
                  </div>
                </a>

                <div id="section5ContentId" class="collapse in" role="tabpanel" aria-labelledby="section5HeaderId">
                  <div class="card-body">
                    <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <th class="w-25">Nom</th>
                          <td>
                            <input type="text" class="form-control" name="inCedeao" id="" value="{{$coteIvoire['inCedeao']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>Adresse</th>
                          <td>
                            <input type="text" class="form-control" name="inCedeaoAdresse" id="" value="{{$coteIvoire['inCedeaoAdresse']}}">
                          </td>
                        </tr>
                        <tr>
                          <th>E-mail</th>
                          <td>
                            <input type="text" class="form-control" name="inCedeaoMail" id="" value="{{$coteIvoire['inCedeaoMail']}}">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-success">Enregistrer</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  @endforeach

  <!-- ------------------------------------------------------------------------------------------- Modal Avis de publication -->
  <!-- Modal Affiche Avis de publicaton -->
  @foreach($avisPublications as $avis)
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="avisDePublication-{{ $avis['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-top: 100px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">

            <hr class="w-50 my-4">

            <h3>
              {{ $avis['titre'] }}
            </h3>

            <p class="text-justify mt-3">
              {!! $avis['contenu'] !!}
            </p>


            <p>Fichier joint
              <a href="{{ asset(env('IMAGE_PATH')) }}/{{$avis['fichierPDF'] }}">
                <img src="../assets/images/icon/pdf.png" alt="AVIS DE PUBLICATION" width="10%">
              </a>
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{ $avis['date'] }}
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
  <!-- /.Modal Affiche Avis de Publication -->

  <!-- Modal Ajout Avis de Publication -->
  <div class="modal fade" id="modalAddAvisPublication" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/avis_publication" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h3 class="modal-title"> AJOUT AVIS DE PUBLICATION</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre" required>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="contenu">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="avis" rows="5" cols="95">Veuillez entrez votre texte ici</textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" name="fichierPDF" class="custom-file-input" id="inputGroupFile01" accept="application/pdf">
                    <label class="custom-file-label" for="inputGroupFile01">Uploadez un fichier pdf</label>
                  </div>
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
  <!-- /.Modal Ajout Avis de Publication -->

  <!-- Modal Modification Avis de Publication -->
  @foreach($avisPublications as $avis)
  <div class="modal fade" id="modalUpdateAvisPublication-{{ $avis['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/avis_publication" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="modal-header">
            <h3 class="modal-title"> MODIFICATION AVIS DE PUBLICATION</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$avis['id']}}">
                  <input type="text" class="form-control" name="titre" id="titre" value="{{$avis['titre']}}" required>
                </div>

                <div class="form-group">
                  <label for="date">Date de fin l'offre <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="text" class="form-control" name="date" id="date" value="{{$avis['date']}}" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="avis-{{$avis['id']}}" rows="5" cols="95">{{$avis['contenu']}}</textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" name="fichierPDF" class="custom-file-input" id="inputGroupFile01" accept="application/pdf">
                    <label class="custom-file-label" for="inputGroupFile01">Uploadez un fichier pdf</label>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            <button type="Ajouter" class="btn btn-success">Modifier</button>
          </div>

        </form>

      </div>
    </div>
  </div>
  @endforeach
  <!-- /.Modal Modification Avis de Publication -->

  <!-- Modal Supprimer Avis de Publication -->
  @foreach($avisPublications as $avis)
  <div class="modal fade" id="modalDeleteAvisPublication-{{$avis['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/archive_avis" method="POST" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h5 class="modal-title">SUPPRIMER AVIS DE PUBLICATION</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="auteur">Souhaitez-vous supprimer le avis de publication? <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$avis['id']}}">
                  <input type="text" class="form-control text-danger" name="titre" id="titre" value="{{$avis['titre']}}" readonly>
                  <input type="hidden" name="contenu" value="{{$avis['contenu']}}">
                  <input type="hidden" name="date" value="{{$avis['date']}}">
                  <input type="hidden" name="fichierPDF" value="{{$avis['fichierPDF']}}">
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
  <!-- /.Modal Supprimer Avis de Publication -->



  <!-- ------------------------------------------------------------------------------------------- Modal Appel d'offres-->
  <!-- Modal Affiche Appel d'offres -->
  @foreach($appelOffres as $offre)
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="appelOffres-{{ $offre['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-top: 100px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">

            <hr class="w-50 my-4">

            <h3>
              {{ $offre['titre'] }}
            </h3>

            <p class="text-justify mt-3">
              {{ $offre['contenu'] }}
            </p>


            <p>Fichier joint
              <a href="{{ asset(env('IMAGE_PATH')) }}/{{$offre['fichierPDF'] }}">
                <img src="../assets/images/icon/pdf.png" alt="APPEL D'OFFRES" width="10%">
              </a>
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{ $offre['date'] }}
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
  <!-- /.Modal Affiche  Appel d'offres -->

  <!-- Modal Ajout Appel d'offres -->
  <div class="modal fade" id="addAppelOffres" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/appel_offre" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="modal-header">
            <h3 class="modal-title"> AJOUT APPEL D'OFFRES</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre" required>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="contenu">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="offre" rows="5" cols="95">Veuillez entrez votre texte ici</textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" name="fichierPDF" class="custom-file-input" id="inputGroupFile01" accept="application/pdf">
                    <label class="custom-file-label" for="inputGroupFile01">Uploadez un fichier pdf</label>
                  </div>
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
  <!-- /.Modal Ajout Appel d'offres -->

  <!-- Modal Modification Appel d'offres -->
  @foreach($appelOffres as $offre)
  <div class="modal fade" id="UpdateAppelOffres-{{ $offre['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/appel_offre" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="modal-header">
            <h3 class="modal-title"> MODIFICATION APPEL D'OFFRES</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$offre['id']}}">
                  <input type="text" class="form-control" name="titre" id="titre" value="{{$offre['titre']}}" required>
                </div>

                <div class="form-group">
                  <label for="date">Date de fin l'offre <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="text" class="form-control" name="date" id="date" value="{{$offre['date']}}" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="offre-{{$offre['id']}}" rows="5" cols="95">{{$offre['contenu']}}</textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" name="fichierPDF" class="custom-file-input" id="inputGroupFile01" accept="application/pdf">
                    <label class="custom-file-label" for="inputGroupFile01">Uploadez un fichier pdf</label>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            <button type="Ajouter" class="btn btn-success">Modifier</button>
          </div>

        </form>

      </div>
    </div>
  </div>
  @endforeach
  <!-- /.Modal Modification Appel d'offres -->

  <!-- Modal Supprimer Appel d'offres -->
  @foreach($appelOffres as $offre)
  <div class="modal fade" id="DeleteAppelOffres-{{$offre['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/archive_offre" method="POST" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h5 class="modal-title">SUPPRIMER APPEL D'OFFRES</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="auteur">Souhaitez-vous supprimer l'appel d'offre? <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$offre['id']}}">
                  <input type="text" class="form-control text-danger" name="titre" id="titre" value="{{$offre['titre']}}" readonly>
                  <input type="hidden" name="contenu" value="{{$offre['contenu']}}">
                  <input type="hidden" name="date" value="{{$offre['date']}}">
                  <input type="hidden" name="fichierPDF" value="{{$offre['fichierPDF']}}">
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



  <!-- ------------------------------------------------------------------------------------------- Modal Emplois-->
  <!-- Modal Ajout Emplois -->
  <div class="modal fade" id="addEmplois" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="recrutement_cedeao" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h3 class="modal-title"> AJOUT EMPLOIS</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre de l'empoi<sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre" required>
                </div>

                <div class="form-group">
                  <label for="date">Date de fin de l'offre <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="recrutement" rows="5" cols="95">Veuillez entrez votre texte ici</textarea>
                </div>

                <div class="form-group">
                  <label for="lienOffre">Lien de l'offre<sup class="text-danger">*</sup> </label>
                  <input type="url" class="form-control" name="links" id="links" placeholder="https://ecowas.int/careers/" required>
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
  <!-- /.Modal Ajout Emplois -->

  <!-- Modal Modification Emplois -->
  @foreach($recrutements as $recrutement)
  <div class="modal fade" id="updateEmplois-{{$recrutement['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="recrutement_cedeao" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h3 class="modal-title"> MODIFIER L'EMPLOIS</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre de l'empoi<sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$recrutement['id']}}">
                  <input type="text" class="form-control" name="titre" id="titre" value="{{$recrutement['titre']}}" required>
                </div>

                <div class="form-group">
                  <label for="date">Date de fin de l'offre <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="text" class="form-control" name="date" id="date" value="{{$recrutement['date']}}" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="recrutement-{{$recrutement['id']}}" rows="5" cols="95">{{$recrutement['contenu']}}</textarea>
                </div>

                <div class="form-group">
                  <label for="image">Lien de l'offre<sup class="text-danger">*</sup> </label>
                  <input type="url" class="form-control" name="links" id="links" value="{{$recrutement['links']}}" required accept="application/pdf">
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
  <!-- /.Modal Modification Emplois -->

  <!-- Modal Supprimer Emplois -->
  @foreach($recrutements as $recrutement)
  <div class="modal fade" id="DeleteEmplois-{{$recrutement['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/archive_recrutement" method="POST" enctype="multipart/form-data">
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
                  <input type="hidden" name="id" value="{{$recrutement['id']}}">
                  <input type="text" class="form-control text-danger" name="titre" id="titre" value="{{$recrutement['titre']}}" readonly>
                  <input type="hidden" name="date" value="{{$recrutement['date']}}">
                  <input type="hidden" name="contenu" value="{{$recrutement['contenu']}}">
                  <input type="hidden" name="links" value="{{$recrutement['links']}}">
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
  <!-- /.Modal Supprimer Emplois -->


  <!-- ------------------------------------------------------------------------------------------- Modal Évènement -->
  <div class="modal fade" id="addEvenement" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/evens" method="POST" enctype="multipart/form-data">
          @csrf>

          <div class="modal-header">
            <h3 class="modal-title"> AJOUT D'ÉVÈNEMENT</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Le titre de l'évènement" required>
                </div>

                <div class="form-group">
                  <label for="libele">Libellé <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="libele" id="libele" placeholder="libellé des évènements" required>
                </div>


                <div class="form-group">
                  <label for="date">Date de l'évènement <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="lienOffre">Lien de l'évènement<sup class="text-danger">*</sup> </label>
                  <input type="url" class="form-control" name="links" id="links" placeholder="https://ecowas.int/careers/" required>
                </div>

                <div class="form-group">
                  <label for="image">Image de l'évènement<sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" accept="image/*,.png,.jpg,.jpeg,.gif">
                    <label class="custom-file-label" for="inputGroupFile01">Choississez une image</label>
                  </div>
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
  <!-- /.Modal Ajout Évènement -->

  <!-- Modal Affiche Évènement -->
  @foreach($evens as $even)
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="afficheEvenement-{{$even['id']}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-top: 100px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="{{ asset(env('IMAGE_PATH')) }}/{{$even['image'] }}" alt="" class="img-fluid rounded shadow" style="margin-top: -20%; z-index: 999; max-width: 300px!important; height: auto;"">

            <hr class=" w-50 my-4">

            <h3>
              {{$even['titre']}}
            </h3>

            <p class="text-justify mt-3">
              {{$even['libele']}}
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{$even['date']}}
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

  <!-- Modal Modifie Evenement -->
  @foreach($evens as $even)
  <div class="modal fade" id="updateEvenement-{{$even['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="evens" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="modal-header">
            <h5 class="modal-title">Modification de l'évenement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$even['id']}}">
                  <input type="text" class="form-control" name="titre" id="titre" value="{{$even['titre']}}" required>
                </div>

                <div class="form-group">
                  <label for="libele">Libellé <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="libele" id="libele" value="{{$even['libele']}}" required>
                </div>


                <div class="form-group">
                  <label for="date">Date de l'évènement <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="text" class="form-control" name="date" id="date" value="{{$even['date']}}" required>
                </div>

                <div class="form-group">
                  <label for="lienOffre">Lien de l'évènement<sup class="text-danger">*</sup> </label>
                  <input type="url" class="form-control" name="links" id="links" value="{{$even['links']}}" required>
                </div>

                <div class="form-group">
                  <label for="image">Image de l'évènement<sup class="text-danger">*</sup><img src="{{asset('storage/Evenement/' . $even['image'])}}" alt="ok" width="05%"> </label>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" accept="image/*,.png,.jpg,.jpeg,.gif">
                    <label class="custom-file-label" for="inputGroupFile01">Choississez une image</label>
                  </div>
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
  <!-- /.Modal modifie Evenement -->

  <!-- Modal Supprimer Evenement -->
  @foreach($evens as $even)
  <div class="modal fade" id="deleteEvenement-{{$even['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/archive_evens" method="POST" enctype="multipart/form-data">
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
                  <input type="hidden" name="id" value="{{$even['id']}}">
                  <input type="text" class="form-control text-danger" name="titre" id="titre" value="{{$even['titre']}}" readonly>
                  <input type="hidden" name="date" value="{{$even['date']}}">
                  <input type="hidden" name="libele" value="{{$even['libele']}}">
                  <input type="hidden" name="links" value="{{$even['links']}}">
                  <input type="hidden" name="image" value="{{$even['image']}}">
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
  <!-- /.Modal Supprimer Evenement -->



  <!-- ------------------------------------------------------------------------------------------- Modal Magazine-->
  <!-- Modal Affiche Magazine -->
  @foreach($magazines as $magazine)
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="appelMagazine-{{$magazine['id']}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-top: 100px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">

            <hr class="w-50 my-4">

            <h3>
              {{$magazine['titre']}}
            </h3>

            <p class="text-justify mt-3">
              {!! Str::limit($magazine['contenu'], 20000) !!}
            </p>


            <p>Fichier joint
              <a href="{{ asset(env('IMAGE_PATH')) }}/{{$magazine['fichierPDF'] }}">
                <img src="../assets/images/icon/pdf.png" alt="" width="10%">
              </a>
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : {{$magazine['date']}}
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
  <!-- /.Modal Affiche  Magazine -->

  <!-- Modal Ajout Magazine -->
  <div class="modal fade" id="addMagazine" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/magazine" method="POST" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="modal-header">
            <h3 class="modal-title"> AJOUT D'UN MAGAZINE</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre" required>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="magazine" rows="5" cols="95">Veuillez entrez votre texte ici</textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" name="fichierPDF" class="custom-file-input" id="inputGroupFile01" accept="application/pdf">
                    <label class="custom-file-label" for="inputGroupFile01">Uploadez un fichier pdf</label>
                  </div>
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
  <!-- /.Modal Ajout Magazine -->

  <!-- Modal Modification Magazine -->
  @foreach($magazines as $magazine)
  <div class="modal fade" id="updateMagazine-{{$magazine['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/magazine" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="modal-header">
            <h3 class="modal-title"> MODIFICATION MAGAZINE</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="shadow p-4">

                <div class="form-group">
                  <label for="title">Titre <sup class="text-danger">*</sup> </label>
                  <input type="hidden" name="id" value="{{$magazine['id']}}">
                  <input type="text" class="form-control" name="titre" id="titre" value="{{$magazine['titre']}}" required>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="text" class="form-control" name="date" id="date" value="{{$magazine['date']}}" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="magazine-{{$magazine['id']}}" rows="5" cols="95">{{$magazine['contenu']}}</textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" name="fichierPDF" class="custom-file-input" id="inputGroupFile01" accept="application/pdf">
                    <label class="custom-file-label" for="inputGroupFile01">Uploadez un fichier pdf</label>
                  </div>
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
  <!-- /.Modal Modification Magazine -->

  <!-- Modal Supprimer Magazine -->
  @foreach($magazines as $magazine)
  <div class="modal fade" id="deleteMagazine-{{$magazine['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="/archive_magazine" method="POST" enctype="multipart/form-data">
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
                  <input type="hidden" name="id" value="{{$magazine['id']}}">
                  <input type="text" class="form-control text-danger" name="titre" id="titre" value="{{$magazine['titre']}}" readonly>
                  <input type="hidden" name="date" value="{{$magazine['date']}}">
                  <input type="hidden" name="contenu" value="{{$magazine['contenu']}}">
                  <input type="hidden" name="fichierPDF" value="{{$magazine['fichierPDF']}}">
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
  <!-- /.Modal Supprimer Magazine -->

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
           $('#corpsTexte').summernote()
           $('#avis').summernote()
           $('#offre').summernote()
           $('#recrutement').summernote()
           $('#magazine').summernote()

           // Actualites
           @foreach($actualites as $actualite)
           $('#summernote-{{$actualite['id']}}').summernote({
               // Options de configuration si nécessaire
           });
           @endforeach

           // flash
           @foreach($flashInfos as $flash)
           $('#corpsTexte-{{$flash['id']}}').summernote({
               // Options de configuration si nécessaire
           });
           @endforeach

           // Avis Publications
           @foreach($avisPublications as $avis)
           $('#avis-{{$avis['id']}}').summernote({
               // Options de configuration si nécessaire
           });
           @endforeach

           // APPEL D'OFFRES
           @foreach($appelOffres as $offre)
           $('#offre-{{$offre['id']}}').summernote({
               // Options de configuration si nécessaire
           });
           @endforeach

           // RECRUTEMENT CEDEAO
           @foreach($recrutements as $recrutement)
           $('#recrutement-{{$recrutement['id']}}').summernote({
               // Options de configuration si nécessaire
           });
           @endforeach

           // LE MAGAZINE DE LA CEDEAO
           @foreach($magazines as $magazine)
           $('#magazine-{{$magazine['id']}}').summernote({
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
