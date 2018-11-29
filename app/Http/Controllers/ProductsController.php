<?php

namespace App\Http\Controllers;

use App\Category;
use App\Message;
use App\ProductsImage;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller {

	public function index() {
		$products = Product::join('product_images', 'products.id', '=', 'product_images.product_id')->select()->get();

		// return $authors;
		return view('products.all', compact('products'));
	}

	public function create() {
		$categories = Category::pluck('title', 'id');

		return view('products.create', compact('categories'));
	}

	public function store(Request $request) {

		$data      = request()->input();
		$validator = validator()->make(
			$data, [
				     'title'       => ['required', 'max:255'],
				     'description' => ['required'],
				     'price'       => ['required'],
				     'category_id' => ['required'],
				     'photo.*'     => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
			     ]
		);

		if ($validator->passes()) {
			$product = new Product(
				[
					'title'       => request()->input('title'),
					'description' => request()->input('description'),
					'price'       => request()->input('price'),
					'category_id' => request()->input('category_id'),
					'user_id'     => auth()->id(),
				]
			);
			$product->save();

			$request = app('request');

			if ($request->hasfile('images')) {

				$images = $request->images;
				foreach ($images as $image) {
					$filename = uniqid() . '.' . $image->getClientOriginalExtension();
					Image::make($image)->resize(
						500, null, function ($constraint) {
						$constraint->aspectRatio();
					}
					)->save(public_path('/uploads/products/' . $filename));
					$image            = new ProductsImage();
					$image->file_name = $filename;
					$image->images()->associate($product);
					$image->save();
				}
			}

			return back()->with('success', 'Product created successfully!');
		}

		return redirect()->back()->withErrors($validator->errors())->withInput()->with('error', 'Problem creating product!');
	}

	public function show($id) {
		$product  = Product::with('images', 'user')->find($id);
		$messages = Message::join('users', 'messages.user_id', '=', 'users.id')
		                   ->where('messages.product_id', '=', $product->id)
		                   ->orderBy('messages.created_at', 'desc')
		                   ->select()->get();

		return view('products.show', compact('product', 'messages'));
	}

	public function edit($id) {

	}

	public function update($id) {

	}

	public function destroy($id) {

	}

}

?>