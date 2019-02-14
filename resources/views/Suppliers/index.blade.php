@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-xs-4 h3">Showing Suppliers</div>
        <div class="col-xs-1 col-xs-offset-7" style="margin-top: 20px;">
            <a href="{!! route('suppliers.create') !!}" class="btn btn-xs btn-success pull-right" title="Create new Supplier">
                <span class="glyphicon glyphicon-plus"></span> Suppliers</a>
        </div>
    </div>

    <div class="row">
        @if ($suppliers)
            <table id="data_table" class="table table-striped">
                {{-- Fx this for javascript --}}
                <thead>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Contacts</th>                    
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="fbody">

                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{!! $supplier['name'] !!}</td>
                        <td>{!! $supplier['city'] !!}</td>
                        <td>{!! $supplier['phone'] !!}</td>
                        <td>{!! $supplier['email'] !!}</td>
                        <td>{!! $supplier['contact_name'] !!}</td>
                        <td>
                            <a href="/suppliers/{!! $supplier['id'] !!}" class="button btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--  $movies->links() !!} -->
        @else
            <h4>No suppliers in the sytem yet</h4>
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