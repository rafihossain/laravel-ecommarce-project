@extends('font-end.master')

@section('body')
    <div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>OrderComplete</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="single-wl3">
				<div class="container">
					<div class="row">
						<div class="col-md-12 well text-center">
							<h4>Order #0000{{ Session::get('customerId') }}</h4> <br>
							<h4>Thank you for your order!</h4><br>
							<p>
							We will contact you soon to verify the order.<br><br>

							Should you have any questions about your order, feel free to call us on 01770106664 (10 AM - 5 PM).<br><br><br>


							You may return product if you find any manufacturing flaw in it. You have 2 calendar days after delivery to return us the product.<br>
							If it does not reach our office within 2 days it will be considered as a warranty issue. The product should be returned with box <br>
							and other included accessories. It has to be claimed by physically coming to the relative branch of Star Tech.</p>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center" style="border-top: 2px solid #ddd; padding-top: 15px;">
							<a href="{{ route('/') }}" class="btn btn-success">Continue shopping</a>  
						</div>
					</div>
				</div>
            </div>
		</div>
@endsection