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
                    <hr class="mt-0">
                    @if ($cartProduct['details']['picture'] == '1')                        
                    <img class="img-fluid" src="/storage/product_{{ $cartProduct['details']['id'] }}.jpg"/>
                    @endif 
                </div>
                <div class="col-12 col-md-4 text-center">
                    <h3>Description</h3>
                    <hr class="mt-0">
                    <p>{{$cartProduct['details']['description']}}
                    </p>
                </div>
                <div class="col-12 col-sm-12 col-md-4 d-flex flex-column justify-content-end">
                    <div class="row" id="PriceRow">
                        <label class="col-12  col-sm-4 offset-sm-1">Price: </label>
                        <h6 class="col-12 text-sm-center col-sm-4 offset-sm-2">${{ $cartProduct['details']['price']}}</h6>
                    </div>
                    <div class="row">
                        <label for="select" class="col-12 col-md-6 text-center">Quantity In Cart:</label>
                        <div class="col-md-6 text-sm-center">
                            <p> {{ $cartProduct['quantity'] }}</p>
                        </div>
                    </div>
                    <div class="row">                            
                        <form class="form-inline col-12 col-md-6 d-flex justify-content-end" action="{{ route('cart.update', $cartProduct['id']) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="action" value="{{ $cartProduct['id'] }}">
                                <div class="">
                                <button id="increaseButton" name="submit" type="submit" onsubmit="alert('This Form was submitted')" class="btn btn-primary" style="height: 38px;">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button id="decreaseButton" name="submit" type="submit" onclick="Console.log('The Decrease Button was clicked')"class="btn btn-primary" style="height: 38px;">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>  
                        </form>
                        <div class="col-12 col-md-6">                            
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
            <div class="row p-0" id="">
                <div class="col-12 p-0 text-md-center d-flex flex-row justify-content-end">
                    <div id="information-on-total" class="mt-2 mb-2">
                        <p class="mt-2">Total Cart Before Tax: {{ '$' . ' ' . session()->get('CartTotal', 0) }}</p>
                        <p>Tax Total: {{ '$' . ' ' . session()->get('TaxTotal', 0)}}</p>            
                        <p> Total For Cart: {{ '$' . ' ' . session()->get('Total', 0) }}</p>  
                    </div>
                </div>    
            </div>
            <div class="row d-flex justify-content-end mt-2">                                                    
                <a class="btn btn-primary  mr-1" href="{{ route('orders.create') }}">Proceed To Checkout</a>                
                <a class="btn btn-primary  ml-1" href="{{ route('products.index') }}">Continue Shopping</a>
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
        

@endsection