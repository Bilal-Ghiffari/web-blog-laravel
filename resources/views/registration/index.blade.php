@extends('layouts.main');

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
          <form action="/register" method="POST">
            {{-- untuk mencegah request pemalsuan di lintas situs --}}
            {{-- old() untuk mengisi ulang formulir setelah mendeteksi kesalahan validasi. --}}
            @csrf
            <div class="form-floating">
              <input type="text" name="name" class="form-control rounded-top @error('name')
                  is-invalid
              @enderror" value="{{ old('name') }}" id="name" placeholder="your name">
              <label for="name">Name</label>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="text" class="form-control @error('username')
                  is-invalid
              @enderror" name="username" value="{{ old('username') }}" id="username" placeholder="username">
              <label for="username">Username</label>
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="email" class="form-control @error('email')
                  is-invalid
              @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="name@example.com">
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" class="form-control rounded-bottom" name="password" id="password" placeholder="Password">
              <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
            <small class="d-block text-center mt-3">
                Allready registered? <a href="/login">Login</a>
            </small>
          </form>
        </main>
    </div>
</div>
@endsection
