<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct( Category $category)
	{

        $this->middleware('guest');
        $this->categories = $category;
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

    public function exemplo()
    {
       /* EXEMPLO 01
        $nome = "Mikaell ";
        $sobrenome = "Barbosa de Araujo";

        // return view('exemplo')->with('nome',$nome); // EXEMPLO 1
        //return view('exemplo',['nome'=>$nome,'sobrenome'=>$sobrenome]); // EXEMPLO 2 - ARRAY
        return view('exemplo',compact('nome','sobrenome')); // EXEMPLO 3 - compact

       */

      // $categories = Category::all();
        $categories = $this->categories->all();
        return view('exemplo',compact('categories'));




    }


    public function contato()
    {
        return "MEUS CAROS COMPANHEIROS TAG";
    }

}
