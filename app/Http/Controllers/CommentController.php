<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function postComment(Request $request){
        $sess = $request->ip();
        $incomingFields = $request->validate([
            'com' => 'required',
            'name' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'pid' => 'required',
        ]);

        $incomingFields['com'] = strip_tags($incomingFields['com']);
        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['email'] = strip_tags($incomingFields['email']);

        $credentials = [
            'post_id' => $incomingFields['pid'],
            'name' => $incomingFields['name'],
            'email' => $incomingFields['email'],
            'session' => $sess,
            'comment' => $incomingFields['com'],
            'replies' => 0,
        ];

        $commentAll = Comment::create($credentials);
        if ($commentAll) {
            $comm = Comment::where('post_id','=',$incomingFields['pid'])->count();
            $record = Post::find($incomingFields['pid']);
            $postTitle = $record->title;
            $record->comments = $comm;
            $updComm = $record->save();
            if ($updComm) {
                //return redirect('/posts/allposts/'.$postTitle);
                return response()->json("<p style='color:blue;font-weight:bold;'>Comment Uploaded</p>");
            }
        }
    }
}
