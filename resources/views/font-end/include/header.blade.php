<div class="header">
			<div class="header-top">
				<div class="container">
					 <div class="top-left">
						<a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
					</div>
					<div class="top-right">
						<div class="row">
							<ul style="display: flex;">
								<li><a href="#">Checkout</a></li>
								@if( Session::get('customerId') )
								<li><a href="#" onclick="document.getElementById('customerLogoutForm').submit();">Logout</a></li>
									{{ Form::open(['route'=>'customer-logout', 'method'=>'POST', 'id'=>'customerLogoutForm']) }}
									{{ Form::close() }}
								@else
								<li><a href="{{ route('account-login-info') }}">Login</a></li>
								@endif

								@if( Session::get('customerId') )
								<li><a href=""></a></li>
								@else
								<li><a href="{{ route('account-register-info') }}"> Create Account </a></li>
								@endif
							</ul>
						</div>
					</div>
					<!-- <div class="clearfix"></div> -->
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="{{ route('/') }}">New Shop <span>Shop anywhere</span></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
								@foreach($categories as $category)
									<li class="active"><a href="{{ route('category-product', [$category->id]) }}" class="act">{{ $category->category_name }}</a></li>
								@endforeach
								</ul>
							</div>
							</nav>
						</div>
						<div class="header-right2">
							<div class="cart box_1">
								<a href="{{ route('show-cart') }}">
									<h3> <div class="total">
										<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
										<img src="{{ asset('/') }}/font-end/images/bag.png" alt="" />
									</h3>
								</a>
								<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
								<div class="clearfix"> </div>
							</div>	
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>