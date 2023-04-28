@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-signin w-100 m-auto mt-5">
            @if (session('notif'))
                {!! session('notif') !!}
            @endif
            <h1 class="h3 mb-3 fw-normal text-center">Please Sign In</h1>
            <form method="POST" action="/login">
                @csrf
                <div class="form-floating">
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        value="{{ old('email') }}" 
                        placeholder="Enter your Email" 
                        required 
                        autofocus>
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="pwd" @error('pwd') is-invalid @enderror class="form-control" id="password" placeholder="Enter your Password">
                    <label for="password">Password</label>
                    @error('pwd')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
            <small class="d-block text-center mt-2">Don't Have Account? <a href="/register">Register!</a></small>
            <small class="d-block text-center mt-1 text-muted">Copyright &copy; {{ date('Y') }}</small>
        </main>
    </div>
</div>

@endsection