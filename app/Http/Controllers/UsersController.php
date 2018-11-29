<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UsersController extends Controller {

	// public function index() {
	//
	// }

	public function show() {
		return view('profile', ['user' => Auth::user()]);
	}


	// public function edit($id) {
	//
	// }

	public function update(Request $request) {
		if ($request->hasFile('photo')) {
			$photo    = $request->file('photo');
			$filename = time() . '.' . $photo->getClientOriginalExtension();
			Image::make($photo)->resize(
				300, null, function ($constraint) {
				$constraint->aspectRatio();
			}
			)->save(public_path('/uploads/users/' . $filename));
			$user        = Auth::user();
			$user->photo = $filename;
			$user->save();
		}

		return view('profile', ['user' => Auth::user()])->with('success', 'You have successfully upload image.');
	}

	public function destroy($id) {
		$user = User::find($id);
		$user->delete();

		return 'deleted';
	}

}
