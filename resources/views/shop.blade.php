@extends('layouts.app')

@section('content')
	<div class="shop-page-content py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="sidebar-container shop-sidebar-container">
						<div class="single-sidebar-widget mb-3">
							<h3 class="sidebar-title">Categories</h3>
							<ul class="category-list">
								<li><a href="{{ route('shop') }}">All</a></li>
								@foreach ($categories as $category)
									@if ($category->products->count() > 0)
										<li class=""><a href="{{ route('shop', ['category' => $category->id]) }}">{{ $category->title }}</a>
									@endif
								@endforeach
							</ul>
						</div>

						<div class="single-sidebar-widget">
							<h3 class="sidebar-title mb-4">Filter By</h3>
							<div class="sub-widget mb-4">
								<h3 class="sidebar-title">Categories</h3>
								<ul class="checkbox-list">
									@foreach ($categories as $category)
										@if ($category->products->count() > 1)
											<li class="checkbox-item">
												<label class="checkbox-label">
													<input type="checkbox" class="checkbox" name="category_name" value="{{ $category->id }}">{{ $category->title }}
												</label>
											</li>
										@endif
									@endforeach
								</ul>
							</div>

							<div class="sub-widget mb-4">
								<h3 class="sidebar-title">Price</h3>
								<ul class="radio-list">
									<li class="radio-item">
										<label class="radio-label">
											<input type="radio" class="radio" name="foo">Item 1
										</label>
									</li>
									<li class="radio-item">
										<label class="radio-label">
											<input type="radio" class="radio" name="foo">Item 1
										</label>
									</li>
									<li class="radio-item">
										<label class="radio-label">
											<input type="radio" class="radio" name="foo">Item 1
										</label>
									</li>
									<li class="radio-item">
										<label class="radio-label">
											<input type="radio" class="radio" name="foo">Item 1
										</label>
									</li>

								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9 order-1 order-lg-2">
					<div class="shop-header mb-20">

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 mb-sm-20 d-flex align-items-center">
								<p class="result-show-message">Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-column flex-sm-row justify-content-start justify-content-md-end align-items-sm-center">

								<div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
									{{--<p class="mr-10 mb-0">Sort By: </p>--}}
									<div>
										<strong>Sort By Price: </strong>
										<a href="{{ route('shop', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
										<a href="{{ route('shop', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>

									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row shop-product-wrap py-5">
						@foreach($products as $product)
							<?php //var_dump($product)?>
							<div class="col-sm-6 col-md-4">
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
					<div class="row">
						<div class="d-block m-auto">
							<div class="pagination-content">
								{{ $products->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
