<link href="{{ asset('/css/menuNav.css') }}" rel="stylesheet">

<nav class="navbar">
    <a class="navbar-brand navbarForC" href="{{ route('products.index') }}">CSC364 Store</a>
    <button class="navbar-toggler navbarForC" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('products.index') }}"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-sign-in-alt"></i>  Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Sign Up</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.create') }}"><i class="fa fa-plus"></i>  Create</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i>  Cart</a>
                </li>
            </ul>
    </div>
</nav>