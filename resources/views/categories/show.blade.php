@extends('layouts.app')

@section('content')

	<div class="container py-5">
		<div class="alert">
			@include('alerts')
		</div>
		<div class="text-right">
			<a href="{{ route('categories.new') }}" class="btn btn-primary mb-3">{{ __('New Category') }}</a>
		</div>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">{{ __('Category') }}</th>
					<th scope="col">{{ __('Products') }}</th>
					<th scope="col">{{ __('Actions') }}</th>
				</tr>
			</thead>
			<tbody>

				@foreach ($categories as $category)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td>{{ $category->title }}</td>
						<td><a href="{{ route('shop', ['category' => $category->id]) }}">{{ $category->products->count() }}</a></td>
						<td>
							<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mr-3">{{ __('Edit') }}</a><a href="{{ route('categories.drop', $category->id) }}" class="btn btn-danger" onclick='return confirm("Are you sure?")'>{{ __('Delete') }}</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection