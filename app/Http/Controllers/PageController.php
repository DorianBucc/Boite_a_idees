<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages.welcome'); 
    }
}
