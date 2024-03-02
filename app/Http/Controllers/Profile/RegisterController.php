<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $states = State::all();
        return view('Profile.index', compact('states'));
    }

    public function save(User $user, Request $request)
    {
        alert()->success('دقت کنید' , 'ثبت نام انجام شد، در صورت تایید پیامک فعالسازی پنل شما ارسال خواهد شد.')->showConfirmButton('متوجه شدم');
        $url = "https://ippanel.com/services.jspd";
        $rcpt_nm = array("$user->mobile");
        $param = array(
            'uname' => '09123772371',
            'pass' => 'Vakera@1354',
            'from' => '5000125475',
            'message' => "ثبت نام انجام شد، در صورت تایید پیامک فعالسازی پنل شما ارسال خواهد شد.",
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
        $echoResult = $res_data;
        $echoResult .= $res_code;
        $data = $request->all();
        $data['status'] = 1;
        $user->update($data);
        return back().$echoResult;
    }
}
