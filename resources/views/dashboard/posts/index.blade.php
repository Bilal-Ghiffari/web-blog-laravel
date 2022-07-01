@extends('dashboard.layouts.main')
{{-- 23:43 --}}
@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Posts</h1>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive col-lg-10">
          <a href="/dashboard/posts/create" class="btn btn-primary mb-3">
            <span data-feather="plus"></span> Create
          </a>
          @if ($posts->count())
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                  <tr>
                    <td class="fs-6">{{ $loop->iteration }}</td>
                    <td class="px-2">
                      @if ($item->image)
                        <img src="{{ asset('storage/'. $item->image) }}" class="img-fluid" width="70" height="50" alt="">
                    @else
                        
                    @endif
                  </td>
                    <td class="fs-6">{{ $item->title }}</td>
                    <td class="fs-6">{{ $item->category->name }}</td>
                    <td>
                      <a href="/dashboard/posts/{{ $item->slug }}" class="btn btn-info">
                        <span data-feather="eye"></span>
                      </a>
                      <a href="/dashboard/posts/{{ $item->slug }}/edit" class="btn btn-warning">
                        <span data-feather="edit-2"></span> Edit
                      </a>
                      <form action="/dashboard/posts/{{ $item->slug }}" class="d-inline" method="POST">
                      @method('Delete') 
                      @csrf
                          <button type="submit" onclick="return confirm('apakah anda yakin ingin menghapus?')" class="btn btn-danger">
                            <span data-feather="trash"></span> Delete
                          </button>
                      </form>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <div class="text-center">
            <img src="/img/not-found.png" class="img-fluid" height="500" width="430" alt="not-found">
            <div>
              <p class="fs-4 text-muted fw-bold">Haii {{ auth()->user()->name }}</p>
              <span class="fs-5 text-muted">Sepertinya anda belum memiliki postingan</span>
            </div>
          </div>
          @endif
        </div>
      </main>
@endsection