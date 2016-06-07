@extends('app')

@section('content')
    <div class="container">
        <h1>Editing Product {{  $product->name }}</h1>

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

            {!! Form::open(['route'=>['products.update', $product->id],'method'=>'post']) !!}

            <!--  Name -->
            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',$product->name,['class'=>'form-control']) !!}
            </div>

            <!--  Category -->
            <div class="form-group">
                {!! Form::label('category','Category:') !!}
                {!! Form::select('category_id',$categories, $product->category->id, ['class'=>'form-control']) !!}
            </div>

            <!--  Description -->
            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description',$product->description,['class'=>'form-control']) !!}
            </div>

            <!--  Price -->
            <div class="form-group">
                {!! Form::label('price','Price:') !!}
                {!! Form::text('price',$product->price,['class'=>'form-control']) !!}
            </div>

            <!--  Featured -->
            <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                {!! Form::radio('featured', 1, ($product->featured)?true:false, ['class' => 'field']) !!} Yes
                {!! Form::radio('featured', 0, (!$product->featured)?true:false, ['class' => 'field']) !!} No
            </div>

            <!--  Recommend -->
            <div class="form-group">


                {!! Form::label('recommend', 'Recommend:') !!}
                {!! Form::radio('recommend', 1, ($product->recommend)?true:false, ['class' => 'field']) !!} Yes
                {!! Form::radio('recommend', 0, (!$product->recommend)?true:false, ['class' => 'field']) !!} No

            </div>

            <!--  TAGs -->

            <div class="form-group">


                {!! Form::label('tags', 'Tags:') !!}
                {!! Form::textarea('tags',$product->tag_list,['class'=>'form-control']) !!}

            </div>


            <!--  Submit -->
            <div class="form-group">
                {!! Form::submit('Save Product',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>
@endsection
