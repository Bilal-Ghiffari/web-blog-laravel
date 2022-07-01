@extends('layouts.main');

@section('container')
  <div class="row justify-content-center">
      <div class="col-md-5">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
  
        @if (session()->has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
  
          <main class="form-signin">
              <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
            <form action="/login" method="POST">
              @csrf
              {{-- <div class="input-group">
                <input type="email" class="input @error('email')
                    is-invalid
                @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                <label for="email" class="user-label">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div> --}}
              <div class="group my-5">
                  <input type="email" class="input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                  <span class="highlight"></span> 
                  <span class="bar"></span>
                  <label for="email">Email address</label>
                  @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
              </div>
              {{-- <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
              </div> --}}
              <div class="group">
                <input type="password" class="input" id="password" name="password" required>
                <span class="highlight"></span> 
                  <span class="bar"></span>
                <label for="password">Password</label>
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Sign in</button>
              <small class="d-block text-center mt-3">
                  Not Registered? <a href="/register">Register Now</a>
              </small>
            </form>
          </main>
  </div>
</div>
@endsection
