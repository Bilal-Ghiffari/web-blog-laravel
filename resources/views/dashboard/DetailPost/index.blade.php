@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <h3 class="mb-3">{{ $post->title }}</h3>
            @if ($post->image)
            <div style="max-height: 350px; overflow: hidden;">
                <img src="{{ asset('storage/'. $post->image) }}" alt="" class="img-fluid">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="" class="img-fluid">
            @endif
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            <a href="/dashboard" class="btn btn-success mt-4 p-2 text-decoration-none">Back to post</a>
        </div>
    </div>
</div>
@endsection
