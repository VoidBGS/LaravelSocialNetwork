<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Comment;
use App\Meme;
use App\User;

class MemesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function getIndex(){
        $memes = Meme::orderBy('created_at', 'desc')->get(); 

        return view('pages.memesPage', ['memes' => $memes]);
    }
    public function getAddMeme(){
        return view('pages.memesPageAdd');
    }
    public function postAddMeme(){
        $validator = request()->validate([
            'title' => 'required|max:30',
            'description' => 'max:1000',
            'meme' => 'required|image',
        ]);
        $imagePath = request('meme')->store('memes', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(450, null);
        $image->save();
          
        auth()->user()->memes()->create([
            'description' => $validator['description'],
            'title' => $validator['title'],
            'meme' =>$imagePath,
        ]);
        

        return redirect()->action('MemesController@getIndex');
    }
    public function getMemePage($id){
        $meme = Meme::findOrFail($id);
        return view('pages.MemePage', ['meme' => $meme]);
    }
    public function postAddCommentMeme(Request $request){
        $validator = request()->validate([
            'content' => 'required|max:30|min:3',
        ]);
        $user = User::findOrFail($request->user_id);
        $meme = Meme::findOrFail($request->id);
        $meme->comments()->create([
            'content' => $request->input('content'),
            'posted_by' => $user->name,
            'posted_on' => Carbon::Now(),
            'user_id' => $user->id
        ]);
        return redirect()->action('MemesController@getMemePage', ['id' => $meme->id]);
    }
    public function getDeleteMeme($id){
        $meme = Meme::findOrFail($id);

        $this->authorize('delete', $id);
        foreach($meme->comments as $key){
            $key->delete();
        }
        $meme->delete();
        return redirect()->action('MemesController@getIndex');
    } 
}
