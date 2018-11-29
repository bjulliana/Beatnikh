@extends('layouts.app')
@section('content')

	<div class="container">
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

			<div class="profile-header-container">
				<div class="profile-header-img">
					<img class="rounded-circle" src="/uploads/users/{{ $user->photo }}" />
					<!-- badge -->
					<div class="name-container">
						<h2><span class="badge badge-primary">{{$user->name}}</span></h2>
					</div>
				</div>
			</div>

		</div>
		<div class="row justify-content-center">
			<form action="/profile" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<input type="file" class="form-control-file" name="photo" id="user-photo" aria-describedby="fileHelp">
					<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection