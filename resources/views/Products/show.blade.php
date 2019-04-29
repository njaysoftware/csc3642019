@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="pb-5">
            <div class="card mx-auto" style="width: 80%;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            {{$product->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
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
                                {{$product->description}}
                            </div>
                        </div> 
                    <div class="row">
                            <div class="col-12 col-sm-4 text-sm-right text-left">
                                <h3>Product price:</h3>
                            </div>
                            <div class="col-12 col-sm-8">
                                {{$product->price}}
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-12 col-sm-4 text-sm-right text-left">
                                <h3>Product SKU:</h3>
                            </div>
                            <div class="col-12 col-sm-8">
                                {{$product->sku}}
                            </div>
                    </div> 
                    <div class="row">
                            <div class="col-12 col-sm-4 text-sm-right text-left">
                                <h3>Quantity In stock:</h3>
                            </div>
                            <div class="col-12 col-sm-8">
                                {{$product->qty_available}}
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-12 col-sm-4 text-sm-right text-left">
                                <h3>Suppliers Id</h3>
                            </div>
                            <div class="col-12 col-sm-8">
                                {{$product->supplier_ID}}
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-12 col-sm-4 text-sm-right text-left">
                                <h3>Supplier SKU:</h3>
                            </div>
                            <div class="col-12 col-sm-8">
                                {{$product->supplier_SKU}}
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-12 col-sm-4 text-sm-right text-left">
                                <h3>Product Cost:</h3>
                            </div>
                            <div class="col-12 col-sm-8">
                                {{$product->cost}}
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4  mt-3">                        
                            <!--come back to only make the edit button show up when the customer is admin privadges -->
                            @if (Auth::user()->is_admin == 1)
                        <a class="btn btn-primary" href="/products/{{$product->id}}/edit" ><i class="fa fa-edit"></i>  edit</a>
                            @endif                                                            
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>   
@endsection