<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForumPost;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ForumController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
      //Ordering by newest post and splitting the information into pages
    public function getIndex(){
       $data = ForumPost::orderBy('last_post_on', 'desc')->paginate(10);
        return view("pages/forum", ["posts" => $data]);
    }

    //Getting selected forum post
    public function getForumPost($post_id){
        $data = Comment::all();
        $topic = ForumPost::findOrFail($post_id);
        $comments = [];
        foreach ($data as $key) {
            if($key->post_id == $post_id)
            {
                array_push($comments, $key);
            }
        }

        return view('pages/forumPost', ['posts' => $comments], ['topic' => $topic] );
    }

    //Returns the page for adding new forum posts
    public function getAddThread(){
        return view('pages/forumThreadForm');
    }

    //Used to create the Forum Thread
    public function postAddThread(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:60',
            'username' => 'required|max:30',
            'content' => 'required|max:1000',
        ]);
        if ($validator->fails()) {
            return redirect()->action('ForumController@getAddThread')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
       $id = new ForumPost();
       $id->content = $request->input('content');
       $id->topic = $request->input('title');
       $id->posted_by = $request->input('username');
       $id->created_at = Carbon::now();
       $id->last_post_on = Carbon::now();
       $id->last_post_by = $request->input('username');
       $id->save();

        return redirect()->action('ForumController@getIndex');
        }
    }
    public function getModifyThread($commentId){
        $id = ForumPost::findOrFail($commentId);
        $action = "ModifyThread";
        $title = "Modify Thread";
        return view('pages/forumPostForm', ['post' => $id, 'action' => $action, 'actionTitle'=> $title]);
    }
    public function postModifyThread(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:30',
            'content' => 'required|max:1000',
        ]);
        if ($validator->fails()) {
            return redirect()->action('ForumController@getModifyThread', [$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
        $id = ForumPost::findOrFail($request->id);
        $id->topic = $request->input('title');
        $id->content = $request->input('content');
        $id->updated_at = Carbon::now();
        $id->save();

        return redirect()->action('ForumController@getForumPost', ['id' => $id->id]);
        }
    }
    public function getDeleteThread($commentId){
        $id = ForumPost::findOrFail($commentId);
        $associatedComments = Comment::all();
        foreach($associatedComments as $key){
            if($key->post_id == $commentId){
                $key->delete();
            }
        }
        $id->delete();
        return redirect()->action('ForumController@getIndex');
    }

}
