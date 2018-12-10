<div class="popular-categories pt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb-5">
				<div class="section-title">
					<h2>{{ __('Popular ') }} <span>{{ __('Categories') }}</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($categories as $category)
				@if($loop->iteration > 4)
					@break
				@endif
				<div class="col-6 col-md-3">
					<div class="category-banner">
						<a href="{{ route('shop', ['category' => $category->id]) }}">
							<img src="/uploads/categories/{{ $category->image }}" class="img-fluid" alt="">
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
