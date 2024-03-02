@extends('auth.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-4">
                <div class="card bg-transparent border-0">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ asset('logo.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="card bg-success bg-opacity-25 mb-3 rounded-5">
                    <div class="card-body">
                        <h2 class="text-center text-light mb-5">رمز عبور</h2>
                        <form method="POST" action="{{ route('save') }}">
                            @csrf
                            <input type="hidden" name="mobile" value="{{ session()->get('mobile') }}">
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="password" autofocus aria-label="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="password-confirm" autofocus aria-label="password-confirm">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-dark w-50">ورود</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

