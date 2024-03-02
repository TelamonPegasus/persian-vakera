<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('themes/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png"/>
    <title>{{ config('app.name') }}</title>
</head>
<body class="bg">
<div class="container pt-5">
    <div class="card">
        <div class="card-body">
            <p class="alert alert-info text-center">پس از تکمیل و تایید اطلاعات، 50 امتیاز به حساب امتیازات شما واریز و همچنین اجازه ثبت محصولات و دریافت امتیازات دیگر نیز خواهید داشت. </p>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>وضعیت:</label>
                    @php $status = auth()->user()->status @endphp
                    <span class="{{ $status['bs_class'] }}">
                        {{ $status['label'] }}
                    </span>
                </div>
                <div class="col-md-6">
                    <label>تاریخ ثبت: </label><span class="text-model">{{ jdate(auth()->user()->created_at)->format('%d %B %Y') }}</span>
                </div>
            </div>
            <form action="{{ route('profile.save', auth()->id()) }}" method="post">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="mb-3 mt-sm-2">
                            <h5 class="alert alert-success">مشخصات فردی</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="first_name">نام: </label>
                                @if(auth()->user()->status['status'] == 0)
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                @else
                                    <div>{{ auth()->user()->first_name }}</div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="last_name">نام خانوادگی: </label>
                                @if(auth()->user()->status['status'] == 0)
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                @else
                                    <div>{{ auth()->user()->last_name }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="mobile">موبایل: </label>
                                <div>{{ auth()->user()->mobile }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="national_code">کد ملی: </label>
                                @if(auth()->user()->status['status'] == 0)
                                    <input type="text" class="form-control" id="national_code" name="national_code">
                                @else
                                    <div>{{ auth()->user()->national_code }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3 datePickerApp">
                                <label class="form-label" for="date_birth">تاریخ تولد: </label>
                                @if(auth()->user()->status['status'] == 0)
                                    <date-picker type="date" class="form-control" id="date_birth" name="date_birth"></date-picker>
                                @else
                                    <div>{{ auth()->user()->date_birth }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-sm-2">
                            <h5 class="alert alert-success">محل سکونت</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="state_id">استان: </label>
                                @if(auth()->user()->status['status'] == 0)
                                    <select class="form-select" id="state_id" name="state_id">
                                        <option value=""></option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <div>{{ auth()->user()->state_id }}</div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="city_id">شهر: </label>
                                @if(auth()->user()->status['status'] == 0)
                                    <select class="form-select" id="city_id" name="city_id">

                                    </select>
                                @else
                                    <div>{{ auth()->user()->city_id }}</div>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="postal_code">کد پستی: </label>
                                @if(auth()->user()->status['status'] == 0)
                                    <input type="text" class="form-control" id="postal_code" name="postal_code">
                                @else
                                    <div>{{ auth()->user()->postal_code }}</div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="telephone">تلفن: </label>
                                @if(auth()->user()->status['status'] == 0)
                                    <input type="text" class="form-control" id="telephone" name="telephone">
                                @else
                                    <div>{{ auth()->user()->telephone }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="address">آدرس: </label>
                                @if(auth()->user()->status['status'] == 0)
                                    <textarea class="form-control" id="address" name="address"></textarea>
                                @else
                                    <div>{{ auth()->user()->address }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    @if(auth()->user()->status['status'] == 0)
                        <button type="submit" class="btn btn-primary btn-lg">ذخیره</button>
                    @else
                        <a href="{{ route('home') }}" class="btn btn-lg btn-warning">برگشت</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var stateSelect = document.getElementById('state_id');
        var citySelect = document.getElementById('city_id');
        stateSelect.addEventListener('change', function() {
            var stateId = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '{{ route('findIDState') }}?id=' + stateId, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    citySelect.innerHTML = '';
                    for (var i = 0; i < data.length; i++) {
                        var option = document.createElement('option');
                        option.value = data[i].id;
                        option.textContent = data[i].name;
                        if (data[i].id === <?php echo json_encode(auth()->user()->city_id); ?>) {
                            option.selected = true;
                        }
                        citySelect.appendChild(option);
                    }
                } else {
                    console.log('Error: ' + xhr.status);
                }
            };
            xhr.onerror = function() {
                console.log('Request failed');
            };
            xhr.send();
        });
        stateSelect.dispatchEvent(new Event('change'));
    });
</script>


<script src="{{ asset('themes/vue/vue.min.js') }}"></script>
<script src="{{ asset('themes/vue/moment.min.js') }}"></script>
<script src="{{ asset('themes/vue/moment-jalaali.js') }}"></script>
<script src="{{ asset('themes/vue/vue-persian-datetime-picker-browser.js') }}"></script>
<script>
	const vues = document.querySelectorAll(".datePickerApp");
	const each = Array.prototype.forEach;
	const data = () => {
		return {
			date: ""
		}
	};
	const components = {
		DatePicker: VuePersianDatetimePicker
	}
	each.call(vues, (el, index) => new Vue({el, data, components}))
</script>
@include('sweetalert::alert')
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
</body>
</html>