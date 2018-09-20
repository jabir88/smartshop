@extends('frontEnd.master')
@section('myContent')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Register / Login</h3>
	</div>
</div>
	<div class="container">
		<div class="row ">

			<!-- Sign UP Form  -->
			<div class="col-lg-6 " style="margin : 60px 0;">


				<form class="form-horizontal" method="post" action="{{url('/checkout/register')}}">
					@csrf
				<h2 style="margin : 40px 0; color:#FDA30E; font-weight:700;" > Sign Up</h2>
				<div class="form-group">
					<label for="firstname" class="cols-sm-2 control-label">Your First Name</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="customer_firstname" id="firstname"  placeholder="Enter your First Name"/>
						</div>
					</div>

						</div>
						<div class="form-group">
						<label for="lastname" class="cols-sm-2 control-label">Your Last Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="customer_lastname" id="lastname"  placeholder="Enter your Last Name"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="customer_email" id="email"  placeholder="Enter your Email"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="phone" class="cols-sm-2 control-label">Phone</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="customer_phone" id="phone"  placeholder="Enter your Phone"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="customer_password" id="password"  placeholder="Enter your Password"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="customer_confirm" id="confirm"  placeholder="Confirm your Password"/>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label for="address" class="cols-sm-2 control-label">Address</label>
						<div class="cols-sm-10">
							<div class="input-group">

								<textarea name="customer_address" id="address" rows="8" cols="70"></textarea>

							</div>
						</div>
					</div>

					<div class="form-group ">
						<button type="submit"  name="sign_up"  class="btn btn-primary btn-lg btn-block login-button">Register</button>
					</div>

				</form>
				</div>
<div class="col-lg-2">

</div>
				<div class="col-lg-4 " style="margin : 60px 0;">


					<form class="form-horizontal" method="post" action="{{url('/checkout/login')}}">
						@csrf
					<h2 style="margin : 40px 0; color:#FDA30E; font-weight:700;" > Login</h2>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="customer_email" id="email"  placeholder="Email Address"/>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="customer_password" id="password"  placeholder="Password"/>
								</div>
							</div>
						</div>



						<div class="form-group ">
							<button type="submit" name="login" class="btn btn-primary btn-lg btn-block login-button">Login</button>
						</div>

					</form>

	</div>
</div>
</div>

@endsection
