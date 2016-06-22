@extends('app')

@section('content')
    <div class="container">
        <h1>Editar Order {{$order->id}}</h1>

        <!-- Retorna os erros da valida��o -->


        {!! Form::open(['route'=>['orders.update',$order->id,'method'=>'put']]) !!}


        <div class="form-group">
            {!! Form::label('status','Status:') !!}
            {!! Form::select('status', array('Escolha' => array('Aguardando Pagamento', 'Pago', 'Aguardando Retirada', 'Entregue')))  !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Alterar Status', ['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}


    </div>
@endsection
