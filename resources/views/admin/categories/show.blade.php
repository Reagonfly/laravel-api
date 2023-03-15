@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between my-3">
                <h2>Category Details: {{ $category->name }}</h2>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-secondary text-white align-self-center">
                    <strong>Back To List</strong>
                </a>
            </div>
        </div>
        <div class="col-12">
            <h2><strong>Slug: </strong>{{ $category->slug }}</h2>
            <h3>Post linked to this Category:</h3>
            <div class="row">
                @forelse($category->posts as $post)
                <div class="col-12 col-md-4">
                    <div class="card p-2">
                        <h4>{{ $post->title }}</h4>{{ $post->title ? $post->title='' : 'Without Title...' }}
                        <p>{{ $post->excerpt }}</p>{{ $post->excerpt ? $post->excerpt='' : 'Without Content...' }}
                        <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-sm btn-secondary text-white">
                            Continue Read
                        </a>
                    </div>
                </div>
                @empty
                <h5 class="text-center">There are No Posts related to This Category</h5>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection