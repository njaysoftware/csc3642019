<link href="{{ asset('/css/panelNav.css') }}" rel="stylesheet">
@extends('layouts.main')
@section('content')
    <div class="col-sm-6 offset-sm-3">    
        <div class="panel panel-default p-4 m-4 info-panel">
            <div class="panel-header text-center">
                <p>{{ Auth::user()->name }}, Thank you for placing your order.</p>
                <p>Your order was successfully placed</p>
            </div>
            <div class="panel-body">
                <p>Summary of your order:</p>
                <ul>
                    <li>The total bill was {{ session()->get('Total') }}</li>
                    <li>Your order confirmation number is {{ session()->get('orderNumber') }}</li>
                    <li>The shipping method you chose was: {{ session()->get('shippingMethod') }}</li>
                </ul>
                <a class="btn btn-primary row col-sm-4 offset-sm-4"href="{{ route('products.index') }}">Continue Shopping</a>
            </div>
        </div>
    </div>    
@endsection