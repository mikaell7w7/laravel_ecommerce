@extends('app')

@section('content')
    <div class="container">
        <h1>Create Products</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>
                        {{$erro}}
                    </li>
                @endforeach
            </ul>
        @endif
        <div class="form-group">

            {!! Form::open(['route'=>'products.store'],['class'=>'form form-horizontal']) !!}

            <!--  Name -->
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control ','placeholder'=>'Nome do Produto']) !!}
            </div>

            <!--  Category -->
            <div class="form-group">
                {!! Form::label('category','Category:') !!}
                {!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}
            </div>

            <!--  Description -->
            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description',null,['class'=>'form-control']) !!}
            </div>

            <!--  Price -->
            <div class="form-group">
                {!! Form::label('price','Price:') !!}
                {!! Form::text('price',null,['class'=>'form-control']) !!}
            </div>

            <!--  Feature -->
            <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                {!! Form::radio('featured', 1, null, ['class' => 'field']) !!} Yes
                {!! Form::radio('featured', 0, null, ['class' => 'field']) !!} No
            </div>

            <!--  Recommend -->
            <div class="form-group">


                {!! Form::label('recommend', 'Recommend:') !!}
                {!! Form::radio('recommend', 1, null, ['class' => 'field']) !!} Yes
                {!! Form::radio('recommend', 0, null, ['class' => 'field']) !!} No

            </div>

            <!--  TAGs -->
            <div class="form-group">


                {!! Form::label('tags', 'Tags:') !!}
                {!! Form::textarea('tags',null,['class'=>'form-control']) !!}

            </div>

            <!--  Submit -->
            <div class="form-group">
                {!! Form::submit('Add Product',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>
@endsection
