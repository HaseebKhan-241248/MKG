<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MKG</title>
</head>
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<style>
</style>


<body>

  @inject('request', 'Illuminate\Http\Request')
  {{-- <div class="row">
    <div class="col-md-7 col-sm-7 col-xs-12 right-col eq-height-col">
      <div class="row">
      
      <div class="col-md-9 col-xs-8" style="text-align: right;padding-top: 10px;">
          @if(!($request->segment(1) == 'business' && $request->segment(2) == 'register'))
              <!-- Register Url -->
              @if(config('constants.allow_registration'))
                  <a href="{{ route('business.getRegister') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif" class="btn bg-maroon btn-flat" ><b>{{ __('business.not_yet_registered')}}</b> {{ __('business.register_now') }}</a>
                  <!-- pricing url -->
                  @if(Route::has('pricing') && config('app.env') != 'demo' && $request->segment(1) != 'pricing')
                      &nbsp; <a href="{{ action('\Modules\Superadmin\Http\Controllers\PricingController@index') }}">@lang('superadmin::lang.pricing')</a>
                  @endif
              @endif
          @endif
          @if($request->segment(1) != 'login')
              &nbsp; &nbsp;<span class="text-white">{{ __('business.already_registered')}} </span><a href="{{ action('Auth\LoginController@login') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif">{{ __('business.sign_in') }}</a>
          @endif
      </div>
      
      @yield('content')
      </div>
  </div>
  </div> --}}
  <section>
    
    <div class="box">
      
      <div class="square" style="--i:0;"></div>
      <div class="square" style="--i:1;"></div>
      <div class="square" style="--i:2;"></div>
      <div class="square" style="--i:3;"></div>
      <div class="square" style="--i:4;"></div>
      <div class="square" style="--i:5;"></div>
      
     <div class="container"> 
      <div class="form"> 
        <h2 style="text-align: center;">LOGIN to MKG</h2>
        <form method="POST" action="{{ route('login') }}" id="login-form">
          {{ csrf_field() }}
          <div class="inputBx form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
              @php
                  $username = old('username');
                  $password = null;
                  if(config('app.env') == 'demo'){
                      $username = 'admin';
                      $password = '123456';

                      $demo_types = array(
                          'all_in_one' => 'admin',
                          'super_market' => 'admin',
                          'pharmacy' => 'admin-pharmacy',
                          'electronics' => 'admin-electronics',
                          'services' => 'admin-services',
                          'restaurant' => 'admin-restaurant',
                          'superadmin' => 'superadmin',
                          'woocommerce' => 'woocommerce_user',
                          'essentials' => 'admin-essentials',
                          'manufacturing' => 'manufacturer-demo',
                      );

                      if( !empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types) ){
                          $username = $demo_types[$_GET['demo_type']];
                      }
                  }
              @endphp
              <input id="username" type="text" class="form-control" name="username" value="{{ $username }}" required autofocus >
              <span>Username</span>
              <span class="fa fa-user form-control-feedback"></span>
              @if ($errors->has('username'))
                  <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                  </span>
              @endif
          </div>
          <div class="inputBx form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
              <input id="password" type="password" class="form-control" name="password"
              value="{{ $password }}" required >
              <span>Password</span>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
              <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
          </div>
          <div class="form-group">
              <div class="checkbox icheck">
                
                  <label class="remember">
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('lang_v1.remember_me')
                  </label>
              </div>
          </div>
          <br>
          <div class="inputBx form-group" style="text-align: center;">
            <input type="submit" value="Log in" > 
              {{-- @if(config('app.env') != 'demo')
              <a href="{{ route('password.request') }}" class="pull-right">
                  @lang('lang_v1.forgot_your_password')
              </a>
          @endif --}}
          </div>
      </form>
        <p>Forgot password? <a href="#">Click Here</a></p>
        <p>Not Yet registered? <a href="#">Register Now</a></p>
        {{-- @if(!($request->segment(1) == 'business' && $request->segment(2) == 'register'))
              <!-- Register Url -->
              @if(config('constants.allow_registration'))
                  <a href="{{ route('business.getRegister') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif" class="btn bg-maroon btn-flat" ><b>{{ __('business.not_yet_registered')}}</b> {{ __('business.register_now') }}</a>
                  <!-- pricing url -->
                  @if(Route::has('pricing') && config('app.env') != 'demo' && $request->segment(1) != 'pricing')
                      &nbsp; <a href="{{ action('\Modules\Superadmin\Http\Controllers\PricingController@index') }}">@lang('superadmin::lang.pricing')</a>
                  @endif
              @endif
          @endif
          @if($request->segment(1) != 'login')
              &nbsp; &nbsp;<span class="text-white">{{ __('business.already_registered')}} </span><a href="{{ action('Auth\LoginController@login') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif">{{ __('business.sign_in') }}</a>
          @endif --}}
      </div>
    </div>
      
    </div>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    function show_hide_password(target){
	var input = document.getElementById('password');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}

////////////////////////


$(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "{{ route('login') }}?lang=" + $(this).val();
        });

        $('a.demo-login').click( function (e) {
           e.preventDefault();
           $('#username').val($(this).data('admin'));
           $('#password').val("{{$password}}");
           $('form#login-form').submit();
        });
    })
  </script>
</body>
</html>
