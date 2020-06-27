<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // Array of users that the auth user follows
        // $following = auth()->user()->following->all();
        $users = auth()->user()->following()->pluck('profiles.user_id');

        // Get Users Id form $following array
        // foreach ($following as $profile) {
        //     $users[] = User::find($profile->user_id);
        // }
        // $posts = Post::whereIn('user_id', $users)->latest()->get();

        $sugg_users = User::all()->reject(function ($user) {
            $users = auth()->user()->following()->pluck('profiles.user_id')->toArray();
            return $user->id == Auth::id() || in_array($user->id, $users);
        });

        // $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(10)->getCollection()->shuffle();

        return view('posts.index', compact('posts', 'sugg_users'));
    }

    public function explore()
    {
        // $posts = Post::all()->except(Auth::id());
        $posts = Post::all()->except(Auth::id())->shuffle();;

        return view('posts.explore', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $data = request()->validate([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('/uploads', 'public');

        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(820, 740);
        // $image = Image::make(public_path("storage/{$imagePath}"))->resize(300, 300);
        // $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200, null);
        $image = Image::make(public_path("storage/{$imagePath}"))->widen(600, function ($constraint) {
            $constraint->upsize();
        });
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . auth()->user()->username);
        // return redirect()->route('profile.index', ['user' => auth()->user()]);

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function updatelikes(Request $request, $post)
    {
        // TODO Later
        $post = Post::where('id', $post)->first();
        if (!$post) {
            App::abort(404);
        }

        if ($request->update == "1") {
            // add 1 like
            $post->likes = $post->likes + 1;
            $post->save();
        } else if ($request->update == "0" && $post->likes != 0) {
            // take 1 like
            $post->likes = $post->likes - 1;
            $post->save();
        }

        // dd($request->update, $post, $post->likes, $post->id);
        // $post->likes = $post->likes + 1;
        // $post->save();

        return Redirect::to('/');
    }
}
