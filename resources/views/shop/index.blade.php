@extends('layouts.master')

@section('title')
    Laravel shopping cart
@endsection
@section('content')

    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="images/1.jpg"alt="Generic placeholder thumbnail">
        </div>
        <div class="caption">
            <h3>Product title</h3>
            <p class="text-justify text-muted" >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt, sint? Est assumenda quae eveniet nam quaerat molestiae, ad beatae, excepturi iusto soluta, accusamus eius aspernatur eos dolorum optio iste totam?</p>
            <p class="price">Price :40€</p>
            <div>
                <a href="#" class="btn btn-success" role="button"> Add card</a>
               {{--  <a href="#" class="btn btn-default" role="button">Button</a> --}}
            </div>
        </div>
    </div>
</div>
@endsection