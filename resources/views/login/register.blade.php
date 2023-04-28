@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-6">

        <main class="form-regist w-100 m-auto mt-5">

            @if (session('notif'))
                {!! session('notif') !!}
            @endif

            <h1 class="h3 mb-3 fw-normal text-center">Registration Form!</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="text" required="" value="{{ old('name') }}" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Enter Full Name">
                    <label for="name">Full Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" required="" value="{{ old('uname') }}" name="uname" class="form-control @error('uname') is-invalid @enderror" id="uname" placeholder="Enter Username">
                    <label for="uname">Username</label>
                    @error('uname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" required="" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email Address">
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" required=""  name="pwd" class="form-control @error('pwd') is-invalid @enderror rounded-bottom " id="password" placeholder="Enter Password">
                    <label for="password">Password</label>
                    @error('pwd')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
            </form>
            <small class="d-block text-center mt-2">Have Account? <a href="/login">Sign In!</a></small>
            <small class="d-block text-center mt-1 text-muted">Copyright &copy; {{ date('Y') }}</small>
        </main>
    </div>
</div>

@endsection