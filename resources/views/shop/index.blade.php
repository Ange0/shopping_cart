@extends('layouts.master')

@section('title')
    List Products
@endsection
@section('content')
    @if( Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div id="charge-message" class="alert alert-success " >
                    {{ Session::get('success')}}
                </div>
            </div>
        </div>
    @endIf
    
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
                <a href="{{ route('product.addToCart',['id'=> $product->id]) }}" class="btn btn-success" role="button"> Add card</a>
                {{--  <a href="#" class="btn btn-default" role="button">Button</a> --}}
                </div>
            </div>
        </div>
       
    </div>
   @endforeach
</div>
@endsection