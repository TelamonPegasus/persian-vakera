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
                        <h2 class="text-center text-light mb-5">بازنشانی رمز عبور</h2>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <div class="position-relative">
                                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" placeholder="شماره موبایل" aria-label="mobile" autofocus>
                                    <span class="position-absolute icon-text">
                                        <i class="fa-solid fa-user fa-1x text-warning"></i>
                                    </span>
                                </div>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-dark w-50">بازنشانی</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
