<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Home.index');
    }

    public function findIDState(Request $request)
    {
        $data = City::query()->where('state_id', $request->id)->get();
        return $data;
    }

    public function xxx()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api2.ippanel.com/api/v1/sms/pattern/normal/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "code": "Vakera@1354",
              "sender": "09123772371",
              "recipient": "09389267856",
              "variable": {
                "name": "سلام،‌به IPPanel خوش آمدی",
              }
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        echo $response;
        curl_close($curl);
    }
}
