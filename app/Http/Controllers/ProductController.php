<?php

namespace App\Http\Controllers;

use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::latest();
        if (request('search')) {
            $product
              ->where('kode_product', 'like', '%' . request('search') . '%')
              ->orWhere('name', 'like', '%' . request('search') . '%');
        }

        $viewData = [
          'title' => 'Product - Online Store',
          'subtitle' => 'List of products',
          'products' => $product->paginate(6)
        ];
        return view('product.index')
          ->with("viewData", $viewData);
    }

    public function show($slug)
    {

        $product = Product::where('slug', $slug)->first();

        $recommendedProducts = Product::where('category_id', $product->category_id)
          ->where('slug', '!=', $product->slug)
          ->inRandomOrder()
          ->limit(4)
          ->get();
        $viewData = [
          'title' => $product->getName()." - Online Store",
          'subtitle' => $product->getName()." - Product information",
          'product' => $product,
          'recomends' => $recommendedProducts
        ];

        return view('product.show')->with("viewData", $viewData);
    }
}
