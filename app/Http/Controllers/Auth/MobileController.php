<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MobileController extends Controller
{
    public function confirm()
    {
        return view('auth.confirm');
    }

    public function loginByCode(Request $request)
    {
        $user = User::query()
            ->where('verified_code', $request->post('verified_code'))
            ->where('mobile', $request->post('mobile'))
            ->first();
        if ($user) {
            $user->update(['active' => 1]);
            return redirect()->route('password');
        } else {
            alert()->warning('هشدار', 'کد تاییدیه را اشتباه وارد کردید.')->showConfirmButton('بسیار خوب');
            return view('auth.confirm');
        }
    }

    public function password()
    {
        return view('auth.password');
    }

    public function save(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::query()->where('mobile', $request->post('mobile'))->first();
        if ($user) {
            if ($user->active == 1) {
                $user->update(['password' => Hash::make($request->post('password'))]);
                auth()->login($user);
                alert()->success('اطلاعات خود را تکمیل کنید.', 'دقت کنید')->showConfirmButton('بسیار خوب');
                return redirect()->route('profile.index');
            } else {
                return redirect()->route('confirm');
            }
        }
        return back();
    }

    public function sendAgainCode()
    {
        $verified_code = rand(100000, 999999);
        $mobile = Session::get('mobile');
        $user = User::query()->where('mobile', $mobile)->first();
        if ($user)
        {
            $user->verified_code = $verified_code;
            $user->save();
            $url = "https://ippanel.com/services.jspd";
            $rcpt_nm = array("$mobile");
            $param = array(

                'message' => "باشگاه مشتریان واکرا کد تایید شما: $verified_code",
                'to' => json_encode($rcpt_nm),
                'op' => 'send',
            );
            $client = new Client();
            $response = $client->post($url, [
                'form_params' => $param,
            ]);
            $response2 = json_decode($response->getBody(), true);
            $res_code = $response2[0];
            $res_data = $response2[1];
            echo $res_data;
            echo $res_code;
            return back();
        }
    }
}
