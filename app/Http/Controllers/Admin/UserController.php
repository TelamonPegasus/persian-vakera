<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query();
        if ($keyword = request('search')) {
            $users->where('first_name','LIKE',"%{$keyword}%")
                ->orWhere('last_name','LIKE',"%{$keyword}%");
        }
        $users = $users->orderBy('updated_at', 'DESC')->paginate(20);
        return view('Admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('Admin.users.show', compact('user'));
    }

    public function approved(User $user)
    {
        $data = [
            'status' => 2
        ];
        $url = "https://ippanel.com/services.jspd";
        $rcpt_nm = array("$user->mobile");
        $param = array(
            'uname' => '09123772371',
            'pass' => 'Vakera@1354',
            'from' => '5000125475',
            'message' => "تو تایید شده هستی.",
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
        $user->update($data);
        return back();
    }

    public function upApproved(User $user)
    {
        $data = [
            'status' => 3
        ];
        $user->update($data);
        return back();
    }
}
