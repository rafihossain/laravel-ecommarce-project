@extends('font-end.master')

@section('body')
	<!--content-->
		<div class="content">
			<div class="single-wl3">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="panel panel-default" style="padding:30px">
								<h3 class="text-center">Login hare</h3>
								<hr>
								<h3 class="text-center text-danger">{{ Session::get('message') }}</h3>
								<hr>
								{{ Form::open(['route'=>'account-login', 'method' => 'POST']) }}
									<div class="form-group">
										<label for="">Email Address</label>
										<input type="text" class="form-control" name="email_address" placeholder="example@gmail.com">
									</div>
									<div class="form-group">
										<label for="">Password</label>
										<input type="text" class="form-control" name="password" placeholder="password">
									</div>
									<div class="form-group">
										<label for=""></label>
										<input type="submit" name="btn" class="btn btn-info btn-block" value="Login">
									</div>
								{{ Form::close() }}
							</div>
						</div>
						<div class="col-md-12 text-center">
							<button class="btn btn-warning"><a href="{{ route('account-register-info') }}">Not Any Account? Then Register Here</a></button>
						</div>
					</div>
				</div>
            </div>
		</div>

@endsection