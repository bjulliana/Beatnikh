@extends('layouts.app')

@section('content')
	<div class="shop-page-content py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="sidebar-container shop-sidebar-container">
						<div class="single-sidebar-widget mb-3">
							<h3 class="sidebar-title">Sofas &amp; Chairs</h3>
							<ul class="category-list">
								@foreach ($categories as $category)
									<li class=""><a href="#">{{ $category->title }}</a>
								@endforeach
							</ul>
						</div>

						<div class="single-sidebar-widget">
							<h3 class="sidebar-title mb-4">Filter By</h3>
							<div class="sub-widget mb-4">
								<h3 class="sidebar-title">Categories</h3>
								<ul class="checkbox-list">
									<li class="checkbox-item">
										<label class="checkbox-label">
											<input type="checkbox" class="checkbox">Item 1
										</label>
									</li>
									<li class="checkbox-item">
										<label class="checkbox-label">
											<input type="checkbox" class="checkbox">Item 2
										</label>
									</li>
									<li class="checkbox-item">
										<label class="checkbox-label">
											<input type="checkbox" class="checkbox">Item 2
										</label>
									</li>
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
								<p class="result-show-message">Showing 1–12 of 41 results</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-column flex-sm-row justify-content-start justify-content-md-end align-items-sm-center">

								<div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
									<p class="mr-10 mb-0">Sort By: </p>
									<label class="d-none" for="sort-by">Sort Results</label>
									<select name="sort-by" id="sort-by" class="nice-select">
										<option value="0">Newest First</option>
										<option value="0">Price: Low to High</option>
										<option value="0">Price: High to Low</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					@include('products.index')

					{{--<div class="row shop-product-wrap py-5">--}}
						{{--@foreach($products as $product)--}}
							{{--<div class="col-sm-6 col-md-4">--}}
								{{--<div class="feature-product">--}}
									{{--<div class="image">--}}
										{{--<a href="{{ url('products/show') }}/{{ $product->id }}" tabindex="-1">--}}
											{{--<img src="/uploads/products/{{ $product->images->first()->file_name }}" class="img-fluid" alt="">--}}
										{{--</a>--}}
										{{--<a class="hover-icon" href="#" data-toggle="modal" data-target="#quick-view-modal-container" tabindex="-1"><i class="lnr lnr-eye"></i></a>--}}
										{{--<a class="hover-icon" href="#" tabindex="-1"><i class="lnr lnr-heart"></i></a>--}}
									{{--</div>--}}
									{{--<div class="content">--}}
										{{--<p class="product-title"><a href="#" tabindex="-1">{{ $product->title }}</a></p>--}}
										{{--<?php var_dump($product->category->id)?>--}}

										{{--<p class="price">${{ $product->price }}</p>--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--@endforeach--}}
					{{--</div>--}}
					<div class="pagination-container mt-50 pb-20 mb-md-80 mb-sm-80">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 text-center text-md-left mb-sm-20">
								<p class="show-result-text">Showing 1-12 of 14 item(s)</p>
							</div>

							<div class="col-lg-8 col-md-8 col-sm-12">
								<div class="pagination-content text-center text-md-right">
									<p>Previous 1 2 3 4 5 6 Next</p>
									{{--<ul>--}}
									{{--<li><a href="#"><i class="fa fa-angle-left"></i> Previous</a></li>--}}
									{{--<li><a class="active" href="#">1</a></li>--}}
									{{--<li><a href="#">2</a></li>--}}
									{{--<li><a href="#">3</a></li>--}}
									{{--<li><a href="#">4</a></li>--}}
									{{--<li><a href="#">Next <i class="fa fa-angle-right"></i> </a></li>--}}
									{{--</ul>--}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
