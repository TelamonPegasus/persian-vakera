@extends('Admin.master')

@section('content')

    <div class="container-fluid">
        <div class="card pt-5 pb-5">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <h2>
                        <i class="fa-solid fa-users"></i>
                        <span class="ms-1">کاربران</span>
                    </h2>
                    <form action="">
                        <div class="input-group">
                            <input class="form-control" name="search" value="{{ request()->search }}" type="search" placeholder="جستجو" aria-label="search">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa-solid fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام و نام خانوادگی</th>
                            <th>شماره تماس</th>
                            <th>تاریخ ایجاد</th>
                            <th>امتیاز</th>
                            <th>جزییات</th>
                            <th>وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ jdate($user->created_at)->format('%d %B %Y') }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('admin.users.approved', $user->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success">تایید</button>
                                    </form>
                                    <form action="{{ route('admin.users.upApproved', $user->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger">عدم تایید</button>
                                    </form>
                                </td>
                                <td><a href="{{ route('admin.users.show',$user->id) }}" class="text-decoration-none text-primary">جزییات</a></td>
                                <td>
                                    @php $status = $user->status @endphp
                                    <span class="{{ $status['bs_class'] }}">
                                        {{ $status['label'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection
