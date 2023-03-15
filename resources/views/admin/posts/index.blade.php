@extends('layouts.admin');
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-4">
            <div class="d-flex justify-content-evenly">
                <div>
                    <h3>Posts List</h3>
                </div>
                <div>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-secondary">Add New Post</a>
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
                    <th> Title </th>
                    <th> Slug </th>
                    <th> Author </th>
                    <th>Category</th>
                    <th> Action </th>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr class="my-3">
                        <th class="text-success"> {{ $post->id }} </th>
                        <th> {{$post->title}} </th>
                        <th> {{$post->slug}} </th>
                        <th>@if ($post->author)
                            {{ $post->author }}
                            @else
                            No Author Found.
                            @endif
                        </th>
                        <th>@if ($post->category)
                            {{ $post->category->name }}
                            @else
                            No Category related to this post.
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('admin.posts.show', $post->slug) }}" title="View Post" class="btn btn-sm btn-success">
                                <i class="fa-solid fa-scroll"></i>
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->slug) }}" title="Modify Post" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-pen-nib"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete Post" class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </th>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center">
                            There are no Posts, Wanna Make One? do it <a href="{{ route('admin.posts.create') }}">HERE</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection