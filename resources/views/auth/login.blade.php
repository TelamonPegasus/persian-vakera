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
                        <h2 class="text-center text-light mb-5">ورود</h2>
                        <form method="POST" action="{{ route('login') }}">
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

                            <div class="mb-3">
                                <div class="position-relative">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" aria-label="password" placeholder="رمز عبور">
                                    <span class="position-absolute icon-text">
                                        <i class="fa-solid fa-lock fa-1x text-warning"></i>
                                    </span>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-primary" for="remember">مرا به خاطر بسپار</label>
                                </div>
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-dark w-50">ورود</button>
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{ route('register') }}" class="btn btn-dark w-50">ثبت نام</a>
                            </div>

                            <div class="mb-3 d-flex justify-content-center text-center">
                                <a href="{{ route('password.request') }}" class="text-decoration-none w-75">رمز عبور خود را فراموش کرده اید؟</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center text-light">
                    <p>اکانت ندارید از <a href="{{ route('register') }}" class="text-success text-decoration-none">اینجا</a> ثبت نام کنید.</p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

    @include('sweetalert::alert')
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

@endpush
