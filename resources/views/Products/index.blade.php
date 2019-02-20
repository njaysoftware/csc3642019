@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-xs-4 h3">Showing Suppliers</div>
        <div class="col-xs-1 col-xs-offset-7" style="margin-top: 20px;">
            <a href="{!! route('products.create') !!}" class="btn btn-xs btn-success pull-right" title="Create new Supplier">
                <span class="glyphicon glyphicon-plus"></span> Products</a>
        </div>
    </div>

    <div class="row">
        @if ($products)
            <table id="data_table" class="table table-striped">
                {{-- Fx this for javascript --}}
                <thead>
                <tr>
                    <th>description</th>
                    <th>price</th>
                    <th>picture</th>
                    <th>sku</th>
                    <th>qty_available</th> 
                    <th>date_added</th> 
                    <th>supplier_ID</th> 
                    <th>supplier_SKU</th> 
                    <th>cost</th>                   
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
            <h4>No products are in the sytem yet</h4>
        @endif

    </div>

@stop

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