<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(User $user)
    {

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->profile) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(10),
            function () use ($user) {
                return $user->posts->count();
            }
        );

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(10),
            function () use ($user) {
                return $user->profile->followers->count();
            }
        );

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(10),
            function () use ($user) {
                return $user->following->count();
            }
        );

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);

        $dataProfile = $request->validate([
            'website' => ['sometimes', 'url', 'nullable'],
            'bio' => ['sometimes', 'string', 'nullable'],
            'image' => ['sometimes', 'image', 'max:3000']
        ]);

        $dataUser = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('/profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $dataProfile,
            $imageArray ?? []
            // ['image' => $imagePath ?? $user->profile->image]
        ));

        auth()->user()->update($dataUser);

        return redirect('/profile/' . auth()->user()->username);
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $user = User::where('username', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        if (count($user) > 0)
            return view('profiles.search')->withDetails($user)->withQuery($q);
        return view('profiles.search')->withMessage('No results found.');
    }
}
