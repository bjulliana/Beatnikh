<div class="feature-products mb-5 pt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb-4">
				<div class="section-title">
					<h2>Featured <span>Products</span></h2>
					<p>Browse the collection of recently added products.</p>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($products as $product)
				@if($loop->iteration > 4)
					@break
				@endif
				<div class="col-6 col-sm-4 col-lg-3">
					<div class="feature-product">
						<div class="image">
							<a href="{{ url('products/show') }}/{{ $product->id }}" tabindex="-1">
								<img src="/uploads/products/{{ $product->images->first()->file_name }}" class="img-fluid" alt="">
							</a>
							<a class="hover-icon" href="#" data-toggle="modal" data-target="#quick-view-modal-container" tabindex="-1"><i class="lnr lnr-eye"></i></a>
							<a class="hover-icon" href="#" tabindex="-1"><i class="lnr lnr-heart"></i></a>
						</div>
						<div class="content">
							<p class="product-title"><a href="#" tabindex="-1">{{ $product->title }}</a></p>
							<p class="price">${{ $product->price }}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
