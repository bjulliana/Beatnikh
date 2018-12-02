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

		$categories = Category::with('products')->orderBy('title', 'asc')->get();
		$products   = Product::with('images')->get();

		return view('home', compact('categories', 'products'));
	}
}
