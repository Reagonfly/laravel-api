@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-4">
            <div class="d-flex justify-content-evenly">
                <div>
                    <h3>Tags List</h3>
                </div>
            </div>
        </div>
        <div class="col-12 my-4">
            <table class="table table-striped table-dark">
                <thead class="text-primary">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td class="text-success">{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td>//</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection