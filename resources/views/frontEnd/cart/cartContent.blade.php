@extends('frontEnd.master')
@section('myContent')

<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<?php $contents = Cart::content();

			?>
			<table class="timetable_sub">
				<thead>
					<tr>

						<th>Product</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>Remove</th>
					</tr>
				</thead>
					@foreach($contents as $content)
					<tr class="rem1">

						</td>
						<td class="invert-image"><a href="{{url('/single/'.$content->id)}}"><img src="{{asset('/'.$content->options->image)}}" alt=" "  width="80px" class="img-responsive" /></a></td>
							<td class="invert">{{$content->name}}</td>
							<td class="invert">{{$content->price}}</td>
						<td class="invert">
							 <form class="" action="{{url('/update-cart')}}" method="post">
								 	@csrf
							 <div class="quantity">
								<div class="quantity-select">
									<!-- <div class="entry value-minus">&nbsp;</div> -->

										<input class="entry value" type="number" name="qty" value="{{$content->qty}}">
										<input type="hidden" name="rowId" value="{{$content->rowId}}">


								<button type="submit" class="item_add hvr-outline-out button2" style="margin-left: 20px; border:0; color: #fff; font-weight: 700; padding: 5px 15px;" name="button">Update</button>
									<!-- <div class="entry value-plus active">&nbsp;</div> -->
								</div>
							</div>

						</form>
						</td>

						<td class="invert">BDT {{$content->total}}</td>
						<td class="invert-closeb">
							<div class="rem">

								<a href="{{('/delete-cart/'.$content->rowId)}}">
								<div class="close1"> </div></a>
							</div>

					</tr>
								@endforeach
								<tr>
									<td colspan="4" style="color:#fff; background:#FDA30E; font-weight: 700;">Total :</td>
									<td >BDT {{Cart::total()}}</td>
								</tr>
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">

				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				@if(Session::get('customer_id')== null && Session::get('shipping_id')== null)
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{url('/checkout/sign-up')}}">Checkout <span style="margin-left : 20px;" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
				</div>
				@elseif(Session::get('customer_id') != null && Session::get('shipping_id')!= null )
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{url('/checkout/payment')}}">Payment <span style="margin-left : 20px;" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
				</div>
				@else
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{url('/checkout/shipping')}}">Shipping <span style="margin-left : 20px;" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
				</div>

				@endif

				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Shopping basket</h4>
					<ul>
						<li>Hand Bag <i>-</i> <span>$45.99</span></li>
						<li>Watches <i>-</i> <span>$45.99</span></li>
						<li>Sandals <i>-</i> <span>$45.99</span></li>
						<li>Wedges <i>-</i> <span>$45.99</span></li>
						<li>Total <i>-</i> <span>$183.96</span></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
</div>

@endsection
