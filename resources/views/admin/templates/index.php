<?php
include 'inc/head.php';
include 'inc/aside.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tableau de bord</h1>
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
            <tr>
              <td>
                1
              </td>
              <td>
                Le CEREEC et ses partenaires ont ...
              </td>
              <td>
                01-12-2022
              </td>
              <td>
                Le 6 décembre 2022. Le Centre des Energies Renouvelables ...
              </td>
              <td class="project_progress">
                Ahmed TOURÉ
              </td>
              <td class="text-center">
                <span class="badge badge-success">Publié</span>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalArticle1">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateArticle1">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" href="#">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>


      </div>

      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
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
            <tr>
              <td>
                1
              </td>
              <td>
                <span class="badge badge-danger">URGENT</span>
              </td>
              <td>
                Les Concours Administratifs, des Personnels de Santé et de Promotion dans les grades A5, A6 et A7...
              </td>
              <td>
                01-12-2022
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalFlash1">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateFlash1">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
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
            <tr>
              <td>
                Alassane OUATTARA
              </td>
              <td>
                Ministère d'État, Ministère des Affaires Étrangères de l'intégration Africaine et de la Diaspora
              </td>
              <td>
                Madame Sandra FOLQUET
              </td>
              <td>
                S. E. Kalilou TRAORE
              </td>
              <td>
                Amb. Fanta CISSE
              </td>
              <td style="width: 10%;">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalInformation">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateInformation1">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" href="#">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>
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
          <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
            data-target="#modalAddAvisPublication">
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
            <tr>
              <td>
                1
              </td>
              <td>
                Fourniture et Installation d'une Centrale Solaire Photovoltaïque
              </td>
              <td>
                01-12-2023
              </td>
              <td>
                Le 6 décembre 2022. Le Centre des Energies Renouvelables ...
              </td>
              <td class="text-center">
                <a href="">
                  <img src="../assets/images/icon/pdf.png" alt="" width="50%">
                </a>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#avisDePublication">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdateAvisPublication">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" href="#">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
      </div>
    </div>
    <!-- /.Avis de publication -->

    <hr class="bg-success w-50 my-5">

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
            <tr>
              <td>
                1
              </td>
              <td>
                Fourniture et Installation d'une Centrale Solaire Photovoltaïque
              </td>
              <td>
                01-12-2023
              </td>
              <td>
                Le 6 décembre 2022. Le Centre des Energies Renouvelables ...
              </td>
              <td class="text-center">
                <a href="">
                  <img src="../assets/images/icon/pdf.png" alt="" width="50%">
                </a>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#appelOffres">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#UpdateAppelOffres">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" href="#">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
      </div>
    </div>

    <hr class="bg-success w-50 my-5">

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
            <tr>
              <td>
                1
              </td>
              <td>
                Ingénieur Informaticien
              </td>
              <td>
                01-12-2023
              </td>
              <td>
                La CEDEAO voudrait recruter un ingénieur informaticien
              </td>
              <td class="text-center">
                <a href="https://ecowas.int/careers/">
                  https://ecowas.int/careers/
                </a>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateEmplois">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" href="#">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
      </div>
    </div>

    <hr class="bg-success w-50 my-5">

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
            <tr>
              <td>
                1
              </td>
              <td>
                Anniversaire de la CEDEAO
              </td>
              <td>
                48ème anniversaire de la CEDEAO
              </td>
              <td class="text-center">
                12 avril 2022
              </td>
              <td class="text-center">
                12 avril 2022
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#afficheEvenement">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateEvenement">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" href="#">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
      </div>
    </div>

    <hr class="bg-success w-50 my-5">

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
            <tr>
              <td>
                1
              </td>
              <td>
                Magazine N°1
              </td>
              <td>
                01-12-2023
              </td>
              <td>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
              </td>
              <td class="text-center">
                <a href="">
                  <img src="../assets/images/icon/pdf.png" alt="" width="50%">
                </a>
              </td>
              <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#appelMagazine">
                  <i class="fas fa-eye">
                  </i>
                </a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateMagazine">
                  <i class="fas fa-pencil-alt">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm" href="#">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
      </div>
    </div>

  </section>

  <!-- /.content -->


  <!-- ------------------------------------------------------------------------------------------- Modal Ajout article -->
  <div class="modal fade" id="modalAddArticle1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <label for="title">Appel de titre de l'article <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="appelTitre" id="appelTitre"
                    placeholder="Veuillez entrez l'appel de titre" required>
                </div>

                <div class="form-group">
                  <label for="title">Titre de l'article <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Veuillez entrez le titre"
                    required>
                </div>

                <div class="form-group">
                  <label for="legende">Légende <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="legende" id="legende"
                    placeholder="Veuillez entrer la légende" required>
                </div>

                <div class="form-group">
                  <label for="chapeau">Chapeau <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="chapeau" id="chapeau" placeholder="Veuillez le chapeau"
                    required>
                </div>

                <div class="form-group">
                  <label for="">Corps du texte</label>
                  <textarea id="summernote" rows="20">
                        Veuillez entrez votre texte ici
                        </textarea>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="image">Image <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choississez une image</label>
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
  <!-- /.Modal Ajout article -->

  <!-- Modal Affiche l'article -->
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="modalArticle1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
      aria-hidden="true" style="margin-top: 100px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="https://picsum.photos/500/200" alt="" class="img-fluid rounded shadow"
              style="margin-top: -10%; z-index: 999" width="500">

            <hr class="w-50 my-4">

            <h3>
              Le CEREEC et ses partenaires ont conclu avec succès le 6ème Examen Régional de Certification en
              République du Bénin
            </h3>

            <p class="text-justify mt-3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam placeat est consectetur hic
              distinctio. Reprehenderit sed aliquid nam veniam quidem? Commodi fugiat saepe magnam odit voluptatum.
              Reiciendis adipisci unde veritatis!
              Delectus facilis ab animi tempore nihil molestias sed hic. Praesentium, eligendi iusto sint ullam
              corporis possimus, voluptates et placeat assumenda molestiae impedit illum similique quam earum eum
              molestias magni dolores?
              Nam aut quae quisquam voluptatibus explicabo culpa cumque adipisci illo odit doloremque, numquam
              aliquam itaque ad reiciendis molestiae neque eum accusamus molestias ipsam obcaecati soluta quos
              repudiandae? Molestiae, ex odio.
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : 01/02/2034
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
  <!-- /.Modal pour l'image -->

  <!-- Modal Modifie article -->
  <div class="modal fade" id="modalUpdateArticle1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <label for="title">Appel de titre de l'article <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="appelTitre" id="appelTitre" value="CEDAO" required>
                </div>

                <div class="form-group">
                  <label for="title">Titre de l'article <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="title" id="title" value="Le CEREEC et ses partenaires ont conclu avec succès le 6ème Examen Régional de Certification en
                  République du Bénin" required>
                </div>

                <div class="form-group">
                  <label for="legende">Légende <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="legende" id="legende"
                    value="lorem ipsum lorem ipsum lorem ipsum" required>
                </div>

                <div class="form-group">
                  <label for="chapeau">Chapeau <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="chapeau" id="chapeau"
                    value=" Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis voluptate expedita dolore, dignissimos quia omnis fugiat magnam ipsam dolor "
                    required>
                </div>

                <div class="form-group">
                  <label for="">Corps du texte</label>
                  <textarea class="form-control text-left" name="" id="" rows="5"
                    placeholder="Veuillez entrez votre texte ici">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus libero ducimus laborum veritatis repudiandae natus facere vero? Placeat ipsum sapiente inventore voluptate, expedita eum quis itaque at eligendi eaque unde.
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste natus sunt consequatur aperiam recusandae, eveniet quod. Veniam eos reiciendis ab cum ea earum velit culpa, voluptas consequuntur eius, iure explicabo.
                    </textarea>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2023 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="image">Image <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <input type="hidden" name="image">
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
  <!-- /.Modal modifie article -->


  <!-- ------------------------------------------------------------------------------------------- Modal Ajout flash Infos -->
  <div class="modal fade" id="modalAddFlash" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <form action="" method="POST">

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
                  <select class="form-control" name="type" id="type">
                    <option value="urgent">Urgent</option>
                    <option value="information">Information</option>
                    <option value="actualités">Actualités</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Corps du texte</label>
                  <textarea class="form-control" name="" id="" rows="5"
                    placeholder="Veuillez entrez votre texte ici"></textarea>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2023 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
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
  <!-- /.Modal pour l'image -->

  <!-- Modal Affiche flash -->
  <div class="modal fade" id="modalFlash1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h3 class="modal-title"> FLASH INFOS N° 1</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <span class="badge badge-danger mb-4">URGENT</span>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis harum, suscipit veniam, recusandae
            repellat dolor blanditiis animi doloremque sapiente reiciendis quod sit dolore, vero quam? Numquam quasi
            veritatis ab voluptate?
          </p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          <button type="Ajouter" class="btn btn-success">Modifier</button>
        </div>

      </div>
    </div>
  </div>
  <!-- /.Modal Affiche flash -->

  <!-- Modal Modifie flash -->
  <div class="modal fade" id="modalUpdateFlash1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <form action="" method="POST">

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
                  <select class="form-control" name="type" id="type">
                    <option value="urgent">Urgent</option>
                    <option value="information">Information</option>
                    <option value="actualités">Actualités</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Corps du texte</label>
                  <textarea class="form-control" name="" id="" rows="5"
                    placeholder="Veuillez entrez votre texte ici"></textarea>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2023 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
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
  <!-- /.Modal modifie flash -->


  <!-- ------------------------------------------------------------------------------------------- Modal Affiche Informations -->
  <div class="modal fade" id="modalInformation" tabindex="-1" role="dialog" aria-labelledby="model" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div id="accordianId" role="tablist" aria-multiselectable="true">

              <div class="card">
                <div class="card-header" role="tab" id="section1HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true"
                      aria-controls="section1ContentId">
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
                          <td>Alassane OUATTARA</td>
                        </tr>
                        <tr>
                          <th>Gouvernement</th>
                          <td>République présidentielle</td>
                        </tr>
                        <tr>
                          <th>Capitale Politique</th>
                          <td>Yamoussoukro</td>
                        </tr>
                        <tr>
                          <th>Superficie</th>
                          <td>322,463 km <sup>2</sup> </td>
                        </tr>
                        <tr>
                          <th>Population</th>
                          <td>25 232 905 (2014)</td>
                        </tr>
                        <tr>
                          <th>Indépendance</th>
                          <td>7 août 1960</td>
                        </tr>
                        <tr>
                          <th>Langue officielle</th>
                          <td>francais</td>
                        </tr>
                        <tr>
                          <th>Langue la plus parlé</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Espérance de vie</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>PIP par habitant</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Taux de croissance annuel</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Monnaie</th>
                          <td>Franc CFA (XOF)</td>
                        </tr>
                        <tr>
                          <th>Indice de développement humain</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Fuseau horaire</th>
                          <td>GMT (UTC+0)</td>
                        </tr>
                        <tr>
                          <th>Liens du gouvernement officiel</th>
                          <td>http://www.gouv.ci/Main.php</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              <div class="card">
                <div class="card-header" role="tab" id="section2HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true"
                      aria-controls="section2ContentId">
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
                          <td>Ministre des Affaires Etrangères</td>
                        </tr>
                        <tr>
                          <th>Nom du Ministre</th>
                          <td>HE. Madame Kandia KAMISSOKO CAMARA</td>
                        </tr>
                        <tr>
                          <th>Addresse</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Telehone</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Site Web</th>
                          <td>
                            <a href="https://diplomatie.gouv.ci">
                              https://diplomatie.gouv.ci
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
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section3ContentId" aria-expanded="true"
                      aria-controls="section3ContentId">
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
                          <td>Madame Sandra FOLQUET</td>
                        </tr>
                        <tr>
                          <th>Fonction</th>
                          <td>Directrice, Cellule National de la CEDEAO, Ministère de l’intégration
                            Africaine et des Ivoriens de l’extérieur (Intégration)</td>
                        </tr>
                        <tr>
                          <th>Telephone</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>s.f.coulibaly@hotmail.fr</td>
                        </tr>
                        <tr>
                          <th>Site web</th>
                          <td>-</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" role="tab" id="section2HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section4ContentId" aria-expanded="true"
                      aria-controls="section4ContentId">
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
                          <td>S. E. Kalilou TRAORE</td>
                        </tr>
                        <tr>
                          <th>Addresse</th>
                          <td>Ambassy of Côte d’Ivoire - No.8, Gurara Street, Off IBB Way Maitama
                            District, Abuja, PMB 5133, Wuse 11, Abuja.</td>
                        </tr>
                        <tr>
                          <th>Telehone</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>ambaci.abuja@yahoo.fr</td>
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
            <button type="button" class="btn btn-primary">Enregistrer</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- /.Modal Affiche Informations -->

  <!-- Modal modifie Informations -->
  <div class="modal fade" id="modalUpdateInformation1" tabindex="-1" role="dialog" aria-labelledby="model"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div id="accordianId" role="tablist" aria-multiselectable="true">

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true"
                  aria-controls="section1ContentId">
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
                            <input type="text" class="form-control" name="chefGouvernement" id=""
                              Value="Alassane OUATTARA">
                          </td>
                        </tr>
                        <tr>
                          <th class="w-25">Gouvernement</th>
                          <td>
                            <input type="text" class="form-control" name="gouvernement" id=""
                              Value="République présidentielle">
                          </td>
                        </tr>
                        <tr>
                          <th class="w-25">Capitale Politique</th>
                          <td>
                            <input type="text" class="form-control" name="countryCapital" id="" Value="Yamoussoukro">
                          </td>
                        </tr>
                        <tr>
                          <th class="w-25">Superficie</th>
                          <td>
                            <input type="text" class="form-control" name="countryArea" id="" Value="322,463 km2">
                          </td>
                        </tr>
                        <tr>
                          <th class="w-25">Population</th>
                          <td>
                            <input type="text" class="form-control" name="countryPopulation" id=""
                              Value="25 232 905 (2014)">
                          </td>
                        </tr>
                        <tr>
                          <th>Indépendance</th>
                          <td>
                            <input type="text" class="form-control" name="independanceDay" id="" Value="7 août 1960">
                          </td>
                        </tr>
                        <tr>
                          <th>Langue officielle</th>
                          <td>
                            <input type="text" class="form-control" name="officialLanguage" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Langue la plus parlé</th>
                          <td>
                            <input type="text" class="form-control" name="mostSpokenLanguage" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Espérance de vie</th>
                          <td>
                            <input type="text" class="form-control" name="lifeExpectancy" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>PIP par habitant</th>
                          <td>
                            <input type="text" class="form-control" name="pip" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Taux de croissance annuel</th>
                          <td>
                            <input type="text" class="form-control" name="annuelGrowth" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Monnaie</th>
                          <td>
                            <input type="text" class="form-control" name="currency" id="" Value="Franc CFA (XOF)">
                          </td>
                        </tr>
                        <tr>
                          <th>Indice de développement humain</th>
                          <td>
                            <input type="text" class="form-control" name="indexHumanDevelopment" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Fuseau horaire</th>
                          <td>
                            <input type="text" class="form-control" name="timeZone" id="" Value="GMT (UTC+0)">
                          </td>
                        </tr>
                        <tr>
                          <th>Liens du gouvernement officiel</th>
                          <td>
                            <input type="text" class="form-control" name="websiteGouvernement" id=""
                              Value="http://www.gouv.ci/Main.php">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true"
                  aria-controls="section2ContentId">
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
                            <input type="text" class="form-control" name="ministery" id=""
                              Value="Ministre d'État, des Affaires Etrangères de l'Intégration Africaine et de la Diaspora ">
                          </td>
                        </tr>
                        <tr>
                          <th>Nom du Ministre</th>
                          <td>
                            <input type="text" class="form-control" name="ministerName" id=""
                              Value="HE. Madame Kandia KAMISSOKO CAMARA">
                          </td>
                        </tr>
                        <tr>
                          <th>Addresse</th>
                          <td>
                            <input type="text" class="form-control" name="ministerAdress" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Telehone</th>
                          <td>
                            <input type="text" class="form-control" name="ministerTel" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>
                            <input type="text" class="form-control" name="ministerFax" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>
                            <input type="text" class="form-control" name="ministerEmail" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Site Web</th>
                          <td>
                            <input type="text" class="form-control" name="ministerOfficialWebsite" id=""
                              Value="https://diplomatie.gouv.ci">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section3ContentId" aria-expanded="true"
                  aria-controls="section3ContentId">
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
                            <input type="text" class="form-control" name="managerBnc" id=""
                              Value="Madame Sandra FOLQUET">
                          </td>
                        </tr>
                        <tr>
                          <th>Fonction</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncFunction" id="" Value="Directrice, Cellule National de la CEDEAO, Ministère de l’intégration
                                    Africaine et des Ivoriens de l’extérieur (Intégration)">

                          </td>
                        </tr>
                        <tr>
                          <th>Telephone</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncTel" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncFax" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncEmail" id=""
                              Value="s.f.coulibaly@hotmail.fr">
                          </td>
                        </tr>
                        <tr>
                          <th>Site web</th>
                          <td>
                            <input type="text" class="form-control" name="managerBncOfficialWebsite" id="" Value="--">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section4ContentId" aria-expanded="true"
                  aria-controls="section4ContentId">
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
                            <input type="text" class="form-control" name="outCedeao" id="" Value="S. E. Kalilou TRAORE">
                          </td>
                        </tr>
                        <tr>
                          <th>Addresse</th>
                          <td>
                            <input type="text" class="form-control" name="outCedeaoAdresse" id="" Value="Ambassy of Côte d’Ivoire - No.8, Gurara Street, Off IBB Way Maitama
                                    District, Abuja, PMB 5133, Wuse 11, Abuja.">
                          </td>
                        </tr>
                        <tr>
                          <th>Telehone</th>
                          <td>
                            <input type="text" class="form-control" name="outCedeaoTel" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>
                            <input type="text" class="form-control" name="outCedeaoFax" id="" Value="--">
                          </td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>
                            <input type="text" class="form-control" name="outCedeaoMail" id=""
                              Value="ambaci.abuja@yahoo.fr">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <a data-toggle="collapse" data-parent="#accordianId" href="#section5ContentId" aria-expanded="true"
                  aria-controls="section5ContentId">
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
                            <input type="text" class="form-control" name="inCedeao" id="" Value="Amb. Fanta CISSE">
                          </td>
                        </tr>
                        <tr>
                          <th>Adresse</th>
                          <td>
                            <input type="text" class="form-control" name="inCedeaoAdresse" id="" Value="Boulevard de France, Cocody Corniche, 07 B.P. 536, Abidjan 07, Côte
                                    d’Ivoire">
                          </td>
                        </tr>
                        <tr>
                          <th>E-mail</th>
                          <td>
                            <input type="text" class="form-control" name="inCedeaoMail" id=""
                              Value="fcisse@ecowas.int, pprep_ci@ecowas.int">
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
            <button type="button" class="btn btn-success">Enregistrer</button>
          </div>

        </form>
      </div>
    </div>
  </div>


  <!-- ------------------------------------------------------------------------------------------- Modal Avis de publication -->
  <!-- Modal Affiche Avis de publicaton -->
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="avisDePublication" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
      aria-hidden="true" style="margin-top: 100px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">

            <hr class="w-50 my-4">

            <h3>
              Fourniture et Installation d'une Centrale Solaire Photovoltaïque
            </h3>

            <p class="text-justify mt-3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam placeat est consectetur hic
              distinctio. Reprehenderit sed aliquid nam veniam quidem? Commodi fugiat saepe magnam odit voluptatum.
              Reiciendis adipisci unde veritatis!
            </p>


            <p>Fichier joint
              <a href="">
                <img src="../assets/images/icon/pdf.png" alt="" width="10%">
              </a>
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : 01/02/2023
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
  <!-- /.Modal Affiche Avis de Publication -->

  <!-- Modal Ajout Avis de Publication -->
  <div class="modal fade" id="modalAddAvisPublication" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre"
                    required>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="summernote" rows="5" cols="95"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
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
  <!-- /.Modal Ajout Avis de Publication -->

  <!-- Modal Modification Avis de Publication -->
  <div class="modal fade" id="modalUpdateAvisPublication" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre"
                    required>
                </div>

                <div class="form-group">
                  <label for="date">Date de fin l'offre <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="summernote" rows="5" cols="95"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
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
  <!-- /.Modal Modification Avis de Publication -->



  <!-- ------------------------------------------------------------------------------------------- Modal Appel d'offres-->
  <!-- Modal Affiche Appel d'offres -->
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="appelOffres" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
      aria-hidden="true" style="margin-top: 100px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">

            <hr class="w-50 my-4">

            <h3>
              Fourniture et Installation d'une Centrale Solaire Photovoltaïque
            </h3>

            <p class="text-justify mt-3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam placeat est consectetur hic
              distinctio. Reprehenderit sed aliquid nam veniam quidem? Commodi fugiat saepe magnam odit voluptatum.
              Reiciendis adipisci unde veritatis!
            </p>


            <p>Fichier joint
              <a href="">
                <img src="../assets/images/icon/pdf.png" alt="" width="10%">
              </a>
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : 01/02/2023
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
  <!-- /.Modal Affiche  Appel d'offres -->

  <!-- Modal Ajout Appel d'offres -->
  <div class="modal fade" id="addAppelOffres" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre"
                    required>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="summernote" rows="5" cols="95"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
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
  <!-- /.Modal Ajout Appel d'offres -->

  <!-- Modal Modification Appel d'offres -->
  <div class="modal fade" id="UpdateAppelOffres" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre"
                    required>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="summernote" rows="5" cols="95"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
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
  <!-- /.Modal Modification Appel d'offres -->



  <!-- ------------------------------------------------------------------------------------------- Modal Emplois-->
  <!-- Modal Ajout Emplois -->
  <div class="modal fade" id="addEmplois" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre"
                    required>
                </div>

                <div class="form-group">
                  <label for="date">Date de fin de l'offre <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="summernote" rows="5" cols="95"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">Lien de l'offre<sup class="text-danger">*</sup> </label>
                  <input type="url" class="form-control" name="links" id="links"
                    placeholder="https://ecowas.int/careers/" required>
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
  <!-- /.Modal Ajout Emplois -->

  <!-- Modal Modification Emplois -->
  <div class="modal fade" id="updateEmplois" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre"
                    required>
                </div>

                <div class="form-group">
                  <label for="date">Date de fin de l'offre <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="summernote" rows="5" cols="95"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">Lien de l'offre<sup class="text-danger">*</sup> </label>
                  <input type="url" class="form-control" name="links" id="links"
                    placeholder="https://ecowas.int/careers/" required>
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
  <!-- /.Modal Modification Emplois -->


  <!-- ------------------------------------------------------------------------------------------- Modal Évènement -->
  <div class="modal fade" id="addEvenement" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <input type="text" class="form-control" name=titre" id="titre" placeholder="Le titre de l'évènement"
                    required>
                </div>

                <div class="form-group">
                  <label for="title">Libellé <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="libellé des évènements"
                    required>
                </div>


                <div class="form-group">
                  <label for="date">Date de l'évènement <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="image">Image de l'évènement<sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choississez une image</label>
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
  <!-- /.Modal Ajout Évènement -->

  <!-- Modal Affiche Évènement -->
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="afficheEvenement" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
      aria-hidden="true" style="margin-top: 100px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="https://picsum.photos/100/100" alt="" class="img-fluid rounded shadow"
              style="margin-top: -20%; z-index: 999" width="500">

            <hr class="w-50 my-4">

            <h3>
              48ème anniversaire
            </h3>

            <p class="text-justify mt-3">
              47 ème Anniversaire
              1975 -2023
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : 01/02/2034
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
  <!-- /.Modal pour l'image -->

  <!-- Modal Modifie article -->
  <div class="modal fade" id="updateEvenement" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <label for="title">Titre <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name=titre" id="titre" placeholder="Le titre de l'évènement"
                    required>
                </div>

                <div class="form-group">
                  <label for="title">Libellé <sup class="text-danger">*</sup> </label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="libellé des évènements"
                    required>
                </div>


                <div class="form-group">
                  <label for="date">Date de l'évènement <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="image">Image de l'évènement<sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
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
  <!-- /.Modal modifie article -->



  <!-- ------------------------------------------------------------------------------------------- Modal Magazine-->
  <!-- Modal Affiche Magazine -->
  <div class="modal-dialog-centered pt-5">
    <div class="modal fade pt-5 " id="appelMagazine" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
      aria-hidden="true" style="margin-top: 100px !important">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">

            <hr class="w-50 my-4">

            <h3>
              Fourniture et Installation d'une Centrale Solaire Photovoltaïque
            </h3>

            <p class="text-justify mt-3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam placeat est consectetur hic
              distinctio. Reprehenderit sed aliquid nam veniam quidem? Commodi fugiat saepe magnam odit voluptatum.
              Reiciendis adipisci unde veritatis!
            </p>


            <p>Fichier joint
              <a href="">
                <img src="../assets/images/icon/pdf.png" alt="" width="10%">
              </a>
            </p>

            <p class="text-left mt-4 secondary">
              <sub>
                <i>
                  <i class="fa fa-calendar" aria-hidden="true"></i> Publié le : 01/02/2023
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
  <!-- /.Modal Affiche  Magazine -->

  <!-- Modal Ajout Magazine -->
  <div class="modal fade" id="addMagazine" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre"
                    required>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="summernote" rows="5" cols="95"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
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
  <!-- /.Modal Ajout Magazine -->

  <!-- Modal Modification Magazine -->
  <div class="modal fade" id="updateMagazine" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="" method="POST">

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
                  <input type="text" class="form-control" name="titre" id="titre" placeholder="Veuillez entrez le titre"
                    required>
                </div>

                <div class="form-group">
                  <label for="date">Date de publication <sup class="text-danger">*</sup> </span></label> <span
                    class="text-secondary"> <i> 01/03/2022 </i>
                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="title">Contenu <sup class="text-danger">*</sup> </label>
                  <textarea name="contenu" id="summernote" rows="5" cols="95"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">Fichier PDF à joindre <sup class="text-danger">*</sup> </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
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
  <!-- /.Modal Modification Magazine -->

  <?php
include 'inc/footer.php';