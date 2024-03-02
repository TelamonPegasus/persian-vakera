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
                        <h2 class="text-center text-light mb-5">کد تاییدیه</h2>
                        <form method="POST" action="{{ route('loginByCode') }}">
                            @csrf
                            <input type="hidden" name="mobile" value="{{ session()->get('mobile') }}">
                            <div class="mb-3">
                                <div class="position-relative">
                                    <input id="verified_code" type="text" class="form-control @error('verified_code') is-invalid @enderror" name="verified_code" value="{{ old('verified_code') }}" placeholder="کد تاییدیه" aria-label="verified_code" autofocus>
                                    <span class="position-absolute icon-text">
                                        <i class="fa-solid fa-user fa-1x text-warning"></i>
                                    </span>
                                </div>
                                @error('verified_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-dark w-50">تایید کنید</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center text-light">
                    <p id="status"></p>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')

    @include('sweetalert::alert')
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    <script>
        var sendAgainCodeUrl = '{{ route('sendAgainCode') }}'; // افزودن متغیر جاوااسکریپت
        function countDown(secs, elem) {
            var element = document.getElementById(elem);
            element.innerHTML = "لطفا تا " + secs + " ثانیه منتظر بمانید";
            if (secs < 0) {
                clearTimeout(timer);
                element.innerHTML = "<a href='" + sendAgainCodeUrl + "' class='text-decoration-none text-center'>ارسال مجدد کد</a>";
            }
            secs--;
            var timer = setTimeout(function () {
                countDown(secs, elem);
            }, 1000);
        }
    </script>
    <script>countDown(180 , "status")</script>

@endpush