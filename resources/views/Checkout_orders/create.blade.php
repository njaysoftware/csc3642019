<link href="{{ asset('/css/createOrder.css') }}" rel="stylesheet">
@extends('layouts.main')
@section('content')
<h1 class="text-center mt-2 mb-2">Please enter your personal information</h1>
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <input id="customer_ID" name="customer_ID" type="hidden" value="{{ Auth::user()->id }}">
    <div class="panel panel-primary m-2 p-2 address">        
        <div class="panel-header" style="font-size: 1.1rem">Shipping Address</div>
        <hr class="mt-0">
        <div class="panel-body">
            <div class="form-group row">
            <label for="shipping_address" class="col-4 col-form-label">Address</label> 
            <div class="col-8">
                <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fa fa-location-arrow"></i>
                    </div>
                </div> 
                <input id="shipping_address" name="shipping_address" placeholder="Address" type="text" class="form-control" required>
                </div>
            </div>
            </div>
            <div class="form-group row">
            <label for="shipping_city" class="col-4 col-form-label">City</label> 
            <div class="col-8">
                <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fa fa-location-arrow"></i>
                    </div>
                </div> 
                <input id="shipping_city" name="shipping_city" placeholder="City" type="text" class="form-control" required>
                </div>
            </div>
            </div>
            <div class="form-group row">
            <label for="shipping_state" class="col-4 col-form-label">State</label> 
            <div class="col-8">
                <select id="shipping_state" name="shipping_state" class="custom-select">                        
                    <option value="-1">--Select State--</option>
                    @foreach ($states as $state)
                        <option value="{{ $state }}">{{ $state }}</option>
                    @endforeach
                </select>                    
            </div>
            </div>
            <div class="form-group row">
            <label for="shipping_zip" class="col-4 col-form-label">Zip Code</label> 
            <div class="col-8">
                <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fa fa-location-arrow"></i>
                    </div>
                </div> 
                <input id="shipping_zip" name="shipping_zip" placeholder="Zip (ex. 14050)" type="text" class="form-control" required>
                </div>
            </div>
            </div> 
        </div>
    </div>
    <div class="panel panel-default p-2 m-2 address">
        <div class="panel-header" style="font-size: 1.1rem;">Billing Address</div>
        <hr class="mt-0">
        <div class="panel-body">            
            <div class="form-group row">
                <label class="col-8 text-sm-right text-left">Check if billing address is the same as shipping address</label> 
                <div class="col-4">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="checkbox" id="checkbox_0" type="checkbox" class="custom-control-input" value=""> 
                        <label for="checkbox_0" class="custom-control-label"></label>
                    </div>
                </div>
            </div> 
            <div class="form-group row">
                <label for="billing_address" class="col-4 col-form-label">Address</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-location-arrow"></i>
                    </div>
                    </div> 
                    <input id="billing_address" name="billing_address" placeholder="Address" type="text" class="form-control" required>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="billing_city" class="col-4 col-form-label">City</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-location-arrow"></i>
                    </div>
                    </div> 
                    <input id="billing_city" name="billing_city" placeholder="City" type="text" class="form-control" required>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="billing_state" class="col-4 col-form-label">State</label> 
                <div class="col-8">
                <select id="billing_state" name="billing_state" class="custom-select">
                    <option value="-1">--Select State--</option>
                    @foreach ($states as $state)
                        <option value="{{ $state }}">{{ $state }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="billing_zip" class="col-4 col-form-label">Zip Code</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-location-arrow"></i>
                    </div>
                    </div> 
                    <input id="billing_zip" name="billing_zip" placeholder="Zip (ex. 14050)" type="text" class="form-control" required>
                </div>
                </div>
            </div>
    </div>
    </div>
    <div class="panel panel-default address m-2 p-2">
        <div class="panel-header" style="font-size: 1.1rem;">Payment Options</div>
        <hr class="mt-0">
        <div class="panel-body">            
            <div class="form-group row">
                <label for="card_number" class="col-4 col-form-label">Card Number</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-credit-card-alt"></i>
                    </div>
                    </div> 
                    <input id="card_number" name="card_number" placeholder="Card Number" type="text" class="form-control" required>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="card_holder_name" class="col-4 col-form-label">Card Holder Name</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-male"></i>
                    </div>
                    </div> 
                    <input id="card_holder_name" name="card_holder_name" placeholder="Card Holder's Name" type="text" class="form-control" required>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="expiration_date" class="col-4 col-form-label">Expiration Date</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-calendar"></i>
                    </div>
                    </div> 
                    <input id="expiration_date" name="expiration_date" placeholder="Expiration date" type="text" class="form-control" required>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">csv</label> 
                <div class="col-8">
                <input id="text" name="text" type="text" class="form-control" required>
                </div>
            </div> 
        </div>
    </div>
    <div class="panel panel-default address m-2 p-2">
        <div class="panel-header" style="font-size: 1.1rem;">Shipping options</div>
        <hr class="mt-0">
        <div class="panel-body">
            <p>Our shipping rates are fixed amounts so feel free to buy as much as you would like because the shipping costs do not change</p>           
            <div class="form-group row">
                <label for="shipping_method" class="col-4 col-form-label">Shipping method</label> 
                <div class="col-8">
                <select id="shipping_method" name="shipping_method" class="custom-select">
                    <option value="-1">--Select a shipping option--</option>
                    <option value="2Day">2 day shipping ($109.99)</option>
                    <option value="3Day">3 day shipping ($119.99)</option>
                    <option value="4Day">4 day shipping ($108.99</option>
                    <option value="14Day">2 Weeks shipping ($59.99)</option>
                    <option value="365Days">Snail Mail (up to 365 days) free</option>
                </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row d-flex justify-content-center">
        <button name="submit" type="submit" class="btn btn-primary mr-1 mt-3">Submit Order</button>
        <a class="btn btn-primary ml-1 mt-3" href="{{ route('products.index') }}">Cancel Order</a>
    </div>
</form>
@endsection