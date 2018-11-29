<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller {

	public function __construct() {
		$this->middleware('auth')->except('index');
	}

	public function index() {

		$categories = Category::select()->get();
		$products   = Product::join('product_images', 'products.id', '=', 'product_images.product_id')->select()->get();

		return view('home', compact('categories', 'products'));
	}
}
