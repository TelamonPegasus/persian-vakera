@extends('Home.master')

@section('content')

    <div class="my-1 text-center">
        <p class="text-paragraph bg-dark d-inline-block fs-5 p-1">
            دسته بندی محصولات
        </p>
    </div>

    <div class="square">
        <div class="d-flex align-items-center flex-wrap justify-content-between pb-3 pt-4">
            <a class="ms-5 text-center text-white text-decoration-none d-block" href="{{ route('code1') }}">
                <img src="{{ asset('themes/images/leato.png') }}" alt="" class="img-fluid">
                <p class="fs-6">جک مدل لیتو</p>
            </a>
            <a class="me-5 text-center text-white text-decoration-none d-block" href="{{ route('code2') }}">
                <img src="{{ asset('themes/images/lera.png') }}" alt="" class="img-fluid">
                <p class="fs-6">جک مدل لرا</p>
            </a>
        </div>
        <div class="d-flex align-items-center flex-wrap justify-content-between pb-3">
            <a class="ms-5 text-center text-white text-decoration-none d-block" href="{{ route('code3') }}">
                <img src="{{ asset('themes/images/laveaan.png') }}" alt="" class="img-fluid">
                <p class="fs-6">جک مدل لاوین</p>
            </a>
            <a class="me-5 text-center text-white text-decoration-none d-block" href="{{ route('products.index') }}">
                <img src="{{ asset('themes/images/reset.png') }}" alt="" class="img-fluid">
                <p class="fs-6">بازگشت</p>
            </a>
        </div>
    </div>

@endsection
