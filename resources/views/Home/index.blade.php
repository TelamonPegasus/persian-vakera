@extends('Home.master')

@section('content')

    <div class="my-1 text-center">
        <p class="text-paragraph bg-dark d-inline-block fs-5 p-1">
            همکار عزیز <span class="text-danger">
            @auth
                {{ auth()->user()->full_name }}
            @else
                Guest
            @endauth
        </span> به پنل کاربری خود خوش آمدید
        </p>
    </div>

    <div class="square">
        <div class="d-flex align-items-center flex-wrap justify-content-between pb-3 pt-4">
            <a class="ms-5 text-center text-white text-decoration-none d-block" href="{{ route('profile.index') }}">
                <img src="{{ asset('themes/images/export.png') }}" alt="" class="img-fluid">
                <p class="fs-6">تکمیل ثبت نام</p>
            </a>
            <a class="me-5 text-center text-white text-decoration-none d-block" href="{{ route('products.index') }}">
                <img src="{{ asset('themes/images/cart.png') }}" alt="" class="img-cart">
                <p class="fs-6">سبد محصولات</p>
            </a>
        </div>
        <div class="d-flex align-items-center flex-wrap justify-content-between pb-3">
            <a class="ms-5 text-center text-white text-decoration-none d-block" href="#">
                <img src="{{ asset('themes/images/vote.png') }}" alt="" class="img-fluid">
                <p class="fs-6">امتیاز شما: {{ (auth()->user()->status['status'] == 0 or auth()->user()->status['status'] == 1) ? 0 : 50 }}</p>
            </a>
            <a class="me-5 text-center text-white text-decoration-none d-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <img src="{{ asset('themes/images/off.png') }}" alt="" class="img-fluid">
                <p class="fs-6">خروج</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

@endsection