@extends('store.store')

@section('categories')
        @include('store.partial.categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">PRODUTOS</h2>

            @foreach($product as $products)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">


                            @if(count($products->images))
                                <img src="{{url('uploads/'.$products->images->first()->id.'.'.$products->images->first()->extension)}}" alt="" height="200px" />
                            @else
                                <img src="{{url('images/no-img.jpg')}}" alt="" width="200px" />
                            @endif

                            <h2>R$ {{$products->price}}</h2>
                            <p>{{$products->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ {{$products->price}}</h2>
                                <p>{{$products->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div><!--features_items-->





    </div>
@stop