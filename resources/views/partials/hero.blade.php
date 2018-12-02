<div class="hero-area mb-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="hero-category-container p-4">
					<div class="row">
						<div class="col-lg-3">
							<div class="hero-side-category">
								<nav class="category-menu" style="">
									<ul>
										@foreach($categories as $category)
											@if ($category->products->count() > 0)
												<li><a href="#">{{ $category->title }}</a></li>
											@endif
										@endforeach
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-12 col-md-4 col-lg-6 mb-md-20 mb-sm-20">
							<div class="product-container">
								<img src="https://placeimg.com/520/450/arch">
							</div>
						</div>
						<div class="col-12 col-md-8 col-lg-3 pt-4 pt-md-0">
							<div class="row">
								<div class="col-6 col-lg-12 col-md-6">
									<div class="banner mb-4">
										<a href="#">
											<img src="https://placeimg.com/245/215/arch" class="img-fluid" alt="">
										</a>
									</div>
								</div>

								<div class="col-6 col-lg-12 col-md-6">
									<div class="banner">
										<a href="#">
											<img src="https://placeimg.com/245/215/arch" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-md-6 feature-area py-5 px-0">
				<div class="single-feature">
					<span class="icon"><i class="lnr lnr-rocket"></i></span>
					<p>Free Shipping <span>Free shipping on all US order</span></p>
				</div>
				<div class="single-feature">
					<span class="icon"><i class="lnr lnr-phone"></i></span>
					<p>Support 24/7 <span>Contact us 24 hours a day</span></p>
				</div>
			</div>
			<div class="col-12 col-md-6 feature-area py-5 px-0">
				<div class="single-feature">
					<span class="icon"><i class="lnr lnr-undo"></i></span>
					<p>100% Money Back <span>You have 30 days to Return</span></p>
				</div>
				<div class="single-feature">
					<span class="icon"><i class="lnr lnr-gift"></i></span>
					<p>Payment Secure <span>We ensure secure payment</span></p>
				</div>
			</div>
		</div>
	</div>
</div>
