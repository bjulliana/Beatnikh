@extends('layouts.app')
@section('content')

	<div class="container py-5">
		<div class="row">
			@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
				</div>
			@endif
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
		<div class="row justify-content-center">
			<div class="col-3 profile-header-container">
				<div class="profile-header-img">
					<img class="rounded-circle" src="/uploads/users/{{ $user->photo }}" />
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-9 card-body">
				<form method="POST" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
							@if ($errors->has('name'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

						<div class="col-md-6">
							<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required>

							@if ($errors->has('username'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('username') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

						<div class="col-md-6">
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

							@if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Upload Photo') }}</label>

						<div class="col-md-6">
							<input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ $user->photo }}">

							@if ($errors->has('photo'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('photo') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group row justify-content-center mb-0">
						<div class="col-md-3">
							<button type="submit" class="btn btn-primary btn-block">
								{{ __('Save Changes') }}
							</button>
						</div>
						<div class="col-md-3">
							<a href="{{ route('profile.show') }}" class="btn btn-danger btn-block">
								{{ __('Cancel') }}
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection