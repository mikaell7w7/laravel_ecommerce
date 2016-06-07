<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::any('/exemplo3',function(){ echo "olha ai , olha ai";}); qualquer método GET, POST, PUT...
//Route::get('exemplo2', function(){ echo "tralala"; }); // usando função anônima


///////////////////////////////////////////
//PARAMENTROS SIMPLES (sem validação de tipo)
/*
Route::get('user/{id?}',function($id=0){
    if($id){
        return "Ola $id";
    }
    else{
        return "Nao tem ID";
    }

});
*/

////////////////////////////////////////
//PARAMENTROS VALIDADORES ESTATICO LOCAL
/*
Route::get('user/{id?}',function($id=0){
    if($id){
        return "Ola $id";
    }
    else{
        return "Nao tem ID";
    }

})->where('id','[0-9]+'); // Restringe através do pattern que apenas valores numeros com pelo menos 1 digito serão aceitos.
*/

/*
 * ------------------
 * NAMES ROUTES
 * ------------------
 */
/*
Route::get('produtos',['as'=>'produtosz',function(){
    //echo Route::currentRouteName(); // traz a rota que está sendo acessada no momento
    return "Produtos";

}]);
//echo route('produtosz');die; // HELPER PARA IMPRIMIR a url de uma ROTA

*/







/*
 * ---------------------------
 * PASSANDO MODELS NA ROTAS - Envolve o método "boot" em /app/Http/Providers/RouteServiceProvider
 *
 * ---------------------------
 */

// FORMA 1

Route::get('category/{id}',function($id){
   $category = new \CodeCommerce\Category();
   $c = $category->find($id);
   return $c->name;
});

//FORMA 2 - O QUE é passado, é de fato o objeto da minha category
// vide RouteServiceProvider
// Injeta na rota o model principal que será trabalhado


Route::get('category2/{category}',function(\CodeCommerce\Category $category){

   // return $category->name;

    dd($category);

});


/*
 * ----------------------------
 */







/*
 * -------------------
 * ROTAS AGRUPADAS
 * --------------------
 * Tudo que estiver no grupo de rotas, irá seguir o prefixo, podendo ser encadeado rota dentro de rota
 */

Route::group(['prefix'=>'admin'],function(){ // pode ser usado pra namespace ['namespace'=>'admin'] /middleware ['middleware'=>'admin|xpto|xyz']
    Route::get('categories','AdminCategoryController@categories');
    Route::get('products','AdminProductController@products');
});

 /*
  * ------------------
  */



Route::pattern('id','[0-9]+'); // APLICA O PATERN A TODAS AS ROTAS

Route::get('user/{id?}',function($id=0){
    if($id){
        return "Ola $id";
    }''
    else{
        return "Nao tem ID";
    }

});


Route::get('/', 'WelcomeController@index');

Route::get('exemplo', 'WelcomeController@exemplo');

Route::get('contato', 'WelcomeController@contato');

Route::get('home', 'HomeController@index');

/*
 * Agrupado Acima
 *
 * Route::get('admin/categories','AdminCategoryController@categories');
 * Route::get('admin/products','AdminProductController@products');
 *
 */


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
