@extends('layouts.header')
@section('content')
<main id="content" class="row no_sidebar">

		<div class="large-12 columns">
			<div class="page-title">

            <div class="breadcrumbs">
				Titre :
			</div>

				<h1 class="titre-1">{{ $article->title }}</h1>

				<!--/ .breadcrumbs-->
			</div>
		</div>

		<div id="main" class="medium-12 large-12 columns">

			<div class="row post-list full-width">
				<article class="medium-12 large-12 columns">

					<div class="post border post-classic">
						<span class="image-post item-overlay">
							<img src="{{ asset(env('IMAGE_PATH')) }}/{{$article->image}}"  alt=""/>
						</span>

						<div class="entry-content">
							<p class="paragraphe">
                            {!! $article->corpsTexte !!}
							</p>
						</div>

						<footer class="entry-footer">

							<div class="left">
                                <a href="{{ url()->previous() }}" class="button small colored icon-left-4">Retour</a>
							</div>

							<div class="right">
								<span class="posted-on"><a>28 Jul, 2023</a></span>
								<span class="byline"><a>Service Communication</a></span>
							</div>

						</footer>
					</div>
					<!--/ .post-extra-->

				</article>

			</div>
			<!--/ .post-area-->

			<div class="clear"></div>

		</div>

	</main>
@endsection
