@extends('master')
@section('content')
<div class="container">
    <div id="content">     
              
    <form action="{{route('forgotPassword')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Quen mat khau</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email"id="email" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Send code</button>   
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection