<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        session()->remove('mobile');
        $verified_code = rand(100000, 999999);
        $mobile = $data['mobile'];
        session()->put('mobile', $mobile);
        $url = "https://ippanel.com/services.jspd";
        $rcpt_nm = array("$mobile");
        $param = array(
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
        return User::create([
                'mobile' => $data['mobile'],
                'verified_code' => $verified_code,
                'password' => Hash::make('oXbir@0938')
            ]) . $echoResult;
    }


    /*
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
//        $this->validator($request->all())->validate();
        $existingUser = User::query()->where('mobile', $request->mobile)->first();
        if ($existingUser) {
            alert()->success('دقت کنید' , 'این شماره قبلا در سیستم ثبت شده است.')->showConfirmButton('متوجه شدم');
            return view('auth.register');
        }
        event(new Registered($user = $this->create($request->all())));
        return redirect()->route('confirm');
    }

}
