<?php

namespace App\Http\Controllers;

use App\Category;
use App\Message;
use App\ProductsImage;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller {

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {

		$pagination = 9;
		$categories = Category::with('products')->orderBy('title', 'asc')->get();

		if (request()->category) {
			$products = Product::with('category')->whereHas(
				'category', function ($query) {
				$query->where('category_id', request()->category);
			}
			)->paginate($pagination);
		} else {
			$products = Product::with('category')->paginate($pagination);
		}
		
		if (request()->sort == 'low_high') {
			$products = Product::with('category')->orderBy('price')->paginate($pagination);
		} else if (request()->sort == 'high_low') {
			$products = Product::with('category')->orderBy('price', 'desc')->paginate($pagination);
		} else {
			$products = Product::with('category')->paginate($pagination);
		}

		return view('shop', compact('products', 'categories'));
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create() {
		$categories = Category::pluck('title', 'id');

		return view('products.create', compact('categories'));
	}

	/**
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
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

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id) {
		$product  = Product::with('images', 'user')->find($id);
		$messages = Message::join('users', 'messages.user_id', '=', 'users.id')
		                   ->where('messages.product_id', '=', $product->id)
		                   ->orderBy('messages.created_at', 'desc')
		                   ->select()->get();

		return view('products.show', compact('product', 'messages'));
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id) {
		$product    = Product::find($id);
		$images     = $product->images()->get();
		$categories = Category::pluck('title', 'id');

		return view('products.edit', compact('product', 'categories', 'images'));
	}

	/**
	 * @param \Illuminate\Http\Request $request
	 * @param                          $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, $id) {
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
			$product              = Product::find($id);
			$product->title       = $request->get('title');
			$product->description = $request->get('description');
			$product->price       = $request->get('price');
			$product->category_id = $request->get('category_id');

			$product->save();

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

			return redirect(route('profile.show') . '#products')->with('success', 'Product Updated successfully!');
		}

		return redirect()->back()->withErrors($validator->errors())->withInput()->with('error', 'Problem Updading product!');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function destroy($id) {
		$product = Category::find($id);
		Storage::detele($product->images);
		$product->delete();

		return view('auth.profile')->with('success', 'Product Deleted!');
	}

}
