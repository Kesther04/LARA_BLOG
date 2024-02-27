<?php
    use App\Models\Comment;
    use App\Models\Post;
    use Illuminate\Support\Facades\DB;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../../../css/css_home.css' media='all'>
    <link rel='stylesheet' href='../../../css/resp_ind.css' media='all'>      
    <script src='../../../js/jquery.js'></script>
    <script src='../../../js/metro.js'></script>
    <script src='../../../js/header_move.js'></script>
    <script src='../../../js/ajax.js'></script>
    <title><?php echo str_replace('++',' ',basename($_SERVER['PHP_SELF'])); ?></title>
</head>
<body id="com-fil">
    <?php
        $title = basename($_SERVER['PHP_SELF']);
        $posts = Post::where('title',basename($_SERVER['PHP_SELF']))->get();
        $type = "";
        $rpo = Post::inRandomOrder()->take(3)->get();    
        
    ?>
    <?php require('navigation_units/post_header.php');  ?>
    <section id='com-fil'>
    <section class='first-sec-div'>
        @foreach($posts as $row)
            <div class='inner-fdivs'>
                <h1> {{str_replace('++',' ',$row['title'])}}</h1>
                <p>
                    <?php
                        $exx = explode(' ',$row['created_at']);
                        echo $exx[0].' | '.$exx[1];
                    ?>
                </p>
            </div>

            <div class='inner-fdivs'>
                <p>{{$row['description']}}</p>
                <div id='inner-fdivs-img'><img src='../../../pictures/{{$row->image}}' ></div>
            </div>
            <?php
                $type = $row['type'];
            ?>

            <div class='inner-fdivs'><?php echo $row['post']; ?></div>

            <div class='perc-div' id="aldbtn">

                <div>
                    <div id='dis-view'>{{$row['views']}}</div>
                    @include('page_view')
                    <button>Views</button>
                </div>
                <div>
                    <div id='dis-like'>{{$row['likes']}}</div>
                    @include('page_likes')                            
                </div>
                <div>
                    <div id='dis-com'>{{$row['comments']}}</div>
                    <button id='com-btn'>Comments</button>
                </div>

            </div>  

            <div class='com-fil'>
                <div id='masag'>
                    <div class='msg'>    
                        <div class='msa'></div>
                        <button class='aj-btn'>OKAY</button>
                    </div>
                </div>

                <form class="comfm" action='../../../posts/allposts/backend_comm' method='post'>
                    @csrf
                    <h1>Add Comment</h1>
                    <table>
                        <tr> 
                            <td>
                                <textarea name='com' required id='com-txt' placeholder='Type in your comment'></textarea>
                                <input type='hidden' name='pid' value='{{$row->id}}' required readonly>
                            </td>
                            <td><input type="text" name="name" required placeholder="Enter Your Name"></td>
                            <td><input type="email" name="email" required placeholder="Enter Your Email Address"></td>
                            <td><button>ENTER</button></td>
                        </tr>
                        
                    </table>
                    
                </form>

                <div class='comment-div'>
                    <video src="../../images/rrrty.mp4"  controls type="video/mp4"></video>
                    <?php
                        $comPt = Comment::where('post_id',$row['id'])->latest()->get();
                    ?>
                    @foreach($comPt as $ptCom)
                    <div class='per-com'>
                                
                        <span class="rep-nm">{{$ptCom['name']}}</span>
                        <div class="com-per-div">{{$ptCom['comment']}}</div>

                        <div class='lp-btn'>
                            <div id="rcom">{{$ptCom['replies']}}</div>
                            <form action="../../../posts/allrep" class="ajx-link" method="post">
                                @csrf
                                <input type="hidden" name="cid" value="{{$ptCom['id']}}" required readonly>
                                <button class='rply-bt'>Reply</button>
                            </form>
                        </div> 
                                            
                        <div id='masag-con'>
                            <div class='msg-con'>
                                <button class='aj-btn'>Back</button>
                                <div class='msa'></div>
                            </div>
                        </div>
                                        
                    </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>

    <section class='ano-sec-div'>
        <div class="first-sec-trend">
            <h1>TRENDING NEWS</h1>

            @foreach($rpo as $row)
                <div class="fst-div">
                    <a href= "../../../posts/allposts/{{$row['title']}}" target="-blank">
                        <img src="../../pictures/{{$row['image']}}">
                    </a>
                    <span id="news-t">{{$row['type']}}</span>
                        
                    <h2> 
                        {{str_replace('++',' ',$row['title'])}}
                    </h2>
                        
                    <p>{{$row['description']}}</p>
                
                    <div class="news-da">
                        <a href= "../../../posts/allposts/{{$row['title']}}" target="-blank"> 
                            ...Read More
                        </a>
                    </div>

                    <div class="news-da">
                        <?php
                            $exx = explode(' ',$row['created_at']);
                            echo $exx[0];
                        ?>
                    </div>

                </div>
            @endforeach

        </div>
    </section>
    <?php
        $relpo = DB::table('posts')->where('type',$type)->whereNotIn('title',[$title])->inRandomOrder()->limit(5)->get();
    ?>
    <section class='les-sec-div'>
        <div class='first-sec-trend'>
            <h1>OTHER RELATED NEWS</h1>
            @foreach($relpo as $rela)
                <div class="news-p">
                    <div class="news-img">
                        <a href= "../../../posts/allposts/{{$rela->title}}" target="-blank"><img src="../../../pictures/{{$rela->image}}" width='300'></a>
                    </div>

                    <div class="news-det">
                        <span id="news-t">{{$rela->type}}</span>
                        
                        <h2> 
                            <a href= "../../../posts/allposts/{{$rela->title}}" target="-blank"> 
                            {{str_replace('++',' ',$rela->title)}}
                            </a>
                        </h2>
                        
                        <p>{{$rela->description}}</p>

                        <div class="news-da">
                            <?php
                                $exx = explode(' ',$rela->created_at);
                                echo $exx[0];
                            ?>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <?php  require('navigation_units/post_footer.php'); ?>

    </section>
</body>
</html>