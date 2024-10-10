<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class DashboardController extends Controller
{
    public function index()
    {
        $user = UserResource::collection(auth()->user());

        return view('dashboard', compact('user'));
    }
}
