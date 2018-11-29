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
		</div>
		<div class="row justify-content-center">
			<div class="col-3 profile-header-container">
				<div class="profile-header-img">
					<img class="rounded-circle" src="/uploads/users/{{ $user->photo }}" />
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-5 card-body">
				<div class="row py-2">
					<div class="col-md-4 text-md-right">{{ __('Name') }}</div>
					<div class="col-md-6">{{ $user->name }}</div>
				</div>
				<div class="row py-2">
					<div class="col-md-4 text-md-right">{{ __('Username') }}</div>
					<div class="col-md-6">{{ $user->username }}</div>
				</div>
				<div class="row py-2">
					<div class="col-md-4 text-md-right">{{ __('E-Mail Address') }}</div>
					<div class="col-md-6">{{ $user->email }}</div>
				</div>
				<div class="row py-2">
					<div class="col-md-4 text-md-right">{{ __('Photo') }}</div>
					<div class="col-md-6">{{ $user->photo }}</div>
				</div>
				<div class="row my-4">
					<div class="col-md-6 offset-md-4">
						<a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">
							{{ __('Edit Profile') }}
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection