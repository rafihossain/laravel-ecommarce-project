@extends('admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h4 class="text-center text-dark my-4">Add Category Form</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center text-success" id="deleteMessage">{{ Session::get('message') }}</h2>
                    {{ Form::open(['route'=>'category-save', 'method'=>'POST']) }}
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <input type="text" name="category_name" id="" class="form-control">
                                <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Category Description</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                <textarea class="form-control" name="category_description" id="" rows="3"></textarea>
                                <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Publication Status</label>
                            <div class="col-md-8">
                                <input type="radio" name="publication_status" id="" value="1"> Published
                                <input type="radio" name="publication_status" id="" value="0"> Unpublished <br>
                                <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Category Info">
                            </div>
                        </div>
                    {{ Form::close() }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection