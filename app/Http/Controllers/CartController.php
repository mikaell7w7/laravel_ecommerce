<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    private $cart ;

    /**
     * @param Cart $cart
     */

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;

    }

    public function index()
    {
        if(!Session::has('cart')){ //caso eu não tenha uma sessão chamada 'cart'
            Session::set('cart', $this->cart); // recebe $this->cart
        }

        return view('store.cart',['cart' => Session::get('cart')]); // passa o conteúdo da sessão para view
    }

    public function add($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);
        $cart->add($id, $product->name, $product->price);

        Session::set('cart',$cart);

        return redirect()->route('cart');

    }


    public function minus($id)
    {

        $cart = $this->getCart();

        $product = Product::find($id);
        $cart->minus($id);

        Session::set('cart',$cart);

        return redirect()->route('cart');

    }


    public function destroy($id){

        $cart = $this->getCart();

        $cart->remove($id);

        Session::set('cart',$cart);

        return redirect()->route('cart');

    }

    /**
     * @return Cart
     */
    private function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');

        } else {
            $cart = $this->cart;

        }

        return $cart;
    }


}
