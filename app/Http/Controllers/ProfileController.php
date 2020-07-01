<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function getIndex($id){
        $user = User::findOrFail($id);

        return view('pages/profile', ['user' => $user]);
    }
    public function getModifyProfile($id){
        $user = User::findOrFail($id);

        return view('pages/profileEdit',['user' => $user]);
    }
    public function postModifyProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'avatar' => 'image',
            'username' => 'required|max:25',
            'content' => 'required|max:1000',
        ]);
        if ($validator->fails()) {
            return redirect()->action('ProfileController@getModifyProfile', ['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
        $user = User::findOrFail($request->id);
        $user->name = $request->input('username');
        $user->profile->description = $request->input('content');
        if(request('avatar') != null){
            $imagePath = request('avatar')->store('avatars', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(250, 200);
            $image->save();
            $user->profile->avatar = $imagePath;
        }
        $user->profile->save();
        $user->save();

        return redirect()->action('ProfileController@getIndex', ['id' => $user->id]);
        }
    }
}
