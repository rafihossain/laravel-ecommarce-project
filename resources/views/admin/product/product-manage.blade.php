@extends('admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <h2 class="text-center text-success" id="deleteMassage">{{ Session::get('message') }}</h2>
            <table class="table table-bordered table-striped table-hober text-center">
                <tr>
                    <th>SL No</th>
                    <th>Category Name</th>
                    <th>Brand Name</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Image</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($products as $product)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $product->category_name }}</td>
                    <td>{{ $product->brand_name }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_price }}</td>
                    <td>{{ $product->product_quantity }}</td>
                    <td><img src="{{ asset($product->product_image) }}" alt="product_image" height="100" width="100"></td>
                    <td>{{ $product->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                    <td>
                        @if($product->publication_status == 1)
                            <a href="{{ route('product-unpublished', ['id'=> $product->id ]) }}" class="btn btn-info btn-xs">
                                <i class="fas fa-arrow-up"></i>
                            </a>
                        @else
                            <a href="{{ route('product-published', ['id'=> $product->id ]) }}" class="btn btn-warning btn-xs">
                                <i class="fas fa-arrow-down"></i>
                            </a>
                        @endif
                            <a href="{{ route('product-edit', ['id'=> $product->id ]) }}" class="btn btn-success btn-xs">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('product-delete', ['id'=> $product->id ]) }}" class="btn btn-danger btn-xs">
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