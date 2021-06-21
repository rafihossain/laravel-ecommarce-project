@extends('admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h4 class="text-center text-dark my-4">Edit Brand Form</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center text-success" id="deleteMessage">{{ Session::get('message') }}</h2>
                    {{ Form::open(['route'=>'brand-update', 'method'=>'POST']) }}
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Brand Name</label>
                            <div class="col-md-8">
                                <input type="text" name="brand_name" id="" class="form-control" value="{{ $brand->brand_name }}">
                                <input type="hidden" name="brand_id" id="" class="form-control" value="{{ $brand->id }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Brand Description</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                <textarea class="form-control" name="brand_description" id="" rows="3">{{ $brand->brand_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Publication Status</label>
                            <div class="col-md-8">
                                <input type="radio" name="publication_status" {{ $brand->publication_status == 1 ? 'checked' : '' }} id="" value="1"> Published
                                <input type="radio" name="publication_status" {{ $brand->publication_status == 0 ? 'checked' : '' }} id="" value="0"> Unpublished
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Category Info">
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection