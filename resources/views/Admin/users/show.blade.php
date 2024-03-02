@extends('Admin.master')

@section('content')

    <div class="container-fluid">
        <div class="card pt-5 pb-5">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <h2>
                        @if($user->image)
                            <img src="{{ asset('storage/'.$user->image) }}" alt="{{ $user->full_name }}" width="50">
                        @else
                            <i class="fa-solid fa-user"></i>
                        @endif
                        <span class="ms-1">{{ $user->full_name }}</span>
                    </h2>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>ردیف</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>نام و نام خانوادگی</th>
                            <td>{{ $user->full_name }}</td>
                        </tr>
                        <tr>
                            <th>شماره موبایل</th>
                            <td>{{ $user->mobile }}</td>
                        </tr>
                        <tr>
                            <th>کد ملی</th>
                            <td>{{ $user->national_code }}</td>
                        </tr>
                        <tr>
                            <th>تاریخ تولد</th>
                            <td>{{ $user->date_birth }}</td>
                        </tr>
                        <tr>
                            <th>استان</th>
                            <td>{{ $user->state->name }}</td>
                        </tr>
                        <tr>
                            <th>شهر</th>
                            <td>{{ $user->city->name }}</td>
                        </tr>
                        <tr>
                            <th>آدرس</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th>کد پستی</th>
                            <td>{{ $user->postal_code }}</td>
                        </tr>
                        <tr>
                            <th>شماره تلفن</th>
                            <td>{{ $user->telephone }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection