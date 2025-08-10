<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Product;

class WebController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $major_categories = MajorCategory::all();

        $recently_products = Product::with('reviews')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();
        
        foreach ($recently_products as $product) {
            $product->average_rating = round($product->reviews->avg('score') * 2) / 2;
        }
        
        $recommend_products = Product::where('recommend_flag', true)
        ->take(3)
        ->get();
        
        foreach ($recommend_products as $product) {
            $product->average_rating = round($product->reviews->avg('score') * 2) / 2;
        }
        
        return view('web.index', compact('major_categories', 'categories', 'recently_products', 'recommend_products'));
    }
}
