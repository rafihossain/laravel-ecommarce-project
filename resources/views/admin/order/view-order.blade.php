@extends('admin.master')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <h3 class="text-center text-success">Customer For This Order</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Customer Name</th>
                            <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{ $customer->email_address }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $customer->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <h3 class="text-center text-success">Shipping For This Order</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>{{ $shipping->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $shipping->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{ $shipping->email_address }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $shipping->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <h3 class="text-center text-success">Payment For This Order</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Payment Type</th>
                            <td>{{ $payment->payment_type }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $payment->payment_status }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-center text-success"> Product Info For This Order</h3>
            <table class="table table-bordered table-striped table-hover text-center">
                <tr>
                    <th>SL No</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total Price</th>
                </tr>
                @php($i=1)
                @foreach($orderDetails as $orderDetail)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $orderDetail->product_id }}</td>
                    <td>{{ $orderDetail->product_name }}</td>
                    <td>{{ $orderDetail->product_price }}</td>
                    <td>{{ $orderDetail->product_quantity }}</td>
                    <td>{{ $orderDetail->product_quantity*$orderDetail->product_price }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection