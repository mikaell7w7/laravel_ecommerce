@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Preço</td>
                            <td class="price">Qtd</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('store.product', ['id' => $k]) }}">
                                    imagem
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4>
                                    <a href="{{ route('store.product', ['id' => $k]) }}">{{$item['name']}}</a>
                                </h4>
                                <p>Código: {{$k}}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{$item['price']}}
                            </td>
                            <td class="cart_quantity">
                                {{$item['qtd']}} : <a href="{{ route('cart.add', ['id' => $k]) }}">  <span class="glyphicon glyphicon-arrow-up" aria-hidden="true" style="font-size: 0.9em"></span> </a>  <a href="{{ route('cart.minus', ['id' => $k]) }}" ><span class="glyphicon glyphicon-arrow-down" aria-hidden="true" style="font-size: 0.9em"></span> </a>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"> R$ {{$item['price'] * $item['qtd']}}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy', ['id' => $k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                     @empty
                        <tr>
                            <td class="" colspan="6">
                                <h3>A sua carreta está vazia!!.</h3>
                            </td>
                        </tr>
                     @endforelse
                        <tr class="cart_menu">
                            <td colspan="6">
                                <div class="pull-right">
                                        <span style="margin-right: 75px">
                                            TOTAL: R$ {{$cart->getTotal()}}
                                        </span>
                                        <a href="#" class="btn btn-success"> Fechar a Compra</a>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop