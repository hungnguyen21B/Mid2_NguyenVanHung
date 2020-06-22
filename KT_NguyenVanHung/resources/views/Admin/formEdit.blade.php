@extends('master')
@section('content')
<div class="space50">&nbsp;</div>
<div  class="container beta-relative" > 
    <div class="pull-left">
        <h2>Edit</h2>
        </div>
    {{-- <div class="pull-right"><input type="text" placeholder="Search ID"> --}}
        </div> </div>
        <div class="space50">&nbsp;</div>
        @include ('blocks/error')
        <div class="container">
            <img src="source/image/product/{{$product->image}}" alt="" style="width: 40%">
        <form role="form"style="width: 55%" action="{{route('adminedit')}}"method="post"enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control"name="name" id="exampleInputEmail1"  placeholder="Enter name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                  <label for="1">Price</label>
                  <input type="text" class="form-control"name="unit_price" id="1" value="{{$product->unit_price}}" placeholder="Enter unit price">
                </div>
                <div class="form-group">
                    <label for="1">Description</label>
                    <input type="text" class="form-control"name="description" id="1"  value="{{$product->description}}"placeholder="Enter description">
                  </div>
                <div class="form-group">
                    <label for="2">Promotion</label>
                    <input type="text" class="form-control"name="promotion_price" id="2" value="{{$product->promotion_price}}" placeholder="Enter promotion price">
                  </div>
                  <div class="form-group">
                    <label for="3">Unit</label>
                    <input type="text" class="form-control"name="unit" id="3"value="{{$product->unit}}"  placeholder="Enter unit">
                  </div>
                  <div class="form-group">
                    <label for="4">New</label>
                    <input type="number" class="form-control"name="new" id="4"value="{{$product->new}}"  placeholder="Enter new">
                  </div>
                  <div class="form-group">
                    <label for="5">Type</label>
                    <input type="text" class="form-control"name="type" id="5" value="{{$product->id_type}}" placeholder="Enter type">
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image file</label>
                    <input type="file" class="form-control-file"name="image" id="exampleFormControlFile1">
                  </div> 
                <input type="text" name="id" hidden value="{{$product->id}}">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
  <div class="space50">&nbsp;</div>
@endsection