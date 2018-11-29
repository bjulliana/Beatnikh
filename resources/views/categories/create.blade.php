@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="alert mt-4">
			@include('alerts')
		</div>
		<div class="row justify-content-center py-5">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('New Category') }}</div>

					<div class="card-body">
						<form method="POST" action="{{ url('category/add') }}" enctype="multipart/form-data">
							@csrf

							<div class="form-group row">
								<label for="cat_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

								<div class="col-md-6">
									<input id="cat_title" type="text" class="form-control{{ $errors->has('cat_title') ? ' is-invalid' : '' }}" name="cat_title" value="{{ old('cat_title') }}" required autofocus>

									@if ($errors->has('cat_title'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('cat_title') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Category Image') }}</label>

								<div class="col-md-6">
									<input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

									@if ($errors->has('image'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('image') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Register') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
