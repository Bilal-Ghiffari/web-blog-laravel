@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>
        </div>

        <div class="col-lg-8">
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="mb-4" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title')
                        is-invalid
                    @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug')
                        is-invalid
                    @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    @if ($post->image)
                        <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid img-preview mb-3 col-sm-5 d-block" alt="">
                    @else
                        <img class="img-preview img-fluid col-sm-5 mb-3">
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" 
                    type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $item)
                            @if (old('category_id', $post->category_id) == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Description</label>
                    @error('body')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>
    <script src="/Js/index.js"></script>
@endsection