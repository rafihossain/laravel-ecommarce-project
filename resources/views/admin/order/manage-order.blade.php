@extends('admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <h2 class="text-center text-success" id="deleteMassage">{{ Session::get('message') }}</h2>
            <table class="table table-bordered table-striped table-hover text-center">
                <tr>
                    <th>SL No</th>
                    <th>Customer Name</th>
                    <th>Order Total</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($orders as $order)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $order->first_name.' '.$order->last_name }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>{{ $order->payment_type }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>
                        <a href="{{ route('view-order-detail', ['id'=> $order->id ]) }}" class="btn btn-info" title="View Order Details">
                            <i class="fas fa-search-plus"></i>
                        </a>
                        <a href="{{ route('view-order-invoice', ['id'=> $order->id ]) }}" class="btn btn-warning" title="View Order Invoice">
                            <i class="fas fa-search-minus"></i>
                        </a>
                        <a href="{{ route('download-order-invoice', ['id'=> $order->id ]) }}" class="btn btn-primary" title="Download Order Invoice">
                            <i class="fas fa-arrow-alt-circle-down"></i>
                        </a>
                        <a href="{{ route('category-delete', ['id'=> $order->id ]) }}" class="btn btn-success" title="Edit Order">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('category-delete', ['id'=> $order->id ]) }}" class="btn btn-danger" title="Delete Details">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection