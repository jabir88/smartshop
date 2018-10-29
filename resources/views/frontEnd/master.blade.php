<!DOCTYPE html>
<html>
<head>
<title>Smart Shop a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{asset('front/css/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">


<!-- pignose css -->
<link href="{{asset('front/css/pignose.layerslider.css')}}" rel="stylesheet" type="text/css" media="all" />


<link rel="stylesheet" href="{{asset('front/css/flexslider.css')}}" type="text/css" media="screen" />
<!-- //pignose css -->
<link href="{{asset('front/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<style media="screen">
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: 10px;
  position: relative;
  z-index: 2;
}
.invalid-feedback{
  color: red;
}
#search {
position: relative;
}
#myUL {
  position: absolute;
  list-style-type: none;
  padding: 0;
  top: 100%;
  width: 100%;
  z-index: 10;
  /* margin-top: 20px; */
}
#myUL li {
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #fff;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #f6f6f6;
}
</style>
<script type="text/javascript" src="{{asset('front/js/jquery-2.1.4.min.js')}}"></script>
<!-- single -->
<script src="{{asset('front/js/sweetalert.min.js')}}"></script>
<script src="{{asset('front/js/imagezoom.js')}}"></script>
<script src="{{asset('front/js/jquery.flexslider.js')}}"></script>
<!-- single -->

<script type="text/javascript" src="{{asset('front/js/responsiveslides.min.js')}}"></script>
<!-- //js -->
<!-- cart -->
	<script src="{{asset('front/js/simpleCart.min.js')}}"></script>
<!-- cart -->
<!-- for bootstrap working -->
	<script type="text/javascript" src="{{asset('front/js/bootstrap-3.1.1.min.js')}}"></script>
<!-- //for bootstrap working -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="{{asset('front/js/jquery.easing.min.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
@include('frontEnd.inc.header')
@include('frontEnd.inc.nav')

@yield('myContent')
<!-- //product-nav -->

@include('frontEnd.inc.coupon')
@include('frontEnd.inc.footer')
<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form method="post" action="{{url('/checkout/register')}}">
    @csrf
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text"  value="{{ old('customer_email') }}" name="customer_email"   placeholder="Enter your Email" >
											</div>
                      @if ($errors->has('customer_email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('customer_email') }}</strong>
                          </span>
                      @endif
											<div class="sign-up">
												<h4>Password :</h4>
												{{-- <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required=""> --}}
                        <input  type="password"  value="{{ old('customer_password') }}" name="customer_password" >
                        {{-- <span toggle="#customer_passwordsss" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}

											</div>
                      @if ($errors->has('customer_password'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('customer_password') }}</strong>
                        </span>
                      @endif
											<div class="sign-up">
												<h4>Re-type Password :</h4>
                        {{-- <input id="customer_passwordsss" type="password" value="{{ old('customer_password') }}" name="customer_password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"  > --}}
                        {{-- <span toggle="#customer_passwordsss" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}
												<input  type="password" value="{{ old('customer_confirm') }}" name="customer_confirm" >

                        {{-- <span toggle="#confirms" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}

											</div>
                      @if ($errors->has('customer_confirm'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('customer_confirm') }}</strong>
                        </span>
                      @endif
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>

										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form method="post" action="{{url('/checkout/login')}}">
                      @csrf
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" class="form-control" name="customer_email" >
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
                        <input id="password-fieldsd" type="password" name="customer_password" >
                       {{-- <span toggle="#password-fieldsd" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}

												{{-- <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required=""> --}}
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>

											<div class="sign-in">
                        {{-- <button type="submit" name="login" class="btn btn-primary btn-lg btn-block login-button">Login</button> --}}
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->



<script>
  $( function() {
  	$( "#searchbar" ).autocomplete({
      source:  '{{ url('search') }}'
    });
  } );
  </script>

</body>
</html>
