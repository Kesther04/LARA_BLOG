<?php  

    use App\Models\Post;
    use App\Models\View;
    use Illuminate\Http\Request;

    $request = app(Request::class);
    $id = $row['id'];

    $record = Post::find($id);
    $postTitle = $record->title;
    $sess = $request->ip();

    $viewed = View::where('session',$sess)->where('post_id',$id)->get();
    $psess = "";
    $ppid = "";
    foreach ($viewed as $val) {
        $psess = $val['session'];
        $ppid = $val['post_id'];
    }

    if ($psess == $sess AND $ppid == $id) {
        redirect('/posts/allposts/'.$postTitle);
    }else {
        $credentials = ['post_id' => $id,'session' => $sess,];
        $viewsas = View::create($credentials);
        if ($viewsas) {
            $vav = View::where('post_id','=',$id)->count();
            $record->views = $vav;
            $updView = $record->save();
            if ($updView) {
                redirect('/posts/allposts/'.$postTitle);
            }
        }
    }
?>