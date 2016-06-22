<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function place(Order $orderModel, OrderItem $orderItem) //responsavel pelo processamento do carrinho
    {
        if(!Session::has('cart')){
            return false;
        }

        $cart = Session::get('cart');

        $categories = Category::all();

        if($cart->getTotal() > 0){


            $order = $orderModel->create(['user_id'=>Auth::user()->id,'total'=>$cart->getTotal()]); //Create Oders
            //CRIAR AQUI GRAVAÇÃO DO BOLETO
            foreach($cart->all() as $k => $item){

                $order->items()->create(['product_id'=> $k ,'price'=> $item['price'],'qtd'=> $item['qtd']]); //Create Itens

            }

           //dd($order->items);
           // dd($order);
            $cart->clear();

            event( new CheckoutEvent());

            return view('store.checkout',compact('order','cart','categories'));
        }
        return view('store.checkout',['cart'=>'empty'],compact('categories'));
    }
}
