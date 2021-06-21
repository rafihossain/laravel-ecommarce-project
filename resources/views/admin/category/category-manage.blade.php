@extends('admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <h2 class="text-center text-success" id="deleteMassage">{{ Session::get('message') }}</h2>
            <table class="table tabel-bordered text-center">
                <tr>
                    <th>SL No</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($categories as $category)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->category_description }}</td>
                    <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                    <td>
                        @if($category->publication_status == 1)
                            <a href="{{ route('category-unpublished', ['id'=> $category->id ]) }}" class="btn btn-info btn-xs">
                                <i class="fas fa-arrow-up"></i>
                            </a>
                        @else
                            <a href="{{ route('category-published', ['id'=> $category->id ]) }}" class="btn btn-warning btn-xs">
                                <i class="fas fa-arrow-down"></i>
                            </a>
                        @endif
                            <a href="{{ route('category-edit', ['id'=> $category->id ]) }}" class="btn btn-success btn-xs">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('category-delete', ['id'=> $category->id ]) }}" class="btn btn-danger btn-xs">
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