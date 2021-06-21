@extends('font-end.master')

@section('body')
	<!--content-->
		<div class="content">
			<div class="single-wl3">
				<div class="container">
					<div class="row">
						<div class="col-md-12 well">
							<p class="text-center"> Hello Dear <span class="text-success"><strong>{{ Session::get('customerName') }}</strong></span>.
                            Welcome</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-default" style="padding:30px">
								<table>
                                    <tr>
                                        <th>Manage Cart</th>
                                    </tr>
                                    <tr>
                                        <th>Manage Password</th>
                                    </tr>
                                    <tr>
                                        <th>Manage Account</th>
                                    </tr>
                                </table>
							</div>
						</div>
					</div>
				</div>
            </div>
		</div>

@endsection