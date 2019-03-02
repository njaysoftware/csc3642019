@extends('layouts.main')

@section('content')    
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<div class="row" >
        <div id="titleOfProductsPage" class="col-xs-4 h3 mx-auto">
            <div class="text-center">Products Available</div>
        </div>
    </div>

    <div class="row">
        @if ($products)
            <table id="data_table" class="table table-striped">
                {{-- Fx this for javascript --}}
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Picture</th>
                    <th>SKU</th>
                    <th>Qty Available</th> 
                    <th>Date Added</th> 
                    <th>Supplier ID</th> 
                    <th>Supplier SKU</th> 
                    <th>Cost</th>                   
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="fbody">

                @foreach ($products as $product)
                    <tr>
                        <td>{!! $product['description'] !!}</td>
                        <td>{!! $product['price'] !!}</td>
                        <td>{!! $product['picture'] !!}</td>
                        <td>{!! $product['sku'] !!}</td>
                        <td>{!! $product['qty_available'] !!}</td>
                        <td>{!! $product['date_added'] !!}</td>
                        <td>{!! $product['supplier_ID'] !!}</td>
                        <td>{!! $product['supplier_SKU'] !!}</td>
                        <td>{!! $product['cost']!!}</td>
                        <td>
                            <a href="/products/{!! $product['id'] !!}" class="button btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--  $movies->links() !!} -->
        @else
        <div class="col-md-6">
            <h4>No products are in the sytem yet</h4>
        </div>       
        @endif
    </div> 
    
    <div class="row">    <!--col-xs-1 col-xs-offset-7 text-center-->
        <div class="col-md-2 mx-auto" style="margin-top: 20px;">
            <a id="buttonToCreateNewProduct"href="{!! route('products.create') !!}" class="btn btn-xs btn-success text-align" title="Create new Supplier">
                <span class="glyphicon glyphicon-plus"></span> Create a New Product</a>
        </div>
    </div>
    
    @stop