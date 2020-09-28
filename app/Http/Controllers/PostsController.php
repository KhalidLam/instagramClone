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
        $users_id = auth()->user()->following()->pluck('profiles.user_id');

        // Get Users Id form $following array
        $sugg_users = User::all()->reject(function ($user) {
            $users_id = auth()->user()->following()->pluck('profiles.user_id')->toArray();
            return $user->id == Auth::id() || in_array($user->id, $users_id);
        });

        // Add Auth user id to users id array
        $users_id = $users_id->push(auth()->user()->id);

        // $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        $posts = Post::whereIn('user_id', $users_id)->with('user')->latest()->paginate(10)->getCollection();

        // dd($posts);

        return view('posts.index', compact('posts', 'sugg_users'));
    }

    public function explore()
    {
        $posts = Post::all()->except(Auth::id())->shuffle();

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

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return Redirect::back();
    }

    public function show(Post $post)
    {
        $posts = $post->user->posts->except($post->id);
        return view('posts.show', compact('post', 'posts'));
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


        return Redirect::to('/');
    }

    // methods for vue api requests
    public function vue_index()
    {
        $data = Post::orderBy('id')->with('user')->latest()->paginate(5);
        return response()->json($data);
    }
}
