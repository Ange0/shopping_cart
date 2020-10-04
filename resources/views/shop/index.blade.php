@extends('layouts.master')

@section('title')
    Laravel shopping cart
@endsection
@section('content')

   @foreach ($products as $product)
    <div class="row">
       
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
            <img src="{{$product->imagePath }}"alt="Generic placeholder thumbnail">
            </div>
            <div class="caption">
            <h3>{{ $product->title }}</h3>
                <p class="text-justify text-muted" >{{ $product->description }}</p>
            <p class="price">Price :{{ $product->price }}€</p>
                <div>
                    <a href="#" class="btn btn-success" role="button"> Add card</a>
                {{--  <a href="#" class="btn btn-default" role="button">Button</a> --}}
                </div>
            </div>
        </div>
       
    </div>
   @endforeach
</div>
@endsection