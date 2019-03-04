@extends('layouts.main')

@section('content')
<div class="row" >
        <div id="titleOfProductsCreatePage" class="col-xs-4 h3 mx-auto">
            <div class="text-center">Edit a Product</div>
        </div>
    </div>
    <form action="{{route('products.update', $product->id)}}" method="POST">
        @csrf
        <input name="_method" type="hidden" value="PUT">

    <input type="hidden" name="id" value="{{ $product->id}}">
        <div class="form-group row">
            <label for="name" class="col-6 col-form-label text-right">Name of Product</label> 
            <div class="col-6">
            <input id="name" name="name" type="text" value="{{ old('name', $product->name)}}" class="form-control">
            </div>
          </div> 
        <div class="form-group row">
          <label for="description" class="col-6 col-form-label">Description</label> 
          <div class="col-6">
            <input id="description" name="description" value="{{ old('description', $product->description) }}"placeholder="Description of Product" type="text"  class="form-control">
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
              <input id="price" name="price" value="{{ old('price', $product->price) }}"placeholder="Price of Product" type="text"  class="form-control">
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
              <input id="picture" name="picture" value="{{ old('picture', $product->picture) }}"placeholder="Picture url" type="text" class="form-control">
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
            <input id="qty_available" value="{{ old('qty_available', $product->qty_available) }}"name="qty_available" placeholder="Quantity of Product" type="text" class="form-control">
          </div>
        </div>
    
        <div class="form-group row">
          <label for="supplier_ID" class="col-6 col-form-label">Supplier ID</label> 
          <div class="col-6">
            <input id="supplier_ID" value="{{ old('supplier_ID', $product->supplier_ID) }}" name="supplier_ID" placeholder="Supplier's Id" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="supplier_SKU" class="col-6 col-form-label">Supplier SKU</label> 
          <div class="col-6">
            <input id="supplier_SKU" value="{{ old('supplier_SKU', $product->supplier_SKU) }}"name="supplier_SKU" placeholder="Supplier's SKU" type="text" class="form-control">
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
              <input id="cost" name="cost" value="{{ old('cost', $product->cost) }}"placeholder="Cost of Product" type="text" class="form-control">
            </div>
          </div>
        </div> 
        <div class="form-group row">
          <div class="offset-8 col-6">
            <button name="submit" type="submit" class="btn btn-primary">Submit Edit</button>
          </div>
        </div>
      </form>    
@endsection