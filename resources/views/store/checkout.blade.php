@extends('store.store')

    @section('categories')
        @include('store.partial.categories')
    @stop

    @section('content')
       <div class="container">
        @if($cart == 'empty')
            <h3>Carrinho de compras vazio !!</h3>
        @else
        <div class="col-sm-9 padding-right">
            <h3>Pedido realizado com sucesso !</h3>
            <p>O pedido #{{$order->id}}, foi realizado com sucesso.</p>
        </div>
        @endif
       </div>



 @stop