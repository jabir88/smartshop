@extends('frontEnd.master')
@section('myContent')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Register / Login</h3>
	</div>
</div>
<div class="container">
		<div class="row" style="margin :auto;">

			<!-- Sign UP Form  -->
			<div class="col-lg-6 " >


				<form class="form-horizontal" method="post" action="{{url('/checkout/shipping/save')}}">
					@csrf
				<h2 style="margin : 40px 0; color:#FDA30E; font-weight:700;" > Shipping Form</h2>
				<div class="form-group">
					<label for="fullname" class="cols-sm-2 control-label">Full Name  : </label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="shipping_fullname" id="fullname" value="{{$ship->customer_firstname." ".$ship->customer_lastname}}" placeholder="Enter your Full Name"/>
						</div>
					</div>

						</div>


					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Email : </label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="shipping_email" value="{{$ship->customer_email}}" id="email"  placeholder="Enter your Email"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="phone" class="cols-sm-2 control-label">Phone : </label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="shipping_phone" id="phone" value="{{$ship->customer_phone}}"  placeholder="Enter your Phone"/>
							</div>
						</div>
					</div>





					<div class="form-group">
						<label for="address" class="cols-sm-2 control-label">Address : </label>
						<div class="cols-sm-10">
							<div class="input-group">

								<textarea name="shipping_address" id="address" rows="8" cols="70">{{$ship->customer_address}}</textarea>

							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="cols-sm-2 control-label">City Name : </label>
						<select  name="shipping_city">
						<option selected>select city name</option>
						<option value="Dhaka">Dhaka</option>
						<option value="Feni">Feni</option>
						<option value="Noyakhali">Noyakhali</option>
						<option value="Pabna">Pabna</option>
					</select>
					</div>
					<div class="form-group">
						<label for="address" class="cols-sm-2 control-label">Country Name : </label>
							<select  name="shipping_country">
								<option selected>select country name</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="India">India</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Srilanka">Srilanka</option>
							</select>
					</div>

					<div class="form-group ">
						<button type="submit"  name="sign_up"  class="btn btn-primary btn-lg btn-block login-button">Save Shipping Information</button>
					</div>

				</form>
				</div>
</div>
</div>

@endsection
