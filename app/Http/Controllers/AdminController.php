<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAuthUser()
    {
        return Auth::user();
    }
}
