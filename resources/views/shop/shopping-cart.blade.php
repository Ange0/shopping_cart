@extends('layouts.master')

@section('title')
    Shopping cart
@endsection
@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                <ul class="list-group">
                    @foreach ($products as $product)
                        <li class="list-group-item">
                        <span class="badge">{{ $product['qty']}}</span>
                        <strong>{{ $product['item']['title'] }}</strong>
                        <span class="label label-success"> {{ $product['price'] }}</span>
                        <div class="btn group">
                            <button type="button" data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="">Reduce by 1</a></li>
                                <li><a href="">Reduce All</a></li>
                            </ul>
                        </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-">
            <strong>Total : {{ $totalPrice}}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-">
                <button class="btn btn-primary">Checkout</button>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-">
               <h2>No Item no cart !</h2>
            </div>
        </div>
    @endIf
@endSection