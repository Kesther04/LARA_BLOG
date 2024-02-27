<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Http\Request;

class RepController extends Controller
{
    //

    public function repScreen(Request $request){
        $formData = $request->all();
        $dataR = view('/posts/allrep',compact('formData'))->render();
        
        return $dataR;
        //return response()->json($data);
    }

    public function postReply(Request $request){
        
        $incomingFields = $request->validate([
            'rep' => 'required',
            'cid' => 'required',
        ]);

        $record = Comment::find($incomingFields['cid']);

        $sess = $request->ip();

        $incomingFields['rep'] = strip_tags($incomingFields['rep']);

        $credentials = [
            'com_id' => $incomingFields['cid'],
            'session' => $sess,
            'reply' => $incomingFields['rep'],
        ];

        $reply = Reply::create($credentials);
        if ($reply) {
            $rear = Reply::where('com_id','=',$incomingFields['cid'])->count();
            $record->replies = $rear;
            $updRep = $record->save();
            if ($updRep) {
                $postId = $record->post_id;
                $numm = Post::find($postId);
                $postTitle = $numm->title;
                //return redirect('/posts/allposts/'.$postTitle);
                return response()->json("<p style='color:blue;font-weight:bold;'>You have Replied</p>");
            }
        }

    }
}
