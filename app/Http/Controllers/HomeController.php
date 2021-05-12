<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{


    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index()
    {
        $products =  $this->product->limit(6)->orderBy('id', 'DESC')->get();
        $stores =  \App\Store::limit(3)->orderBy('id', 'DESC')->get();

        $categories = \App\Category::all(['name', 'slug']);

        return view('welcome', compact('products', 'stores', 'categories'));
    }

    public function single($slug){
         $product = $this->product->whereSlug($slug)->first();

         return view('single', compact('product'));

    }
}
