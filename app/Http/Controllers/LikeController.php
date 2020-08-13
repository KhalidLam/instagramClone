<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $id = 1;
        dd('test');
        $user = 3;
        $like = Like::where('user_id', $user)->where('post_id', $id)->get();
        dd($like);
    }
    public function update2($id)
    {
        // $id = 1;
        // dd(Auth::User());
        $user = Auth::User();

        $like = Like::where('user_id', $user->id)->where('post_id', $id)->first();

        if ($like) {
            $like->State = !$like->State;
            $like->save();
            // dd($like);
            // dd($like);
            // dd($like);
        } else {
            $like = Like::create([
                "user_id" => $user->id,
                "post_id" => $id,
                "State" => true

            ]);
            // dd($like);

            // dd('Not found');
        }
        return Redirect::to('/');

        // dd($like);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
