<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Auth\Passwords\CanResetPassword;

use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    | this is my code ok
    */

    use SendsPasswordResetEmails;

    /**
     * Get the needed authentication credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('mobile');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['mobile' => 'required|numeric']);

        $user = User::query()->where('mobile', $request->mobile)->first();

        if (!$user) {
            alert('دقت کنید', 'این شماره موبایل در سیستم ثبت نشده است.');
        }
//      $mobile = $user['mobile'];
//      DB::raw('')
//      $token = Password::broker()->createToken($user);//this function
       
        $token = $user->createToken();
        $user->notify(new ResetPasswordNotification($token));

        return back()->with('status', trans('passwords.sent'));
    }
}
