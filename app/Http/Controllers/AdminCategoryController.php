<?php
/**
 * Created by PhpStorm.
 * User: mikaell
 * Date: 20/07/2015
 * Time: 15:35
 */

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;


class AdminCategoryController extends Controller {

    private $categories;

    public function __construct(Category $category)
    {
        $this->middleware('guest');
        $this->categories = $category;
    }


    public function categories()
    {

        $categories = $this->categories->all();
        return view('categories',compact('categories'));

    }


    public function contato()
    {
        return "MEUS CAROS COMPANHEIROS TAG";
    }

}
