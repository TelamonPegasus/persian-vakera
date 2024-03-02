@extends('Home.master')

@section('content')

    <div class="my-1 text-center">
        <p class="text-paragraph bg-dark d-inline-block fs-5 p-1">
            دسته بندی محصولات
        </p>
    </div>

    <div class="square">
        <div class="d-flex align-items-center flex-wrap justify-content-between pb-3 pt-4">
            <a class="ms-5 text-center text-white text-decoration-none d-block" href="{{ route('code6') }}">
                <img src="{{ asset('themes/images/swing.png') }}" alt="" class="img-fluid">
                <p class="fs-6">جک بازویی</p>
            </a>
            <a class="me-5 text-center text-white text-decoration-none d-block" href="{{ route('code4') }}">
                <img src="{{ asset('themes/images/swing.png') }}" alt="" class="img-fluid">
                <p class="fs-6">جک ریلی</p>
            </a>
        </div>
        <div class="d-flex align-items-center flex-wrap justify-content-between pb-3">
            <a class="ms-5 text-center text-white text-decoration-none d-block" href="{{ route('code6') }}">
                <img src="{{ asset('themes/images/product.png') }}" alt="" class="img-fluid">
                <p class="fs-6">سایر محصولات</p>
            </a>
            <a class="me-5 text-center text-white text-decoration-none d-block" href="{{ route('home') }}">
                <img src="{{ asset('themes/images/reset.png') }}" alt="" class="img-fluid">
                <p class="fs-6">بازگشت</p>
            </a>
        </div>
    </div>

@endsection