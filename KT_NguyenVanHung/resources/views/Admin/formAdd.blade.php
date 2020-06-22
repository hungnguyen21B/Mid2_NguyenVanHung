@extends('master')
@section('content')
<div class="space50">&nbsp;</div>
<div  class="container beta-relative" > 
    <div class="pull-left">
        <h2>add</h2>
        </div>
    {{-- <div class="pull-right"><input type="text" placeholder="Search ID"> --}}
        </div> </div>
        <div class="space50">&nbsp;</div>
        @include ('blocks/error')
        <div class="container">
        <form role="form" action="{{route('adminadd')}}"method="post"enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control"name="name" id="exampleInputEmail1"  placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="1">Price</label>
                  <input type="text" class="form-control"name="unit_price" id="1"  placeholder="Enter unit price">
                </div>
                <div class="form-group">
                    <label for="1">Description</label>
                    <input type="text" class="form-control"name="description" id="1"  placeholder="Enter unit price">
                  </div>
                <div class="form-group">
                    <label for="2">Promotion</label>
                    <input type="text" class="form-control"name="promotion_price" id="2"  placeholder="Enter promotion price">
                  </div>
                  <div class="form-group">
                    <label for="3">Unit</label>
                    <input type="text" class="form-control"name="unit" id="3"  placeholder="Enter unit">
                  </div>
                  <div class="form-group">
                    <label for="4">New</label>
                    <input type="number" class="form-control"name="new" id="4"  placeholder="Enter new">
                  </div>
                  <div class="form-group">
                    <label for="5">Type</label>
                    <input type="text" class="form-control"name="type" id="5"  placeholder="Enter type">
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image file</label>
                    <input type="file" class="form-control-file"name="image" id="exampleFormControlFile1">
                  </div> 
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
  <div class="space50">&nbsp;</div>
@endsection