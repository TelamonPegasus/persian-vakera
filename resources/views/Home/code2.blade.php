@extends('Home.master')

@section('content')

    <div class="my-1 text-center">
        <p class="text-paragraph bg-dark d-inline-block fs-5 p-1">
            ثبت شماره سریال و آپلود عکس نصب
        </p>
    </div>

    <div class="square mb-3">
        <div class="text-center py-5">
            <h5 class="text-white mb-3">شماره سریال را ثبت کنید.</h5>
            <div class="d-flex mx-auto w-75 mb-3">
                <input type="text" class="form-control me-2" id="sn" name="sn">
                <label for="sn" class="form-label fs-4 text-white">SN</label>
            </div>
            <p class="text-white mb-3">عکس نصب جک با شماره سریال فوق را آپلود کنید.</p>
            <input type="file" class="d-none">
            <div class="d-flex mx-auto w-25 mb-3">
                <img src="{{ asset('themes/images/upload.png') }}" alt="" class="img-fluid" id="dialog">
            </div>
            <div class="d-flex mx-auto w-75 ">
                <img src="{{ asset('themes/images/up-key.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="mx-auto w-25 text-center">
        <a class="text-white text-decoration-none d-block" href="{{ route('code6') }}">
            <img src="{{ asset('themes/images/reset.png') }}" alt="" class="img-fluid">
            <div class="fw-bold">بازگشت</div>
        </a>
    </div>

@endsection

@push('script')

    <script>
        var imgBtn = document.querySelector('#dialog');
        var fileInp = document.querySelector('[type="file"]');
        imgBtn.addEventListener('click', function() {
            fileInp.click();
        });
    </script>

@endpush