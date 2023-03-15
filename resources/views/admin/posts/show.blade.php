@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between my-3">
                <h2>Post Details: {{ $post->title }}</h2>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-secondary text-white align-self-center">
                    <strong>Back To List</strong>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                @if ($post->cover_img)
                <img src="{{ asset('storage/' .$post->cover_img) }}" alt="{{ $post->title }}" class="img-fluid w-25 my-3">
                @else
                <p>No image was found</p>
                @endif

            </div>
            <p>
                <strong class="text-danger">Slug: </strong> {{ $post->slug }}
            </p>
            <p>
                <strong>Author: </strong> {{ $post->author }}
            </p>
            <p>
                <strong>Category: </strong>
                @if ($post->category)
                {{ $post->category->name }}
                @else
                No categories related to this post.
                @endif
            </p>
            <p>
                <strong>Tags: </strong>
                @if ($post->tags->count() > 0)
                @foreach ($post->tags as $tag)
                {{ $tag->name }}
                @if (!$loop->last), @endif
                @endforeach
                @else
                No tags found.
                @endif
            </p>
            <label class="d-block text-danger my-3">
                <strong>Content: </strong>
            </label>
            <p>
                <strong class="text-dark"> {{ $post->content }} </strong>
            </p>
        </div>
    </div>
</div>
@endsection