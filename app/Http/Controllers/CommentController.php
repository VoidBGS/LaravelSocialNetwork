<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use App\ForumPost;
use App\Comment;
use Carbon\Carbon;


class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
             //Returns the page for adding new forum comments
             public function getAddComment($post_id){
                $object = ForumPost::findOrFail($post_id);
                $action = "Post";
                $title = "Add a new comment";
        
                return view('pages/forumPostForm', ['post' => $object, 'action' => $action, 'actionTitle'=> $title]);
            }
        
                 // Adding Comments and Updating the last post date and user
            public function postAddComment(Request $request){
                $validator = Validator::make($request->all(), [
                    'username' => 'required|max:30',
                    'content' => 'required|max:1000',
                ]);
                if ($validator->fails()) {
                    return redirect()->action('CommentController@getAddComment', [$request->id])
                                ->withErrors($validator)
                                ->withInput();
                }
                else{
                $object = new Comment();
                $object->post_id = $request->id;
                $object->content = $request->input('content');
                $object->posted_by = $request->input('username');
                $object->posted_on = Carbon::now();
                $object->save(); 
                
                $forumObject = ForumPost::findOrFail($request->id);
                $forumObject->last_post_on = Carbon::now();
                $forumObject->last_post_by = $request->input('username');
                $forumObject->save();
        
                return redirect()->action('ForumController@getForumPost', ['id' => $request->id]);
                }
            }
            public function getModifyComment($commentId){
                 $object = Comment::findOrFail($commentId);
                 $action = "Modify";
                 $title = "Modify Comment";
        
                 return view('pages/forumPostForm', ['post' => $object, 'action' => $action, 'actionTitle'=> $title]);
            }
            public function postModifyComment(Request $request){
                $validator = Validator::make($request->all(), [
                    'content' => 'required|max:1000',
                ]);
                if ($validator->fails()) {
                    return redirect()->action('CommentController@getModifyComment', [$request->id])
                                ->withErrors($validator)
                                ->withInput();
                }
                else{
                $object = Comment::findOrFail($request->id);
                $object->content = $request->input('content');
                $object->updated_at = Carbon::now();
                $object->save();
        
                return redirect()->action('ForumController@getForumPost', ['id' => $object->post_id]);
                }
           }
            public function getDeleteComment($commentId){
                $object = Comment::findOrFail($commentId);
                $object->delete();
        
                return redirect()->action('ForumController@getForumPost', ['id' => $object->post_id]);
            }
}
