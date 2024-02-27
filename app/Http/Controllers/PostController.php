<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //to Upload Posts
    public function post(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => ['required','image','mimes:jpeg,png,jpg,webp','max:10000'],
            'cat' => 'required',
            'type' => 'required',
            'post' => 'required',
        ]);

        $title = str_replace(' ','++',$incomingFields['title']);

        //Handle Image Upload
        $image = $incomingFields['image'];
        $originalFilename = $image->getClientOriginalName();
        if ( move_uploaded_file($image, "pictures/".$originalFilename)) {

            $credentials = [
                'title' => $title,
                'description' => $incomingFields['desc'],
                'image' => $originalFilename,
                'cat' => $incomingFields['cat'],
                'type' => $incomingFields['type'],
                'post' => $incomingFields['post'],
                'views' => 0,
                'likes' => 0,
                'comments' => 0,
            ];

            $post = Post::create($credentials);
            if ($post) {
                return redirect('/dashboard/news_upload?msg=Post Successful');
            }
            return redirect('/dashboard/news_upload?msg=Post Unsuccessful');
        }else{
            return redirect('/dashboard/news_upload?msg=Image Not Inputed');
        }
    }

    //to Display Post Screen
    public function postScreen($title){
        return view('/posts/allposts')->with('title',$title);
    }
    
}
