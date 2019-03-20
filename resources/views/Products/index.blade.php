
@extends('layouts.main')
<link href="{{ asset('/css/ProductListView.css') }}" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('content')
@if ($products)
    
 
@foreach ($products as $product)
    <div class="content">
        
            <div class="row" id="productRow">
                
                    <div class="col-12 col-md-4">
                    <h1>{{$product['name']}}</h1>
                        <img src=""/>
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <h3>Description:</h3>
                        <p>{{$product['description']}}
                        </p>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-4">
                        <div class="row" id="PriceRow">
                            <label class="col-12  col-sm-4 offset-sm-1">Price: </label>
                        <h6 class="col-12 text-sm-center col-sm-4 offset-sm-2">${{$product['price']}}</h6>
                        </div>
                    <form>
                        <div class="form-group row">
                            <label for="select" class="col-12 col-form-label col-sm-4 offset-sm-1">Quantity:</label>
                            <select name="state" class="form-control col-10 offset-1 col-sm-4">
                                @for ($index = 0; $index <= $product['qty_available']; $index++)
                                    <option value="{{$index}}">{{$index}}</option>
                                @endfor 
                            </select>
                        </div>
                    </form>
                        <div class="row .buttonrow">
                            <a class="btn btn-primary col-10 offset-1 col-sm-4 offset-sm-1 buttons" href="" ><i class="fa fa-shopping-cart"></i>  add to cart</a>
                            <a name="" id="" class="btn btn-primary col-10 offset-1 col-sm-4 offset-sm-1 buttons" href="/products/{!! $product['id'] !!}" role="button"><i class="fa fa-info"></i>  More Info</a>
                        </div>
                    </div>
                
    
            </div>
        </div>    
    @endforeach


    
    @else
        <div class="row">
            <div class="col-12 col-sm-6 offset-sm-3 text-center">
                <h1>No products are in the shopping cart</h1>
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