<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller {

	public function search(Request $request) {
		if ($request->ajax()) {
			$output    = '';
			$products  = Product::with('images')->where('title', 'LIKE', '%' . $request->search . "%")->get();
			$total_row = $products->count();
			if ($total_row > 0) {
				foreach ($products as $key => $product) {
					$output .= '<ul>' .
					           '<li><a href="' . route('products.show', $product->id) . '">' . $product->id .
					           '<img src="/uploads/products/' . $product->images->first()->file_name . '">' . $product->title . '</a></li>' .
					           '</ul>';
				}
				return Response($output);

			} else {
				$output .= '<p>No Results</p>';
			}

			$products = array(
				'table_data' => $output,
				'total_data' => $total_row
			);

			echo json_encode($products);
		}
	}
}