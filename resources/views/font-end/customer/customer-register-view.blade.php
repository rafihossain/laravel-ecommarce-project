@extends('font-end.master')

@section('body')
		<div class="content">
			<div class="single-wl3">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="panel panel-default" style="padding:30px">
								<h3 class="text-center">Register Here</h3>
								<hr>
								{{ Form::open(['route'=>'account-register', 'method'=>'POST']) }}
									<div class="form-group">
										<label for="">First Name</label>
										<input type="text" class="form-control" name="first_name" placeholder="First Name">
									</div>
									<div class="form-group">
										<label for="">Last Name</label>
										<input type="text" class="form-control" name="last_name" placeholder="Last Name">
									</div>
									<div class="form-group">
										<label for="">Email Address</label>
										<input type="email" class="form-control" id="email_address" name="email_address" placeholder="example@gmail.com" autocomplete="off">
										<span class="text-success" id="result"></span>
									</div>
									<div class="form-group">
										<label for="">Password</label>
										<input type="password" class="form-control" name="password" placeholder="Password">
									</div>
									<div class="form-group">
										<label for="">Phone</label>
										<input type="text" class="form-control" name="phone" placeholder="Phone">
									</div>
									<div class="form-group">
										<label for="">Address</label>
										<textarea type="text" class="form-control" name="address"></textarea>
									</div>
									<div class="form-group">
										<label for=""></label>
										<input type="submit" name="btn" id="regBtn" class="btn btn-info btn-block" value="Register">
									</div>
								{{ Form::close() }}
							</div>
						</div>
                        <div class="col-md-12 text-center">
							<button class="btn btn-warning"><a href="{{ route('account-login-info') }}">Already Register? Then Login Here</a></button>
						</div>
					</div>
				</div>
            </div>
		</div>

@endsection