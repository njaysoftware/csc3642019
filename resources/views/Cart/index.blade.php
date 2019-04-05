@extends('layouts.main')
<link href="{{ asset('/css/ProductListView.css') }}" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('content')
    @if ($cartProducts)
        <div class="content">
            <div class="row">
                <div class="col-12 text-center">                    
                    <h1>Welcome, {{ Auth::user()->name }} to your cart</h1>
                </div>
            </div>
    @foreach ($cartProducts as $cartProduct)
        
            <div class="row" id="productRow">
                <div class="col-12 col-md-4">
                    <h1>{{$cartProduct['details']['name']}}</h1>
                    <img src=""/>
                </div>
                <div class="col-12 col-md-4">
                    <h3>Description:</h3>
                    <p>{{$cartProduct['details']['description']}}
                    </p>
                </div>
                <div class="col-12 col-sm-12 col-md-4">
                    <div class="row" id="PriceRow">
                        <label class="col-12  col-sm-4 offset-sm-1">Price: </label>
                        <h6 class="col-12 text-sm-center col-sm-4 offset-sm-2">${{ $cartProduct['details']['price']}}</h6>
                    </div>
                    <div class="row">
                        <label for="select" class="col-12 col-md-6">Quantity In Cart:</label>
                        <div class="col-md-6 text-sm-center">
                            <p> {{ $cartProduct['quantity'] }}</p>
                        </div>
                    </div>
                    <div class="row">                            
                        <form class="form-inline" action="{{ route('cart.update', $cartProduct['details']['id']) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $cartProduct['id'] }}">
                            <label class="form-label col-12 col-md-6">Change Quantity</label>
                            <div class=" col-12 col-md-6">
                                <button name="submit" type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button name="submit" type="submit" class="btn btn-primary">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>  
                        </form>
                    </div>                    
                    <div class="row .buttonrow">
                        <div class="col-12 col-md-4 offset-md-4">                            
                            <form  action="{{ route('cart.destroy', $cartProduct) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE"/>
                                <button type="submit" class="btn btn-primary my-2">Remove</button>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
            <div class="row">
                <div class="col-12 text-md-right">Total Cart Before Tax: ${{ session()->get('CartTotal', 0) }}</div>
                <div class="col-12 text-md-right"> Tax Total: ${{ session()->get('TaxTotal', 0)}}</div>            
                <div class="col-12 text-md-right"> Total For Cart: ${{ session()->get('Total', 0)}}</div>               
            </div>
            <div class="row">                                                    
                <button class="btn btn-primary col-12 col-md-3 offset-md-6 mt-1 mr-1" href="">Proceed To Checkout</button>                
                <a class="btn btn-primary col-12 col-md-3 mt-1 ml-1" href="{{ route('products.index') }}">Continue Shopping</a>
            </div>
        </div>    
     
    @else
        <div class="row">
            <div class="col-12 col-sm-6 offset-sm-3 text-center">
                    <h1>Your Shopping Cart is Empty or you. Please return to the catalog to add items</h1>
            </div>
            <div class="col-12 col-sm-6 offset-sm-3 text-center">
                <a href="{{ route('products.index') }}">Product Catalog</a>
            </div>
        </div>
    @endif   
@endsection
@section('script')

    <script>
    
        

    </script>

@endsection