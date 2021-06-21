@extends('font-end.master')

@section('body')
    <div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Shipping</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="single-wl3">
				<div class="container">
					<div class="row">
						<div class="col-md-12 well">
							<p class="text-center">Dear <span class="text-success"><strong>{{ Session::get('customerName') }}</strong></span>.
                            You have to give us product shipping info to complete your valuable order. If your billing info & shipping info are same
                            then just press the Save Shipping Info button</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-default" style="padding:30px">
								<hr>
								{{ Form::open(['route'=>'new-shipping', 'method'=>'POST']) }}
									<div class="form-group">
										<label for="">Full Name</label>
										<input type="text" class="form-control" name="full_name" value="{{ $customer->first_name.' '.$customer->last_name }}">
									</div>
									<div class="form-group">
										<label for="">Email Address</label>
										<input type="email" class="form-control" name="email_address" value="{{ $customer->email_address }}">
									</div>
									<div class="form-group">
										<label for="">Phone</label>
										<input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
									</div>
									<div class="form-group">
										<label for="">Address</label>
										<textarea type="text" class="form-control" name="address">{{ $customer->address }}</textarea>
									</div>
									<div class="form-group">
										<label for=""></label>
										<input type="submit" name="btn" class="btn btn-info btn-block" value="Save Shapping Info">
									</div>
								{{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
            </div>
		</div>

@endsection