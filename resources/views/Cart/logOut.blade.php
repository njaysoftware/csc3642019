@extends('layouts.main')
@section('content')
    <div class="row d-flex justify-content-center">
        <p>Please Login to view your shopping cart. <a href="{{ route('login') }}">Login</a></p>
    </div>
@endsection