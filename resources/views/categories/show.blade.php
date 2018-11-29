@extends('layouts.app')

@section('content')

	<div class="container py-5">
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
<pre><?php var_dump($category) ?></pre>
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td>{{ $category->title }}</td>
						<td>{{ $category->title }}</td>
						<td><a class="btn btn-primary">Edit</a><a href="" class="btn btn-danger">Delete</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection