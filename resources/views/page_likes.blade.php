<?php
    use Illuminate\Http\Request;
    use App\Models\Like;

    $request = app(Request::class);
    $sess = $request->ip();
    $id = $row['id'];
    $plk = $row['likes'];
    $likes = Like::where('post_id',$row['id'])->where('session',$sess)->get();
    $psess = "";
    $ppid = "";
    foreach ($likes as $val) {
        $psess = $val['session'];
        $ppid = $val['post_id'];
    }
?>
<?php  if ($psess == $sess AND $ppid == $id) { ?>
    <a href="../../../posts/allpop/<?php echo $id; ?>">
        <button id='liked-btn'>
            <img src='../../../images/redhrt.png' >
        </button>
    </a>
<?php  }else { ?>
    <a href="../../../posts/allpop/<?php echo $id; ?>">
        <button id='like-btn'>
            <img src='../../../images/blhrt.png' >
        </button>
    </a>
<?php } ?>