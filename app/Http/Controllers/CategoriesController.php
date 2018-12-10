<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller {

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		$categories = Category::with('products')->get();

		return view('categories.show', compact('categories'));
	}

	/**
	 * @param array $data
	 *
	 * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
	 */
	public function validator(array $data) {
		return Validator::make(
			$data, [
				     'title' => ['required', 'string', 'max:255'],
				     'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
			     ]
		);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create() {
		return view('categories.create');
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
				     'title' => ['required', 'string', 'max:255'],
				     'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
			     ]
		);

		if ($validator->passes()) {

			$request  = app('request');
			$filename = '';

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

			return redirect(route('categories.show'))->with('success', 'Category created successfully!');
		}

		return redirect()->back()->withErrors($validator->errors())->withInput()->with('error', 'Problem creating category!');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id) {
		$category = Category::find($id);

		return view('categories.edit', compact('category'));
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, $id) {

		$data      = request()->input();
		$validator = validator()->make(
			$data, [
				     'title' => ['required', 'string', 'max:255'],
				     'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
			     ]
		);

		if ($validator->passes()) {
			$category        = Category::find($id);
			$category->title = $request->get('title');

			if ($request->hasfile('image')) {
				$image_path = public_path() . '/uploads/categories/' . $category->image;
				File::delete($image_path);

				$image    = $request->file('image');
				$filename = $image->getClientOriginalName();
				Image::make($image)->resize(
					500, null, function ($constraint) {
					$constraint->aspectRatio();
				}
				)->save(public_path('/uploads/categories/' . $filename));
				$category->image = $filename;
			}

			$category->save();

			return redirect(route('categories.show'))->with('success', 'Category Updated successfully!');
		}

		return redirect()->back()->withErrors($validator->errors())->withInput()->with('error', 'Problem Updating Category!');
	}

	public function destroy($id) {
		$category = Category::find($id);
		$image_path = public_path() . '/uploads/categories/' . $category->image;
		File::delete($image_path);

		$category->delete();

		return redirect(route('categories.show'))->with('success', 'Category ' . $category->title . ' Deleted!');
	}

}

