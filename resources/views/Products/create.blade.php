@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="/css/app.css">
<div class="row" >
    <div id="titleOfProductsCreatePage" class="col-xs-4 h3 mx-auto">
        <div class="text-center">Please enter product information</div>
    </div>
</div>
<form action="{{route('products.store')}}" method="POST">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-6 col-form-label">Name of Product</label> 
        <div class="col-6">
          <input id="name" name="name" type="text" class="form-control" placeholder="Product Name">
        </div>
      </div> 
    <div class="form-group row">
      <label for="description" class="col-6 col-form-label">Description</label> 
      <div class="col-6">
        <input id="description" name="description" value="{{ old('description') }}"placeholder="Description of Product" type="text"  class="form-control">
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
          <input id="price" name="price" value="{{ old('price') }}"placeholder="Price of Product" type="text"  class="form-control">
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
          <input class="btn btn-primary" id="picture" name="picture" placeholder="Picture url" type="file" class="form-control">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="sku" class="col-6 col-form-label">SKU Number</label> 
      <div class="col-6">
        <input id="sku" name="sku" value="{{ old('sku') }}"placeholder="SKU number of Product" type="text" class="form-control">
      </div>
    </div>
    
    <div class="form-group row">
      <label for="qty_available" class="col-6 col-form-label">Quantity</label> 
      <div class="col-6">
        <input id="qty_available" value="{{ old('qty_available') }}"name="qty_available" placeholder="Quantity of Product" type="text" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="supplier_ID" class="col-6 col-form-label">Supplier ID</label> 
      <div class="col-6">
        <input id="supplier_ID" value="{{ old('supplier_ID') }}" name="supplier_ID" placeholder="Supplier's Id" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="supplier_SKU" class="col-6 col-form-label">Supplier SKU</label> 
      <div class="col-6">
        <input id="supplier_SKU" value="{{ old('supplier_SKU') }}"name="supplier_SKU" placeholder="Supplier's SKU" type="text" class="form-control">
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
          <input id="cost" name="cost" value="{{ old('cost') }}"placeholder="Cost of Product" type="text" class="form-control">
        </div>
      </div>
    </div> 
    <div class="form-group row">
      <div class="col-12 offset-4 col-sm-6 offset-sm-8">
        <button name="submit" type="submit" class="btn btn-primary">Create Product</button>
      </div>
    </div>
  </form>    
@endsection
