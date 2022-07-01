{{-- 32:27 --}}

@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>
        <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($posts as $item)
          <div class="col">
            <div class="card shadow-sm">
              <img src="{{ asset('storage/'. $item->image) }}" class="bd-placeholder-img card-img-top" width="100%" height="255" alt="">
              <div class="card-body">
                <div class="py-3">
                  <small><span class="fw-bold">{{ $item->category->name }}</span> | <span class="text-muted">{{ $item->author->name }}</span></small>
                </div>
                <p class="card-text">
                  {{ $item->excerpt }}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                  <a href="/dashboard/posts/{{ $item->slug }}">continue reading</a>
                  <small class="text-muted">{{ $item->created_at->diffForHumans(null, true) }}</small>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
      </main>
@endsection