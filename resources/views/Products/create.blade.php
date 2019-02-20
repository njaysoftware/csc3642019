@extends('layouts.main')

@section('content')
<form action="{{route('products.store')}}" method="POST">
    @csrf
    <div class="form-group row">
      <label for="description" class="col-6 col-form-label">Description</label> 
      <div class="col-6">
        <input id="description" name="description" placeholder="Description of Product" type="text"  class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="price" class="col-6 col-form-label">Price</label> 
      <div class="col-6">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-money"></i>
            </div>
          </div> 
          <input id="price" name="price" placeholder="Price of Product" type="text"  class="form-control">
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="picture" class="col-6 col-form-label">Picture</label> 
      <div class="col-6">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-file-picture-o"></i>
            </div>
          </div> 
          <input id="picture" name="picture" placeholder="Picture url" type="text" class="form-control">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="sku" class="col-6 col-form-label">SKU Number</label> 
      <div class="col-6">
        <input id="sku" name="sku" placeholder="SKU number of Product" type="text" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="text" class="col-6 col-form-label">Date Added</label> 
      <div class="col-6">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-calendar"></i>
            </div>
          </div> 
          <input id="date_added" name="date_added" placeholder="Date that the product is being added" type="text" class="form-control">
        </div>
      </div>
    </div> 
    
    <div class="form-group row">
      <label for="qty_available" class="col-6 col-form-label">Quantity</label> 
      <div class="col-6">
        <input id="qty_available" name="qty_available" placeholder="Quantity of Product" type="text" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="supplier_ID" class="col-6 col-form-label">Supplier ID</label> 
      <div class="col-6">
        <input id="supplier_ID" name="supplier_ID" placeholder="Supplier's Id" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="supplier_SKU" class="col-6 col-form-label">Supplier SKU</label> 
      <div class="col-6">
        <input id="supplier_SKU" name="supplier_SKU" placeholder="Supplier's SKU" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="cost" class="col-6 col-form-label">Cost</label> 
      <div class="col-6">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-money"></i>
            </div>
          </div> 
          <input id="cost" name="cost" placeholder="Cost of Product" type="text" class="form-control">
        </div>
      </div>
    </div> 
    <div class="form-group row">
      <div class="offset-6 col-6">
        <button name="submit" type="submit" class="btn btn-primary">Create Product</button>
      </div>
    </div>
  </form>    
@endsection
