<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('profiles.index', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // dd(request()->all());
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255',],
            'website' => ['sometimes', 'nullable', 'url', 'max:255'],
            'bio' => ['sometimes', 'nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'image' => ['sometimes', 'nullable']
        ]);   

        $imagePath = request('image')->store('/profile', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
        $image->save();



        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        $user->profile->update([
            'website' => $request->website,
            'bio' => $request->bio,
            'image' => $imagePath
        ]);
        // $user->name = $request->name;
        // $user->save();
        // dd( auth()->user()->profile()->all() );

        // auth()->user()->profile()->create($data);

        return redirect('/profile/' . $user->username);
    }
}
