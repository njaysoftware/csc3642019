@extends('layouts.main')
<link href="{{ asset('/css/ProductListView.css') }}" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('content')    
    <div class="row">
        <div class="col-12 col-sm-6 offset-sm-3 text-center">
                <h1>Your Shopping Cart is Empty or you. Please return to the catalog to add items</h1>
        </div>
        <div class="col-12 col-sm-6 offset-sm-3 text-center">
            <a href="{{ route('products.index') }}">Product Catalog</a>
        </div>
    </div>
@endsection