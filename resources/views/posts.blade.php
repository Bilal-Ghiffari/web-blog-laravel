{{-- @dd($posts); --}}
{{-- diffForHumans -> untuk mempermudah pembacaan tanggal --}}


@extends('layouts.main');

@section('container')
    <h2 class="my-5 fw-bold" style="color: #FF5E40;">THE BLOG</h2>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value={{ request('category') }}>
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value={{ request('author') }}>
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control fas py-3 px-3 rounded-pill border border-2 border-secondary" placeholder="&#xF002" name="search" value="{{ request('search') }}">
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <div style="max-height: 400px; overflow: hidden;">
                @if ($posts[0]->image)
                    <img src="{{ asset('storage/'. $posts[0]->image) }}" class="card-img-top" alt="...">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
                @endif
            </div>
            <div class="card-body text-center">
                <h3 class="card-title">
                    <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                        {{ $posts[0]->title }}
                    </a>
                </h5>
            <small>
                <p>
                    <a href="/blog?author={{ $posts[0]->author->username }}"  class="text-decoration-none">
                        {{ $posts[0]->author->name }}
                    </a>
                    :
                    <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">
                        {{ $posts[0]->category->name }}
                    </a>
                    {{ $posts[0]->created_at->diffForHumans() }}
                </p>
            </small>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none css-button-arrow--blue">
                    continue reading
                </a>
            </div>
        </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $item)
            <div class="col-md-4 mb-3">
                <div class="card border-0">
                    @if ($item->image)
                        <img src="{{ asset('storage/'. $item->image) }}" class="card-img-top" alt="">
                    @else
                        <img src="https://source.unsplash.com/1920x1280?{{ $item->category->name }}" class="card-img-top" alt="">
                    @endif
                            <div class="position-absolute text-white px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                                <a href="/blog?category={{ $item->category->slug }}" class="text-white text-decoration-none">
                                    {{ $item->category->name }}
                                </a>
                            </div>
                    <div class="card-body">
                        <small class="text-muted">
                            {{ $item->created_at->diffForHumans() }}
                        </small>
                        <a href="/blog/{{ $item->slug }}" class="link-blog text-decoration-none text-black">
                            <h5 class="card-title fw-bold pt-2 fs-4">{{ $item->title }}</h5>
                        </a>
                        <p class="card-text">{{ $item->excerpt }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
        <div class="text-center my-5">
            <img src="/img/not-found.png" class="img-fluid" height="500" width="430" alt="not-found">
            <p class="fs-4 fw-bold text-muted">Haii {{ auth()->user()->name }}</p>
            <span class="fs-5 text-muted">
                Postingan anda tidak ditemukan 
            </span>
        </div>
    @endif
    <div>
        {{ $posts->links() }}
    </div>
@endsection
