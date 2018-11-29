<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Admin {

	public function handle($request, Closure $next) {
		if (auth()->check()){
			if (User::isAdmin()){
				return $next($request);
			}
		}
		return abort(404);


		// if (auth()->user()->isAdmin()) {
		// 	return $next($request);
		// }
		//
		// return redirect('home');
	}
}
