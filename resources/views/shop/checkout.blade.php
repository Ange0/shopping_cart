@extends('layouts.master')

@section('title')
    Shopping checkout
@endsection
@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        <h1>Checkout</h1>
        <h4>Your total : ${{ $total }}</h4>
    <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">{{ Session::get('error') }}</div>
        <form action=" {{ route('checkout') }} " method="POST" id="checkout-form">
            @csrf
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-name">Card Holder name</label>
                        <input type="text" id="card-name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-number">Credit Card number</label>
                        <input type="text" id="card-number" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="card-expiry-month">Expiration month</label>
                                <input type="text" id="card-expiry-month" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="card-expiry-year">Expiration Year</label>
                                <input type="text" id="card-expiry-year" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-cvc">CVC</label>
                        <input type="text" id="card-cvc" class="form-control" required>
                    </div>
                </div>
            </div>
            <button type="submit"  class="btn btn-success">Buy now </button>
        </form>
    </div>
</div>
@endSection
@section('scripts')
    <script src="https://js.stripe.com/v2/"></script>
    <script src=" {{ URL::to('js/checkout.js') }}"></script>
@endsection