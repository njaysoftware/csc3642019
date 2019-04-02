<link href="{{ asset('/css/menuNav.css') }}" rel="stylesheet">

<nav class="navbar">
    <a class="navbar-brand navbarForC" href="{{ route('products.index') }}">CSC364 Store</a>
    <button class="navbar-toggler navbarForC" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      @if (Auth::check())
      <ul class="navbar-nav">
        <li class="nav-item ">
          <p id="paragraph-in-nav">Hello, {{ Auth::user()->name }}</p>  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>  Logout</a>
        </li>
        @if (Auth::user()->is_admin)    
          <li class="nav-item">
                <a class="nav-link" href="{{ route('products.create') }}"><i class="fa fa-plus"></i>  Create Product</a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('suppliers.create') }}"><i class="fa fa-plus"></i>  Create Product</a>
          </li>
        @endif
          <li class="nav-item">
                  <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i>  Cart</a>
          </li>
      </ul>
        
      @else
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('products.index') }}"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i>  Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
        </li>
      </ul>    
      @endif         
      
  </div>
</nav>