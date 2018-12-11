<div class="hero-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="hero-category-container p-4">
					<div class="row">
						<div class="col-lg-3">
							<nav class="hero-side-category navbar-expand-lg">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categories-menu" aria-controls="categories-menu" aria-expanded="false" aria-label="Toggle Categories">
									<span class="lnr lnr-menu"></span>{{ __('View Categories') }}
								</button>
								<nav class="category-menu collapse navbar-collapse" id="categories-menu">
									<ul>
										@foreach($categories as $category)
											<li><a href="{{ route('shop', ['category' => $category->id]) }}">{{ $category->title }}</a></li>
										@endforeach
									</ul>
								</nav>
							</nav>
						</div>
						<div class="col-12 col-md-4 col-lg-6">
							<a href="{{ route('shop', ['category' => 5]) }}" class="product-container">
								<div class="image-container">
									<img src="{{ asset('images/couple.png') }}">
								</div>
								<div class="hero-details">
									<h3 class="h4 feature__title">{{ __('Clothing') }}</h3>
								</div>
							</a>
						</div>
						<div class="col-12 col-md-8 col-lg-3 mt-4 mt-md-0 d-none d-md-block">
							<div class="row">
								<div class="col-6 col-lg-12 col-md-6">
									<a href="{{ route('shop', ['category' => 6]) }}" class="product-container banner">
										<div class="image-container">
											<img src="{{ asset('images/camera.png') }}">
										</div>
										<div class="hero-details">
											<h3 class="h4 feature__title">{{ __('Home Items') }}</h3>
										</div>
									</a>
								</div>

								<div class="col-6 col-lg-12 col-md-6">
									<a href="{{ route('shop', ['category' => 10]) }}" class="product-container banner mt-30">
										<div class="image-container">
											<img src="{{ asset('images/woman-headband.png') }}">
										</div>
										<div class="hero-details">
											<h3 class="h4 feature__title">{{ __('Accessories') }}</h3>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row py-3 py-md-5 text-center text-md-left">
			<div class="col-12 col-md-4 feature-area">
				<div class="single-feature d-block d-md-flex py-2 py-md-0">
					<span class="icon"><i class="lnr lnr-rocket"></i></span>
					<p>{{ __('Sell Instantly') }}<span>{{ __('Quickly create an account and start selling') }}</span></p>
				</div>
			</div>
			<div class="col-12 col-md-4 feature-area">
				<div class="single-feature d-block d-md-flex py-2 py-md-0">
					<span class="icon"><i class="lnr lnr-smile"></i></span>
					<p>{{ __('Free') }}<span>{{ __('No charges or fees!') }}</span></p>
				</div>
			</div>
			<div class="col-12 col-md-4 feature-area">
				<div class="single-feature d-block d-md-flex py-2 py-md-0">
					<span class="icon"><i class="lnr lnr-sync"></i></span>
					<p>{{ __('Recycle') }}<span>{{ __('Find a new home for your things') }}</span></p>
				</div>
			</div>
		</div>
	</div>
</div>
