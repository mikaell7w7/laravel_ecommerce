@extends('store.store')


    @section('content')
       <div class="container">
          <h3>Meus Pedidos</h3>
           <table class="table">
               <tbody>
               <tr>
                   <th>#ID</th>
                   <th>Itens</th>
                   <th>Valor</th>
                   <th>Status</th>
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
                            PAGO
                         @elseif($order->status == 2)
                            AGUARDANDO RETIRADA
                         @elseif($order->status == 3)
                            ENTREGUE
                       @endif
                   </td>
               </tr>
               @endforeach

               </tbody>

           </table>

       </div>



    @stop