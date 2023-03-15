@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row d-flex">
        <div class="col-12 d-flex justify-content-center">
            <h2 class="my-4">Add New Post</h2>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-12">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-3">
                    <label for="control-label">
                        Title
                    </label>
                    <input type="text" class="form-control" placeholder="Title" id="title" name="title">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <label class="control-label">Cover</label>
                    <input type="file" name="cover_img" id="cover_img" class="form-control @error('cover_img') is-invalid @enderror">
                    @error('cover_img')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <label for="control-label">
                        Author
                    </label>
                    <input type="text" class="form-control" placeholder="Author" id="author" name="author">
                    @error('author')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <label class="control-label">Categories</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select A Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group my-3">
                    <div class="control-label">Tags</div>
                    @foreach($tags as $tag)
                    <div class="form-check d-flex @error('tags') is-invalid @enderror">
                        <input type="checkbox" value="{{ $tag->id }}" class="m-2" name="tags[]" id="tag_id">{{ $tag->name }},</input>
                    </div>
                    @endforeach
                    @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <label for="control-label">
                        Content
                    </label>
                    <textarea class="form-control" placeholder="Content" id="content" name="content"></textarea>
                </div>
                <div class="form-group my-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-secondary">
                        Save Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection