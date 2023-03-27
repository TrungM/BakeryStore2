<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{


    public function adminindex()
    {
        return view("admin.layout.layout");
    }
    public function showdashboard()
    {
        return view("admin.dashboard");
    }








}
