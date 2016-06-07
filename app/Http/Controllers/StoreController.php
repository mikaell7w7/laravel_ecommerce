<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;


class StoreController extends Controller
{
    public function index()
    {
        // $pFeatured = Product::where('featured','=','1')->get(); //substituido por query scope na model
        $pFeatured = Product::featured()->get();
        $pRecommended = Product::recommended()->get();

        $categories = Category::all();

        return view('store.index',compact('categories','pFeatured','pRecommended'));

    }

    public function productsCategories($id)
    {
        $product = Product::where('category_id','=',$id)->get();
        $categories = Category::all();
        return view('store.products_categories',compact('categories','product'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::ofCategory($id)->get();

        return view('store.category',compact('categories','category','products'));

    }

    public function product($id)
    {
        $categories = Category::all();

        $product = Product::find($id);



        return view('store.product',compact('categories','product'));

    }

    public function tags($id)
    {
        $categories = Category::all();

        $productsWithTag = Tag::find($id)->products()->get();

        $tag = Tag::find($id);


        return view('store.tags',compact('categories','productsWithTag','tag'));
    }
}
