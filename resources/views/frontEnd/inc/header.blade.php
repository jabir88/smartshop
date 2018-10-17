<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free And Fast Delivery</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders {{Session::get('customer_id')}}</li>
			<li>
				@if(Session::get('customer_id') == null)
				<a href="{{url('/checkout/sign-up')}}" class="text-left">Create Account / </a>
				<a href="{{url('/checkout/sign-up')}}" class="text-right" style="color:#FDA30E; font-weight:700; text-decoration:underline;">Login</a>
				@else
				<a href="{{url('/')}}" class="text-left">{{Session::get('customer_name')}} / </a>
				<a href="{{url('/checkout/logout')}}" class="text-right" style="color:#FDA30E; font-weight:700; text-decoration:underline;">Logout</a>

				@endif
			</li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="{{url('/')}}"><img src="{{asset('front/images/')}}/logo3.jpg"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form>
				<div class="search">
					<input type="search" value="Search" name="searchbar" id="searchbar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="section_room">
					<select id="country" onChange="" class="frm-field required">
						<option value="null" selected>All categories</option>
						@foreach ($cate2 as $cate)

							<option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
						@endforeach

					<script type="text/javascript">
						function myNewFunction(sel) {
							var text = sel.options[sel.selectedIndex].text;

						}

						// $(document).ready(function(){
							// $("#country option").click(function(){
							//  var h =	$("#country option:selected").text();
							//  alert(h);
							// });
						// });
					</script>
					</select>
				</div>

				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				<li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>

				</li>
				<li><a class="fb" href="#"></a></li>
				<li><a class="twi" href="#"></a></li>
				<li><a class="insta" href="#"></a></li>
				<li><a class="you" href="#"></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
