@extends('frontEnd.master')
@section('myContent')

<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Contact</h3>
	</div>
</div>
<!-- //banner -->
<!-- contact -->

	<div class="contact">
		<div class="container">
			<div class="contact-grids">
				<div class="col-md-4 contact-grid text-center animated wow slideInLeft" data-wow-delay=".5s">
					<div class="contact-grid1">
						<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
						<h4>Address</h4>
						<p>12K Street, 45 Building Road <span>New York City.</span></p>
					</div>
				</div>
				<div class="col-md-4 contact-grid text-center animated wow slideInUp" data-wow-delay=".5s">
					<div class="contact-grid2">
						<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
						<h4>Call Us</h4>
						<p>+1234 758 839<span>+1273 748 730</span></p>
					</div>
				</div>
				<div class="col-md-4 contact-grid text-center animated wow slideInRight" data-wow-delay=".5s">
					<div class="contact-grid3">
						<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
						<h4>Email</h4>
						<p><a href="mailto:info@example.com">info@example1.com</a><span><a href="mailto:info@example.com">info@example2.com</a></span></p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="map wow fadeInDown animated" data-wow-delay=".5s">
				<h3 class="tittle">View On Map</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2482.432383990807!2d0.028213999961443994!3d51.52362882484525!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819" frameborder="0" style="border:0"></iframe>
			</div>
			<h3 class="tittle">Contact Form</h3>

			<div class="row">
				<div class="col-lg-12 text-left">

			@if (session('hoise'))
				<script type="text/javascript">
					swal("Success", "{{ session('hoise') }}", "success");
				</script>
			@endif


			<!-- @if (session('hoise'))


				<div class="alert alert-success contact_al alert-dismissable">
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

	        {{ session('hoise') }}
				</div>

	@endif -->


			{{-- @if($errors->any())
				<div class="alert alert-danger alert-dismissable contact_al">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					@foreach ($errors->all() as $error)
							<div>{{ $error }}</div>
					@endforeach
				</div>
			@endif --}}





</div>
</div>
			<form action="{{url('contact/submit')}}" method='post'>
				@csrf
				<div class="contact-form2">

					<input type="text" placeholder="Name" name="Name"  value="{{old('Name')}}">
					<div class="" style="color:red ; display:inline-block">
						@if ($errors->has('Name'))
								<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('Name') }}</strong>
								</span>
						@endif
					</div>

					<input type= "text" placeholder="Email" name= "Email"  value="{{old('Email')}}">
					<div class="" style="color:red ; display:inline-block">
						@if ($errors->has('Email'))
								<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('Email') }}</strong>
								</span>
						@endif
					</div>

					<textarea type="text" name="Message" placeholder="Message...">{{old('Message')}}</textarea>
					<div class="" style="color:red ; display:block ; margin-bottom:10px">
						@if ($errors->has('Message'))
								<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('Message') }}</strong>
								</span>
						@endif
					</div>
					{{-- {!! app('captcha')->render(); !!} --}}
				{{-- @captcha --}}
				{{-- 		@if ($errors->has('g-recaptcha-response'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('g-recaptcha-response') }}</strong>
						</span>
					@endif --}}
					<div class="my-2">

					<input type="submit" value="Submit">
				</div>
				</div>
			</form>
		</div>
	</div>

<!-- //contact -->



@endsection
