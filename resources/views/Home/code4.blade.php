@extends('Home.master')

@section('content')

    <div class="my-1 text-center">
        <p class="text-paragraph bg-dark d-inline-block fs-5 p-1">
            دسته بندی محصولات
        </p>
    </div>

    <div class="square">
        <div class="d-flex align-items-center flex-wrap justify-content-between pb-3 pt-4">
            <a class="ms-5 text-center text-white text-decoration-none d-block" href="{{ route('profile.index') }}">
                <img src="{{ asset('themes/images/jack.png') }}" alt="" class="img-fluid">
                <p class="fs-6">جک مدل لیوا</p>
            </a>
            <a class="me-5 text-center text-white text-decoration-none d-block" href="{{ route('products.index') }}">
                <img src="{{ asset('themes/images/reset.png') }}" alt="" class="img-fluid">
                <p class="fs-6">بازگشت</p>
            </a>
        </div>
    </div>

@endsection