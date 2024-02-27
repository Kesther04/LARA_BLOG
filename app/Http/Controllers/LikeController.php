<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function likePost(Request $request,$id){
        $record = Post::find($id);
        $postTitle = $record->title;
        $sess = $request->ip();
    
        $liked = Like::where('session',$sess)->where('post_id',$id)->get();
        $psess = "";
        $ppid = "";
        $lid = "";
        foreach ($liked as $val) {
            $psess = $val['session'];
            $ppid = $val['post_id'];
            $lid = $val['id'];
        }
    
        if ($psess == $sess AND $ppid == $id) {
            $llid = Like::find($lid);
            $lll = $llid->delete();
            if ($lll) {   
                $lal = Like::where('post_id','=',$id)->count();
                $record->likes = $lal;
                $updLike = $record->save();
                if ($updLike) {
                    return redirect('/posts/allposts/'.$postTitle);
                }
            }
        }else {
            $credentials = ['post_id' => $id,'session' => $sess,];
            $likesas = Like::create($credentials);
            if ($likesas) {
                $lal = Like::where('post_id','=',$id)->count();
                $record->likes = $lal;
                $updLike = $record->save();
                if ($updLike) {
                    return redirect('/posts/allposts/'.$postTitle);
                }
            }
        }
    }
}
