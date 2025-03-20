@extends('layouts.header')
@section('content')
<main id="content" class="row sbr">

	<section id="main" class="large-12 columns">
		<div class="page-title">
			<h1>Contact</h1>
		</div>

		<div class="section margin-top-off">
			<div class="contact-map">
				<iframe title="Localisation du Bureau National de la CDEAO" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510.18354747117894!2d-3.987504130171505!3d5.3637577912012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ed6b41075107%3A0x75c55bf26f59762f!2sBUREAU%20NATIONAL%20CEDEAO%20(Minist%C3%A8re%20d&#39;Etat%2C%20Minist%C3%A8re%20des%20Affaires%20%C3%89trang%C3%A8res%2C%20de%20l&#39;int%C3%A9gration%20Africaine%20et%20de%20la%20Diaspora%20)!5e0!3m2!1sfr!2sci!4v1676393193573!5m2!1sfr!2sci" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>

		<div class="section margin-top-30">

			<div class="row">

			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
			</div>
			@endif

			@if ($message = Session::get('error'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
			</div>
			@endif

				<div class="medium-8 large-8 columns">
					<h2>Envoyez nous un message</h2>
					<form method="post" action="saveMessage" class="">
					    @csrf
						<p class="tmmFormStyling form-input-text">
							<input id="name" required="" type="text" name="name" value="" placeholder="Votre nom et prénoms*">
						</p>
						<p class="tmmFormStyling form-input-email">
							<input id="email" required="" type="email" name="email" value="" placeholder="Votre mail *">
						</p>
						<p class="tmmFormStyling form-input-text">
							<input id="name_5" required="" type="text" name="subjet" value="" placeholder="Sujet *">
						</p>
						<p class="tmmFormStyling form-textarea">
							<textarea id="message" required="" name="contenue" placeholder="Votre message *"></textarea>
						</p>

						<p class="tmmFormStyling form-captcha">

							<button class="button middle default-blue" type="submit">
								Envoyer
							</button>
						</p>

					</form>

				</div>

				<div class="columns  medium-4 large-4">
					<h4>Information</h4>
					<p>
						Vous souhaitez envoyer un message au BNC-CI ou saisir l’administration par voie électronique ?

						nous mettons à votre disposition un formulaire de contact. Consultez le ci-contre.

						L’utilisation du formulaire ci-dessous nécessite l’acceptation par l’usager des conditions d’utilisation.
					</p>
					<hr class="hr">
					Services d'Information du Ministère d'État, Ministère des Affaires Étrangères de l'Intégration Africaine et de la Diaspora
					<ul>
						<li>(+225) 20 32 08 88 (numéro principal) <br>
							(+225) 20 32 15 58 (secrétariat général)</li>
						<li>
							BP V 109 Abidjan
						</li>
					</ul>
					<div class="clear"></div>
					<div class="divider-2"></div>
					Informations sur le BNC
					<div class="our_contacts">
						<ul>
							<li>Abidjan, Cocody Vallon Rue J56</li>
							<li>Tel : (+225) 27 22 52 91 02 </li>
							<li>E-mail : <a href="mailto:infos@bureaunationalcedeao-ci.org">infos@bureaunationalcedeao-ci.org</a></li>
						</ul>
					</div>
				</div>

			</div><!--/ .row-->

		</div><!--/ .section-->

	</section><!--/ #main-->
</main>
@endsection
