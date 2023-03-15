@extends('layouts.admin');
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-4">
            <div class="d-flex justify-content-evenly">
                <div>
                    <h3>Category List</h3>
                </div>
                <div>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-secondary">Add New Category</a>
                </div>
            </div>
        </div>
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="col-12">
            <table class="table table-striped table-dark">
                <thead class="text-primary">
                    <th> Id </th>
                    <th> Name </th>
                    <th> Slug </th>
                    <th> Actions </th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="text-success">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('admin.categories.show', $category->slug) }}" title="View Category" class="btn btn-sm btn-success">
                                <i class="fa-solid fa-scroll"></i>
                            </a>
                            <a href="#" title="Edit Category" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-pen-nib"></i>
                            </a>
                            <a href="#" title="Delete Category" class="btn btn-sm btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection