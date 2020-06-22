@extends('master')
@section('content')
<div class="container">
    @include('blocks/error')
    <div id="content">     
    <form action="{{route('resetPassword')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Reset password</h4>
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email">Password*</label>
                        <input type="text" name="password"id="email" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Confirm*</label>
                        <input type="text" name="password_confirmation"id="phone" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Change</button>
                        
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection