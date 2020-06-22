@extends('master')
@section('content')
<div class="container">
    <div id="content">     
    <form action="{{route('postCheckCode')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Enter code</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Code*</label>
                        <input type="text" name="code"id="email" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Check</button>   
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection