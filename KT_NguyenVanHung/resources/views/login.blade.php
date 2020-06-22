@extends('master')
@section('content')
<div class="container">
    <div id="content">     
               @if(Session::has('checkLogin'))
                @if(Session::get('checkLogin')=='fail')
                <div class="alert alert-danger">
                    Login failed!
                </div>
                @endif
               @endif
    <form action="{{route('login')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email"id="email" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="text" name="password"id="phone" required>
                    <a href="{{route('getforgotPassword')}}"style="color:blue; font-size:11px; float:right; margin-right:40%;">Forgot your password?</a>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Login</button>
                        
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection