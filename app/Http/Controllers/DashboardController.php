<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\Admin\CarController as CarController;
use Illuminate\Http\Request;
use App\Models\Car;

class DashboardController extends Controller
{
    public function index(){
        $apartments = Apartments::all();
        return view("apartments.dashboard", compact("apartments"));
    }
}
