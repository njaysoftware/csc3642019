
@extends('layouts.main')
<link href="{{ asset('/css/ProductListView.css') }}" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('content')
@if ($products)
    
 
@foreach ($products as $product)
    <div class="content">
        
            <div class="row" id="productRow">
                
                    <div class="col-12 col-md-4">
                    <h1 class="mt-1">{{$product['name']}}</h1>
                    <hr class="mt-0">
                    @if ($product['picture'] == '1')                        
                    <img class="img-fluid" src="/storage/product_{{ $product['id'] }}.jpg"/>
                    @endif    
                    </div>
                    
                    <div class="col-12 col-md-4 text-center">
                        <h3 class="mt-1">Description</h3>
                        <hr class="mt-0">
                        <p>{{$product['description']}}
                        </p>
                    </div>
                    
                    <div id="price-row" class="col-12 col-sm-12 col-md-4 d-flex flex-column justify-content-end">
                        <div class="row" id="PriceRow">
                            <label class="col-12  col-sm-4 offset-sm-1">Price: </label>
                        <h6 class="col-12 text-sm-center col-sm-4 offset-sm-2">${{$product['price']}}</h6>
                        </div>
                    <form id="add-to-cart" action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <input name="product_id" type="hidden" value="{{ $product['id'] }}">
                            <label for="select" class="col-12 col-form-label col-sm-4 offset-sm-1">Quantity:</label>
                            <select name="quantity" class="form-control col-10 offset-1 col-sm-4">
                                @for ($index = 1; $index <= $product['qty_available']; $index++)
                                    <option value="{{$index}}">{{$index}}</option>
                                @endfor 
                            </select>
                        </div>
                    
                        <div class="row .buttonrow">
                            <button name="submit" type="submit" class="btn btn-primary col-10 offset-1 col-sm-4 offset-sm-1 buttons"><i class="fa fa-shopping-cart"></i>  add to cart</button>
                            <a name="" id="" class="btn btn-primary col-10 offset-1 col-sm-4 offset-sm-1 buttons" href="/products/{!! $product['id'] !!}" role="button"><i class="fa fa-info"></i>  More Info</a>
                        </div>
                    </div>
                </form>
                
    
            </div>
        </div>    
    @endforeach


    
    @else
        <div class="row">
            <div class="col-12 col-sm-6 offset-sm-3 text-center">
                <h1>No products are in the store yet</h1>
            </div>
        </div>
    @endif   
    
@endsection



@section('extraJS')

    <script>
        $(document).ready( function () {
            $('#data_table').DataTable();
        } );

        $(document).ready(function(){

            $('.delbtn').click(function(){

                return confirm("Are You sure?");

            });
        });


    </script>


@stop