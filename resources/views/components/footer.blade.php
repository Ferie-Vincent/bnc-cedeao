<div class="row">
				<div class="large-3 columns" style="text-align:center">
                <div id="text-2" class="widget widget_text">
						<h3 class="widget-title">
							Bureau National CEDEAO - Côte d'Ivoire
						</h3>

						<div class="textwidget">
							<p>
								<a href="https://diplomatie.gouv.ci">
									Ministere d'État, Ministère des Affaires Étrangères, de l'Intégration Africaine et de
									la Diaspora
								</a>
							</p>
							<p>
								Abidjan Cocody Vallon
							</p>
							<p>
								Adresse: 01 BPV 225 Abidjan 01 <br> Tel : <a href="tel:+225 27 22 52 91 02">+225 27 22 52
									91 02</a>
							</p>
							<p>
								<a href="mailto:info@bureaunationalcedeao-ci.org">
									info@bureaunationalcedeao-ci.org
								</a>
								<br>
								<a href="https://bureaunationalcedeao-ci.org">
									bureaunationalcedeao-ci.org
								</a>
							</p>
						</div>
					</div>

					<div class="widget widget_social clearfix">
						<h3 class="widget-title">Le BNC-CI sur la toile</h3>

						<ul class="social-icons">
							<li class="facebook">
								<a target="_blank" href="https://www.facebook.com/profile.php?id=100093299617470">Facebook</a>
							</li>

							<li class="twitter">
								<a target="_blank" href="https://twitter.com/">Twitter</a>
							</li>

							<li class="youtube">
								<a target="_blank" href="https://www.youtube.com/">Youtube</a>
							</li>

						</ul>
					</div>
					<!--/ .widget_social-->

					<!--/ .widget-container-->
				</div>

				<div class="large-3 columns">
					<div class="widget widget_nav_menu">
						<h3 class="widget-title" style="text-align:center">
							Liens Institutionnels
						</h3>

						<div class="menu-issues-container" style="font-style:italic">
							<ul id="menu-issues" class="menu">
                                @foreach($liensInstitutionelles as $item)
                                <li>
									<a href="{{ $item['linkS'] }}">{{ $item['nomAfficher'] }}</a>
								</li>
                                @endforeach
							</ul>
						</div>
					</div>

					<div class="widget widget_nav_menu">
						<h3 class="widget-title" style="text-align:center">
                        La commission de la CEDEAO
						</h3>

						<div class="menu-campaign-container">
							<ul id="menu-campaign" class="menu" style="font-style:italic">
                            @foreach($lienUtiles as $item)
                                <li>
									<a href="{{ $item['linkS'] }}">{{ $item['nomAfficher'] }}</a>
								</li>
                            @endforeach
							</ul>
						</div>
					</div>
				</div>

				<div class="large-3 columns">
					<div class="widget widget_nav_menu">
						<h3 class="widget-title" style="text-align:center">
							Documentation
						</h3>

						<div class="menu-issues-container" style="font-style:italic">
							<ul id="menu-issues" class="menu">
                            @foreach($lienUtiles as $item)
                                <li>
									<a href="{{ $item['linkS'] }}">{{ $item['nomAfficher'] }}</a>
								</li>
                            @endforeach
							</ul>
						</div>
					</div>
				</div>

				<div class="large-3 columns" style="text-align:center">
					<img src="{{asset('assets/images/logo-2.png')}}" alt="logo-sticky" class="sticky" />

					<div class="widget widget_subscription" style="margin-top: 25px !important;">
						<h3 class="widget-title">Restez en contact avec nous</h3>

						<p>Inscrivez-vous à notre newsletter</p>

						<form method="post" class="subscription-form" enctype="multipart/form-data">
							<input type="hidden" name="subscription_form" value="subscription_form_552270c65d96c" />

							<fieldset class="row collapse">
								<legend></legend>
								<div class="small-10 columns">
									<input id="email_552270c65d96c" required type="email" name="subscriber_email" value="" placeholder="Entrez votre mail ici" />
								</div>
								<div class="small-2 columns">
									<button class="button submit mail-icon"></button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>