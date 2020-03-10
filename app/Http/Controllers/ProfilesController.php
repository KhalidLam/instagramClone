<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', [
            'user' => $user
        ]);
    }

    // public function show(User $user)
    // {   
    //     $user = User::findOrFail($user);
    //     return view('profiles.index', [
    //         'user' => $user
    //     ]);
    // }
}
