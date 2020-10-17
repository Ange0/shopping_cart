  <!-- Static navbar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="{{ route('product.index') }}">{{ config('app.name')}}</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="{{route('product.shoppingCart')}} "><i class="fa fa-shopping-cart"></i>
               Shopping cart 
            <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
               <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> User Account<span class="caret"></span></a>
            <ul class="dropdown-menu">
              @if(Auth::check())
                <li><a  href="{{ route('user.profile') }}">User Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a  href="{{ route('user.logout') }}">Logout</a></li>
              @else
                <li><a href="{{ route('user.signup') }}">Signup</a></li>
                <li><a  href="{{ route('user.signin') }}">Signin</a></li>
              @endIf
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>