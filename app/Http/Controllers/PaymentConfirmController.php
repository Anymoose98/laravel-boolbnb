<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentConfirmController extends Controller
{
    public function index()
    {
        return view('payment-confirm');
    }
}
