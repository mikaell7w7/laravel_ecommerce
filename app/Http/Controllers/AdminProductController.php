<?php
/**
 * Created by PhpStorm.
 * User: mikaell
 * Date: 20/07/2015
 * Time: 15:35
 */

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;


class AdminProductController extends Controller {

    private $products;

    public function __construct(Product $product)
    {
        $this->middleware('guest');
        $this->products = $product;
    }


    public function products()
    {

        $products = $this->products->all();
        return view('products',compact('products'));

    }


    public function contato()
    {
        return "MEUS CAROS COMPANHEIROS TAG";
    }

}
