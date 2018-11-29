<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller {

	public function index() {
		$categories = Category::with('products')->get();
		// $categories = Category::pluck('title', 'id');
		// $categories = Category::select()->join('products', 'categories.id', '=', 'products.category_id')->get();
		// $products = Product::select()->join('categories', 'products.category_id', '=', 'categories.id')->get();

		return view('categories.show', compact('categories', 'products'));
	}

	public function validator(array $data) {
		return Validator::make(
			$data, [
				     'title' => ['required', 'string', 'max:255'],
				     'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
			     ]
		);
	}

	public function create() {
		return view('categories.create');
	}

	public function store(Request $request) {

		$data      = request()->input();
		$validator = validator()->make(
			$data, [
				     'title' => ['required', 'string', 'max:255'],
				     'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
			     ]
		);

		if ($validator->passes()) {

			$request = app('request');

			if ($request->hasfile('image')) {
				$image    = $request->file('image');
				$filename = $image->getClientOriginalName();
				Image::make($image)->resize(
					500, null, function ($constraint) {
					$constraint->aspectRatio();
				}
				)->save(public_path('/uploads/categories/' . $filename));
			}

			$category = new Category(
				[
					'title' => request()->input('title'),
					'image' => $filename,
				]
			);

			$category->save();

			return back()->with('success', 'Category created successfully!');
		}

		return redirect()->back()->withErrors($validator->errors())->withInput()->with('error', 'Problem creating category!');
	}

	public function show($id) {

	}

	public function edit($id) {

	}

	public function update($id) {

	}

	public function destroy($id) {

	}

}

?>