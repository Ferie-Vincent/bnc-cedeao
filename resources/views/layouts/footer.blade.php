<div id="accountDialog" class="dialog">
		<div class="dialog-overlay"></div>
		<div class="dialog-content">
			<div class="dialog-inner">
				<i class="action-close" data-dialog-close></i>
			</div>
		</div>
	</div>

	<div id="loginDialog" class="dialog">
		<div class="dialog-overlay"></div>
		<div class="dialog-content">
			<div class="dialog-inner">
				<i class="action-close" data-dialog-close></i>
			</div>
		</div>
	</div>


	<!-- - - - - - - - FOOTER - - - - - - - -->

	<footer id="footer">
		<div class="footer-top">
			<x-footer></x-footer>
			<!--/ .row-->
		</div>
		<!--/ .footer-top-->

		<div class="footer-bottom">
			<div class="row">
				<div class="large-6 columns">
					<div class="copyright">
						Copyright © 2023. BNC-CI. Tous droits réservés
					</div>
				</div>

				<div class="large-3 large-offset-3 columns">
					<div class="developed">
						<a>BNC-CI</a>
					</div>
				</div>
			</div>
			<!--/ .row-->
		</div>
		<!--/ .footer-bottom-->
	</footer>
	<!--/ #footer-->

	<!-- - - - - - - - END FOOTER - - - - - - - -->
	</div>
	<!--/ #wrapper-->

	<!-- - - - - - - -  END WRAPPER  - - - - - - - -->

	<a href="#" id="back-top" title="Back To Top" style="display: inline;"></a>
	<!-- Vendor
================================================== -->
	<script src="assets/js/vendor/jquery-1.11.3.min.js"></script>
	<!--[if lt IE 9]>
      <script src="assets/js/vendor/respond.min.js"></script>
      <script src="assets/js/vendor/jquery.selectivizr.min.js"></script>
    <![endif]-->


	<script>
		const flashNewsContainer = document.querySelector('.flash-news-container');
		const flashNewsItems = document.querySelectorAll('.flash-news-item');

		flashNewsContainer.addEventListener('mouseenter', function() {
			flashNewsItems.forEach(item => {
				item.style.animationPlayState = "paused";
			});
		});
		flashNewsContainer.addEventListener('mouseleave', function() {
			flashNewsItems.forEach(item => {
				item.style.animationPlayState = "running";
			});
		});

		jQuery().ready(function($) {
			FlowSlider(".book-slider");
		});
	</script>


	<script src="assets/js/book/jquery-1.7.1.min.js"></script>
	<script src="assets/js/book/jquery-mousewheel-3.0.6/jquery.mousewheel.min.js"></script>
	<script src="assets/js/book/flowslider.jquery.js"></script>

	<script src="assets/js/vendor/mediaelement/mediaelement-and-player.min.js"></script>
	<script src="assets/js/vendor/widgets/twitterFetcher_min.js"></script>
	<script src="assets/js/vendor/owlcarousel/owl.carousel.min.js"></script>
	<script src="assets/js/vendor/plugins.js"></script>
	<script src="assets/js/vendor/modals.js"></script>
	<script src="assets/js/vendor/widgets/twitterFetcher_min.js"></script>
	<script src="assets/js/vendor/jquery.stapel.js"></script>
	<script src="assets/js/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	<!-- Theme Base, Components and Settings
================================================== -->

	<script src="assets/js/config.js"></script>
	<script src="assets/js/theme.js"></script>
	</body>

	</html>
