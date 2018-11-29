<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Beatnikh') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
	<div class="menu-top py-4 navbar-laravel">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-6 order-1 order-md-1 col-md-2 text-center">
					<div class="logo">
						<a href="/">Beatnikh</a>
					</div>
				</div>
				<div class="col-12 order-3 order-md-2 col-md-8">
					<form action="#">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" aria-label="Search Products" aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-6 order-2 order-md-3 col-md-2">
					@guest
						<a class="btn btn-primary" href="{{ route('login') }}" role="button">Post Ad</a>
					@else
						<a class="btn btn-primary" href="{{ url('products/new') }}" role="button">Post Ad</a>
					@endguest
				</div>
			</div>
		</div>
	</div>
	<div class="navigation-menu">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="main-menu">
						<nav style="display: block">
							<ul class="nav py-3">
								<li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
								@guest
								@else
									@if ( Auth::user()->role == 'admin' )
										<li class="nav-item"><a class="nav-link" href="{{ route('categories.show') }}">Categories</a></li>
									@endif
								@endguest
								<li class="nav-item ml-auto">
									<ul class="nav header-nav">
										@guest
											<li class="nav-item">
												<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
											</li>
											<li class="nav-item">
												@if (Route::has('register'))
													<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
												@endif
											</li>
										@else
											<li class="nav-item dropdown">
												<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
													<img src="/uploads/users/{{ Auth::user()->photo }}" style="width:32px; height:32px; margin-right: 10px; border-radius:50%">
													{{ Auth::user()->name }} <span class="user_img"></span>
												</a>

												<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
													<li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
													<li><a class="dropdown-item" href="{{ route('logout') }}"
													       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
															{{ __('Logout') }}
														</a>
														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															@csrf
														</form>
													</li>
												</ul>
											</li>
										@endguest
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="col-12">
					<div class="mobile-menu d-block d-lg-none"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<main class="main-content">
	@yield('content')
</main>
<div class="footer-container">
	<div class="footer-social-link-container py-3">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-lg-6 col-md-7 text-left text-sm-center text-lg-left">
					<div class="app-download-area mb-3 mb-md-0">
						<span class="title">Download our App:</span>
						<div class="social-buttons">
							<a target="_blank" href="#" class="app-download-btn apple-store"><i class="fab fa-apple"></i> Apple Store</a>
							<a target="_blank" href="#" class="app-download-btn google-play"><i class="fab fa-android"></i> Google play</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 col-md-5 text-left text-sm-center text-md-right">
					<ul class="social-icons">
						<li><span class="title">Follow Us:</span></li>
						<li><a target="_blank" href="http://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
						<li><a target="_blank" href="http://www.rss.com/"><i class="fa fa-rss"></i></a></li>
						<li><a target="_blank" href="http://plus.google.com/"><i class="fab fa-google-plus"></i></a></li>
						<li><a target="_blank" href="http://www.facebook.com/"><i class="fab fa-facebook"></i></a></li>
						<li><a target="_blank" href="http://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
						<li><a target="_blank" href="http://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-bottom-navigation text-center">
	<div class="container">
		<div class="row py-3">
			<div class="col-12 col-md-6">
				<ul class="navigation-container">
					<li><a href="#">About Us</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Terms &amp; Conditions</a></li>
				</ul>
			</div>
			<div class="col-12 col-md-6">
				<p class="copyright-text">Copyright {{ date('Y') }} <a href="#">Beatnikh</a>. All Rights Reserved</p>
			</div>
		</div>
	</div>
</div>

@if (Request::is('products/show/*'))
	<script src="/js/main.js"></script>
@endif

</body>
</html>
