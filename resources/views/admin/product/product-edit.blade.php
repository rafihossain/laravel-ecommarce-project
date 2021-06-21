@extends('admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h4 class="text-center text-dark my-4">Edit Product Info</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center text-success" id="deleteMessage">{{ Session::get('message') }}</h2>
                    {{ Form::open(['route'=>'product-update', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'id'=>'editProductForm']) }}
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <select name="category_id" id="" class="form-control">
                                    <option value="">---Select Category Name---</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Brand Name</label>
                            <div class="col-md-8">
                                <select name="brand_id" id="" class="form-control">
                                    <option value="">---Select Brand Name---</option>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Product Name</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                <input type="text" class="form-control" value="{{ $product->product_name }}" name="product_name" id="">
                                <input type="hidden" class="form-control" value="{{ $product->id }}" name="product_id">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Product Price</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                <input type="number" class="form-control" value="{{ $product->product_price }}" name="product_price" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Product Quantity</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                <input type="number" class="form-control" value="{{ $product->product_quantity }}" name="product_quantity" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Short Description</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                <input type="text" class="form-control" value="{{ $product->short_description }}" name="short_description" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Long Description</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                <textarea class="form-control" name="long_description" id="editor" rows="3">{{ $product->long_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Product Image</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                <input type="file" name="product_image" id="" accept="image/*">
                                </div>
                                <div>
                                    <img src="{{ asset($product->product_image) }}" alt="product_image" height="50" width="50">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Publication Status</label>
                            <div class="col-md-8">
                                <input type="radio" name="publication_status" {{ $product->publication_status == 1 ? 'checked' : '' }} id="" value="1"> Published
                                <input type="radio" name="publication_status" {{ $product->publication_status == 0 ? 'checked' : '' }} id="" value="0"> Unpublished
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Product Info">
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['editProductForm'].elements['category_id'].value = "{{ $product->category_id }}";
    document.forms['editProductForm'].elements['brand_id'].value = "{{ $product->brand_id }}";
</script>
@endsection