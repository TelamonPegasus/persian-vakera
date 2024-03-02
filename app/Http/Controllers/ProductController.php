<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if (auth()->user()->status['status'] == 2) {
            return view('Home.code5');
        } else {
            alert()->warning('دقت کنید', 'تا تایید عضویت شما دسترسی به این بخش امکان پذیر نمی باشد.')->showConfirmButton('بسیار خوب');
            return view('Home.index');
        }
    }
}
