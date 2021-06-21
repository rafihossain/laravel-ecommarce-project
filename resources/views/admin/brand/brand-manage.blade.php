@extends('admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <h2 class="text-center text-success" id="deleteMassage">{{ Session::get('message') }}</h2>
            <table class="table tabel-bordered text-center">
                <tr>
                    <th>SL No</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($brands as $brand)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $brand->brand_name }}</td>
                    <td>{{ $brand->brand_description }}</td>
                    <td>{{ $brand->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                    <td>
                        @if($brand->publication_status == 1)
                            <a href="{{ route('brand-unpublished', ['id'=> $brand->id ]) }}" class="btn btn-info btn-xs">
                                <i class="fas fa-arrow-up"></i>
                            </a>
                        @else
                            <a href="{{ route('brand-published', ['id'=> $brand->id ]) }}" class="btn btn-warning btn-xs">
                                <i class="fas fa-arrow-down"></i>
                            </a>
                        @endif
                            <a href="{{ route('brand-edit', ['id'=> $brand->id ]) }}" class="btn btn-success btn-xs">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('brand-delete', ['id'=> $brand->id ]) }}" class="btn btn-danger btn-xs">
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