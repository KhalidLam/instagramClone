<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
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
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        
        return view('posts.index', compact('posts'));
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
        $image = Image::make(public_path("storage/{$imagePath}"))->widen(600, function ($constraint) { $constraint->upsize(); });
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
}
