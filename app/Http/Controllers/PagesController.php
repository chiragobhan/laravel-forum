<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;

class PagesController extends Controller
{
    public function store(Request $request)
    {
        $user = new User();
        $profileData = $request->all();
        $user = $user->where('username', $profileData['username'])->get();
        $user = $user[0];
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(600, 400)->save(public_path('/uploads/avatars/' . $filename));

            $user->picture = $filename;
        }
        $user->contact = $request->contact;

        $user->save();

        return redirect('complete/' . $profileData['username']);
    }

    public function show($userId)
    {
        $user = new User;
        $posts = $user::find($userId)->post;
        return view('posts')->with('postRows', $posts);
    }

    public function edit($username)
    {
        $user = new User();
        $user = $user->where('username', $username)->get();
        $user = $user[0];
        return view('editProfile')->with('profileData', $user);
    }

    public function update(Request $request)
    {
        $user = new User();
        $profileData = $request->all();
        $user = $user->where('username', $profileData['username'])->get();
        $user = $user[0];

        $user->name = $request->name;

        $user->save();

        return redirect('edit/' . $profileData['username']);
    }

    public function completeProfile($username)
    {
        $user = new User();
        $user = $user->where('username', $username)->get();
        $user = $user[0];
        return view('completeProfile')->with('profileData', $user);
    }
}
