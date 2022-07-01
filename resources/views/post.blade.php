{{-- @dd($post); --}}
@extends('layouts.main');


{{-- {!! tidak di enscape !!} --}}

@section('container')
<div class="container">
    <div class="row justify-content-center mb-5" style="margin-top: 5rem">
        <div class="col-md-8">
            <h3 class="mb-3 fs-2" style="font-weight: 600">{{ $post->title }}</h3>
            <div style="max-height: 350px; overflow: hidden;">
                @if ($post->image)
                    <img src="{{ asset('storage/'. $post->image) }}" alt="" class="img-fluid">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="" class="img-fluid">
                @endif
            </div>
            <div class="infoartikel mt-5">
                <div class="d-flex justify-content-between px-4">
                    <div class="judul-info">
                        Tanggal
                    </div>
                    <div class="value-info">
                        {{ $post->created_at->translatedFormat('l, d F Y')}}
                    </div>
                </div>
            </div>
            <div class="infoartikel">
                <div class="d-flex justify-content-between px-4">
                    <div class="judul-info">
                        Penulis
                    </div>
                    <div class="value-info">
                        <a href="/blog?author={{ $post->author->username }}">
                            {{ $post->author->name }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="infoartikel">
                <div class="d-flex justify-content-between px-4">
                    <div class="judul-info">
                        Kategori
                    </div>
                    <div class="value-info">
                        <a href="/blog?category={{ $post->category->slug }}">
                            {{ $post->category->name }}
                        </a>
                    </div>
                </div>
        </div>
        <div>
            <h2 style="margin-top: 7rem">Article</h2>
            <hr class="mb-5">
        </div>
            <article class="my-3 fs-5" style="font-weight: 300">
                {!! $post->body !!}
            </article>
            <a href="/blog" class="d-block mt-4">Back to Blog</a>
        </div>
    </div>
</div>
@endsection