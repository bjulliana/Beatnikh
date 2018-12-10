<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Beatnikh') }}</title>

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

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
	<div class="menu-top">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-6 text-left">
					<ul class="social-icons">
						<li><a target="_blank" href="http://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
						<li><a target="_blank" href="http://plus.google.com/"><i class="fab fa-google-plus"></i></a></li>
						<li><a target="_blank" href="http://www.facebook.com/"><i class="fab fa-facebook"></i></a></li>
						<li><a target="_blank" href="http://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
						<li><a target="_blank" href="http://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
				<div class="col-6">
					<div class="nav-item">
						<ul class="nav header-nav justify-content-end">
							@guest
								<li class="nav-item">
									<a class="nav-link text-white" href="{{ route('login') . '?previous=' . Request::fullUrl() }}">{{ __('Login') }}</a>
								</li>
								<li class="nav-item">
									@if (Route::has('register'))
										<a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
									@endif
								</li>
							@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										<img class="rounded-circle user-thumb" src="/uploads/users/{{ Auth::user()->photo }}">
										<span class="d-none d-sm-inline text-white">{{ Auth::user()->name }} </span>
									</a>

									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<li><a class="dropdown-item" href="{{ url('/profile') }}">My Account</a></li>
										@if ( Auth::user()->role == 'admin' )
											<li><a class="dropdown-item" href="{{ route('categories.show') }}">{{ __('Manage Categories') }}</a></li>
										@endif
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
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="navigation-menu border-bottom">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="main-menu py-3">
						<nav class="navbar navbar-light navbar-expand-md">
							<div class="navbar-brand order-1 order-md-0">
								<a href="/"><img src="{{ asset('svg/logo.svg') }}"></a>
							</div>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="order-2 order-md-3 order-1 text-right">
								@guest
									<a class="btn btn-primary" href="{{ route('login') . '?previous=' . Request::fullUrl() }}" role="button">{{ __('Post Ad') }}</a>
								@else
									<a class="btn btn-primary" href="{{ url('products/new') }}" role="button">{{ __('Post Ad') }}</a>
								@endguest
							</div>
							<div class="collapse navbar-collapse order-0" id="main-nav">
								<ul class="navbar-nav">
									<li class="nav-item"><a class="nav-link" href="/">{{ __('Home') }}</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">{{ __('Browse Products') }}</a></li>
									@guest
									@else
									@endguest
								</ul>
							</div>
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
						<span class="title">{{ __('Download our App:') }}</span>
						<div class="social-buttons">
							<a target="_blank" href="#" class="app-download-btn apple-store"><i class="fab fa-apple"></i> {{ __('Apple Store') }}</a>
							<a target="_blank" href="#" class="app-download-btn google-play"><i class="fab fa-android"></i> {{ __('Google Play') }}</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 col-md-5 text-left text-sm-center text-md-right">
					<ul class="social-icons">
						<li><span class="title">{{ __('Follow Us:') }}</span></li>
						<li><a target="_blank" href="http://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
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
					<li><a href="#">{{ __('About Us') }}</a></li>
					<li><a href="#">{{ __('Privacy Policy') }}</a></li>
					<li><a href="#">{{ __('Terms & Conditions') }}</a></li>
				</ul>
			</div>
			<div class="col-12 col-md-6">
				<p class="copyright-text">{{ __('Copyright ') }} {{ date('Y') }} <a href="#">{{ __('Beatnikh') }}</a>{{ __('. All Rights Reserved') }}</p>
			</div>
		</div>
	</div>
</div>

@if (Request::is('products/show/*'))
	<script src="{{ asset('js/main.js') }}"></script>
@endif
<script src="{{ asset('js/livesearch.js') }}"></script>

</body>
</html>
