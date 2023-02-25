<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;


class ProductController extends Controller
{
	public object $products;
	
	public function __construct(Product $products) {
		$this->products = $products;
	}
	public function index() {
		$products = $this->products->all();
		//echo "<pre>";
		//print_r($products);exit;
        return view('products.index', compact('products'));
	}
	
	public function showProductDetils(Request $req, $id) {
		
		$productInfo = $this->products->find($id);
		//echo "<pre>";
		//print_r($productInfo->name);exit;
        return view('products.productDetails',compact('productInfo'));
	}
}
