@extends('frontEnd.master')
@section('myContent')

<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Payment</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->

<div class="checkout">
	<div class="container">
		@php
		$cart_amnt =  Cart::total();
		@endphp
		@if ($cart_amnt != 0)
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
	@endif

		<h3 style="margin-top:80px; font-weight:700; color :#FDA30E;">Payment From</h3>

			@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
		@endif
			@if (session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
		@endif

		<div class="col-4">
		</div>
		<div class="col-4">


@if ($cart_amnt == 0)
	<h2>You Don't Buy Anything. Please Buy Something.</h2>
	<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
		<a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
	</div>

	@else

	<form class="" action="{{url('/checkout/payment/save')}}" method="post">
		@csrf
		<div class="form-check " style="margin:20px 0;">
      <label class="form-check-label" for="cash">
        <input type="radio" checked class="form-check-input" name="payment_type" value="cash" id="cash" name="optradio" checked style="margin-right : 20px;">Cash On Delivery
      </label>
    </div>
    <div class="form-check " style="margin:20px 0;">
      <label class="form-check-label" for="bkash">
        <input type="radio" class="form-check-input" name="payment_type" value="bkash" id="bkash" name="optradio" style="margin-right : 20px;">Bkash
      </label>
    </div>
    <div class="form-check " style="margin:20px 0;">
      <label class="form-check-label" for="Paypal">
        <input type="radio" class="form-check-input" name="payment_type" value="paypal" id="Paypal" style="margin-right : 20px;">Paypal
      </label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

	</form>
	@endif
	</div>
	<div class="col-4">

	</div>
	</div>
</div>

@endsection
