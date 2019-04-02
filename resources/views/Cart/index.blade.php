@extends('layouts.main')
@section('content')
@if ($cartProducts)
@foreach ($cartProducts as $cartProduct)
    <div class="content">
        
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
                    <form>
                        <div class="form-group row">
                            <label for="select" class="col-12 col-form-label col-sm-4 offset-sm-1">Quantity:</label>
                            <p> {{ $cartProduct['quantity'] }}</p>
                            <form action="{{ 'cartProducts.store' }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                        <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>
                                            <i class="fas fa-plus"></i></button>
                                        <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>
                                            <i class="fas fa-minus"></i></button>
                                </div>  
                            </form>
                        </div>
                    </form>
                    <form method="POST" action="/cart/{{  $cartProduct['id'] }}">
                        {{method_field('DELETE')}}
                        @csrf
                        <input type="hidden" name="_method" value="DELETE"/>
                        <button type="submit" class="btn btn-primary col-12 col-sm-4 offset-sm-7 mt-2">Remove</button>
                      </form>
                        <div class="row .buttonrow">
                            <a class="btn btn-primary col-10 offset-1 col-sm-4 offset-sm-1 buttons" href="" ><i class="fa fa-shopping-cart"></i>  add to cart</a>
                            <a name="" id="" class="btn btn-primary col-10 offset-1 col-sm-4 offset-sm-1 buttons" href="/products/{!! $cartProduct['id'] !!}" role="button"><i class="fa fa-info"></i>  More Info</a>
                        </div>
                    </div>
                
    
            </div>
        </div>    
    @endforeach


    
    @else
        <div class="row">
            <div class="col-12 col-sm-6 offset-sm-3 text-center">
                    <h1>Your Shopping Cart is Empty or you. Please return to the <a href="{{ route('products.index') }}">catalog</a> to add items</h1>
            </div>
            <div class="col-12 col-sm-6 offset-sm-3 text-center">
                <a href="{{ route('products.index') }}">Product Catalog</a>
            </div>
        </div>
    @endif   
@endsection