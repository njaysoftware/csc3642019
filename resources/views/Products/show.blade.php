<link href="{{ asset('/css/productShow.css') }}" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="pb-5 pt-2">
            <div class="card mx-auto" style="width: 80%;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>{{$product->name}}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            @if ($product->picture == '1')                        
                                <img class="img-fluid" src="/storage/product_{{ $product['id'] }}.jpg"/>
                            @endif                                                         
                        </div>
                    </div>
                    
                    <div class="row">
                            <div class="col-12 text-center">
                                <h3>Product Descprtion</h3>
                                <hr class="mt-0">
                            </div>
                            <div class="col-12 text-center">
                                <p class="description">{{ $product->description }}</p>
                            </div>
                        </div> 
                    <div class="row d-flex flex-row justify-content-center mt-6">
                            <div class=" text-sm-right text-left ">
                                <h3>Product price:</h3>
                            </div>
                            <div class=" d-flex flex-column justify-content-center ">
                                <span>&nbsp;${{ $product->price }}</span> 
                            </div>
                    </div>
                    <div class="row d-flex flex-row 
                    justify-content-center">
                            <div class="text-sm-right text-left">
                                <h3>Product SKU:</h3>
                            </div>
                            <div class="">
                                <span>&nbsp; {{ $product->sku}}</span>
                            </div>
                    </div> 
                    <div class="row d-flex flex-row 
                    justify-content-center">
                            <div class="text-sm-right text-left">
                                <h3>Quantity In stock:</h3>
                            </div>
                            <div class="">
                                <span>&nbsp;{{ $product->qty_available}}</span>
                            </div>
                    </div>
                    <div class="row d-flex flex-row justify-content-center">
                            <div class=" text-sm-right text-left">
                                <h3>Suppliers Id</h3>
                            </div>
                            <div class="">
                                <span>&nbsp; {{ $product->supplier_ID}}</span>
                            </div>
                    </div>
                    <div class="row d-flex flex-row justify-content-center">
                            <div class="text-sm-right text-left">
                                <h3>Supplier SKU:</h3>
                            </div>
                            <div class="">
                                <span>&nbsp; {{ $product->supplier_SKU}}</span>
                            </div>
                    </div>
                    <div class="row d-flex flex-row justify-content-center">
                            <div class="text-sm-right text-left">
                                <h3>Product Cost:</h3>
                            </div>
                            <div class="">
                                <span> &nbsp; {{$product->cost}}</span>
                            </div>
                    </div>
                    <div class="row d-flex justify-content-center" >
                        <div class="">                        
                            <!--come back to only make the edit button show up when the customer is admin privadges -->
                            @if(Auth::check())
                                @if (Auth::user()->is_admin == 1)
                                    <a class="btn btn-primary pl-4 pr-4" href="/products/{{$product->id}}/edit" ><i class="fa fa-edit"></i>  edit</a>
                                @endif   
                            @endif                                                         
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>   
@endsection