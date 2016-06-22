@extends('app')

@section('content')
    <div class="container">
        <h1>Pedidos</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>>
                <th></th>

            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{$item->product->name}} / {{$item->product->price}} /{{$item->qtd}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$order->total}}</td>
                <td>
                    @if($order->status == 0)
                        <button class="alert-danger">AGUARDANDO PAGAMENTO</button>
                    @elseif($order->status == 1)
                        <button class="alert-success"> PAGO </button>
                    @elseif($order->status == 2)
                       <button class="alert-info">AGUARDANDO RETIRADA</button>
                    @elseif($order->status == 3)
                       <button class="alert-link">ENTREGUE</button>
                    @endif
                </td>
                <td><a href={{route('orders.edit',['id'=>$order->id])}}> Alterar Status</a></td>

            </tr>
            @endforeach
        </table>
        {!!$orders->render()!!}
    </div>
@endsection
