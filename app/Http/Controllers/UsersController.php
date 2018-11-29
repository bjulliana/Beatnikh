<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UsersController extends Controller {

	public function show() {
		return view('auth.profile', ['user' => Auth::user()]);
	}

	public function edit($id) {
		$user = Auth::user($id);

		return view('auth.edit', compact('user'));
	}

	public function update(Request $request, $id) {

		$data      = request()->input();
		$validator = validator()->make(
			$data, [
				     'name'     => ['required', 'string', 'max:255'],
				     'email'    => ['required', 'string', 'email', 'max:255'],
				     'username' => ['required', 'string', 'max:30'],
				     'photo'    => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
			     ]
		);

		if ($validator->passes()) {
			$user           = Auth::user();
			$user->name     = $request->get('name');
			$user->email    = $request->get('email');
			$user->username = $request->get('username');

			if ($request->hasFile('photo')) {
				$photo    = $request->file('photo');
				$filename = time() . '.' . $photo->getClientOriginalExtension();
				Image::make($photo)->resize(
					300, null, function ($constraint) {
					$constraint->aspectRatio();
				}
				)->save(public_path('/uploads/users/' . $filename));
				$user->photo = $filename;
			}
			$user->save();

			return view('auth.profile', ['user' => Auth::user()])->with('success', 'Your changes were saved successfully.');
		}

		return view('auth.profile', ['user' => Auth::user()])->withErrors($validator->errors())->withInput()->with('error', 'Problem Updating Profile!');
	}

	public function destroy($id) {
		$user = User::find($id);
		$user->delete();

		return view('home');
	}

}
