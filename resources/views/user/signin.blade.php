@extends('layouts.master')
@section('title')
    Laravel SignIn
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Sign In</h1>
            @if( count($errors) > 0 )
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endIf
            <form action="{{ route('user.signin') }}" method="POST">
               @csrf
                
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email"  class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control"/>
                </div>
                <button class="btn btn-success" type="submit">Sign In</button>
            </form>
        <p>Don't have an account ? <a href="{{ route('user.signup')}}">Sign up instead !</a> </p>
        </div>
    </div>
@endSection