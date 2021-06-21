@extends('font-end.master')

@section('body')
    <div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Add To Cart</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="single-wl3">
				<div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-success text-center">My Shopping Cart</h3>
                            <hr>
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered table-stripe">
                                    <tr class="bg-primary">
                                        <td>SL No</td>
                                        <td>Name</td>
                                        <td>Image</td>
                                        <td>Price</td>
                                        <td>Quantity</td>
                                        <td>Total Price Tk</td>
                                        <td>Action</td>
                                    </tr>
                                    @php ($i = 1)
                                    @php ($sum = 0)
                                    @foreach($cartProducts as $cartProduct)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $cartProduct->name }}</td>
                                        <td><img src="{{ asset($cartProduct->options->image) }}" alt="product_image" height="100"></td>
                                        <td>{{ $cartProduct->price }}</td>
                                        <td>
                                            {{ Form::open(['route'=> 'cart-update', 'method'=>'POST']) }}
                                                <input type="number" class="ctrl" name="qty" value="{{ $cartProduct->qty }}" min="1" />
                                                <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}" />
                                                <input type="submit" name="btn" value="Update" />
                                            {{ Form::close() }}
                                        </td>
                                        <td>{{ $total = $cartProduct->price*$cartProduct->qty }}</td>
                                        <td>
                                            <a href="{{ route('delete-cart-item', ['rowId'=>$cartProduct->rowId]) }}" class="btn btn-danger btn-xs" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $sum = $sum+$total; ?>
                                    @endforeach
                                </table>
                            </div>
                            <hr>
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>Item Total (TK.)</th>
                                    <td>{{ $sum }}</td>
                                </tr>
                                <tr>
                                    <th>Vat Total (TK.)</th>
                                    <td>{{ $vat = 0 }}</td>
                                </tr>
                                <tr>
                                    <th>Grand Total (TK.)</th>
                                    <td>{{ $orderTotal = $sum+$vat }}</td>
                                    <?php Session::put('orderTotal', $orderTotal); ?>
                                </tr>
                            </table>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::get('customerId') && Session::get('shippingId'))
                            <a href="{{ route('checkout-payment') }}" class="btn btn-success pull-right">Checkout</a>
                            @elseif(Session::get('customerId'))
                            <a href="{{ route('checkout-shipping') }}" class="btn btn-success pull-right">Checkout</a>
                            @else
                            <a href="{{ route('checkout') }}" class="btn btn-success pull-right">Checkout</a>
                            @endif
                            <a href="{{ route('/') }}" class="btn btn-success">Continue shopping</a>     
                        </div>    
                    </div>
				</div>
			</div>

		</div>

@endsection