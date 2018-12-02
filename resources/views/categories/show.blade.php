@extends('layouts.app')

@section('content')

	<div class="container py-5">
		<div class="alert mt-4">
			@include('alerts')
		</div>
		<div class="text-right">
			<a href="{{ route('categories.new') }}" class="btn btn-primary mb-3">New Category</a>
		</div>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Category</th>
					<th scope="col">Products</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>

				@foreach ($categories as $category)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td>{{ $category->title }}</td>
						<td><a href="#">{{ $category->products->count() }}</a></td>
						<td>
							<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mr-3">Edit</a><a href="{{ route('categories.drop', $category->id) }}" class="btn btn-danger" onclick='return confirm("Are you sure?")'>Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection