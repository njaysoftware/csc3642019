
@extends('layouts.main')
<link href="{{ asset('/css/ProductListView.css') }}" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('content')
@if ($products)
    
 
@foreach ($products as $product)
    <div class="content">
        
            <div class="row" id="productRow" style="background-color: red; border-radius: 20px;">
                
                    <div class="col-12 col-sm-6 col-md-4">
                    <h1></h1>
                        <img src=""/>
                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-4">
                        <h3>Description:</h3>
                        <p>{{$product['description']}}
                        </p>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-4">
                    <form>
                        <div class="form-group row">
                            <label for="select" class="col-12 col-form-label col-sm-4 offset-sm-2">Quantity</label>
                            <select name="state" class="form-control col-10 offset-1 col-sm-4">
                                @for ($index = 0; $index <= $product['qty_available']; $index++)
                                    <option value="{{$index}}">{{$index}}</option>
                                @endfor 
                            </select>
                        </div>
                    </form>
                        <div class="row .buttonrow">
                            <a class="btn btn-primary col-10 offset-1 col-sm-10 offset-sm-1 col-md-5 offset-md-1 buttons" href="" ><i class="fa fa-shopping-cart"></i>  add to cart</a>
                        <a name="" id="" class="btn btn-primary col-10 offset-1 col-sm-10 offset-sm-1 col-md-5 offset-md-0 buttons" href="/products/{!! $product['id'] !!}" role="button"><i class="fa fa-info"></i>  More Info</a>
                        </div>
                    </div>
                
    
            </div>
        </div>    
    @endforeach


    
@else
    <h1>No products are in the shoppingcart</h1>

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