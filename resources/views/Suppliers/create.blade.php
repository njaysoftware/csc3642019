@extends('layouts.main')

@section('content')
<form action="{{route('suppliers.store')}}" method="POST" >
    @csrf
  <div class="form-group">
    <label for="name">Name</label> 
    <input id="name" name="name" placeholder="Supplier Name" type="text" required="required" class="form-control">
  </div>
  <div class="form-group">
    <label for="address">Address</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-address-card-o"></i>
        </div>
      </div> 
      <input id="address" name="address" placeholder="Address 1" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="city">City</label> 
    <input id="city" name="city" placeholder="City" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">E-mail</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-envelope"></i>
        </div>
      </div> 
      <input id="email" name="email" placeholder="youremail@mail.com" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="phone">Phone</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-phone"></i>
        </div>
      </div> 
      <input id="phone" name="phone" placeholder="123-456-6789" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Create Supplier</button>
  </div>
</form>

@stop