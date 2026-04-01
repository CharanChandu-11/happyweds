<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\SuccessStory;

class AdminController extends Controller
{
    /**
     * Show the matrimony home page.
     */
    public function index()
    {
        $data = [];

        return view('home', $data);
    }

    
    

}