<?php
    use App\Models\Post;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/css_home.css" media="all">
    <link rel="stylesheet" href="../../css/resp_ind.css" media="all">
    <link rel="stylesheet" href="../../css/bin_cd.css" media="all">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/metro.js"></script>
    <script src="../../js/header_move.js"></script>
    <title>Document</title>
</head>
<body>
    <?php require('navigation_units/snd_header.php');  ?>
    <?php
        $posts = Post::where('type', basename($_SERVER['PHP_SELF']))->get();
        $rpo = Post::inRandomOrder()->take(3)->get();
    ?>
    <section class="first-sec-div close-fsd">
        <div class="container">
                        
            <!-- <img src="../../../images/3ar.png" width="60" class="prev" alt="Prev">
            <img src="../../../images/5ar.png" width="68" class="next" alt="Next">
                    
            
            <div class="img-container">
                <img src="../../../images/1b.png" class="active" id="first">
                <img src="../../../images/1h.webp">
                <img src="../../../images/1c.jpg">
                <img src="../../../images/1d.avif" id="last">
            </div> -->

            <!-- Slider main container -->

            <div class="img-container">
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide"><img src="../../../images/1b.png"></div>
                        <div class="swiper-slide"><img src="../../../images/1h.webp"></div>
                        <div class="swiper-slide"><img src="../../../images/1c.jpg"></div>
                        <div class="swiper-slide"><img src="../../../images/1d.avif"></div>
                    </div>

                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
        </div>
        
        @foreach($posts as $post)
            <div class="news-p">
                <div class="news-img">
                    <a href= "../../posts/allposts/{{$post['title']}}" target="-blank"><img src="../pictures/{{$post->image}}" width='300'></a>
                </div>

                <div class="news-det">
                    <span id="news-t">
                        {{$post['type']}}
                    </span>
                    
                    <h2> 
                        <a href= "../../posts/allposts/{{$post['title']}}" target="-blank"> 
                            {{str_replace('++',' ',$post['title'])}}
                        </a>
                    </h2>
                    
                    <p>
                        {{$post['description']}}
                    </p>

                    <div class="news-da">
                        <?php
                            $exx = explode(' ',$post['created_at']);
                            echo $exx[0];
                        ?>
                    </div>
                    
                </div>
            </div>
        @endforeach

    </section>

    
    <section class="ano-sec-div">
        <div class="first-sec-trend">
            <h1>TRENDING NEWS</h1>

            @foreach($rpo as $row)
                <div class="fst-div">
                    <a href= "../../posts/allposts/{{$row['title']}}" target="-blank">
                        <img src="../pictures/{{$row['image']}}">
                    </a>
                    <span id="news-t">{{$row['type']}}</span>
                        
                    <h2> 
                        {{str_replace('++',' ',$row['title'])}}
                    </h2>
                        
                    <p>{{$row['description']}}</p>
                
                    <div class="news-da">
                        <a href= "../../posts/allposts/{{$row['title']}}" target="-blank"> 
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

    <?php require('navigation_units/snd_footer.php');  ?>
    <script src="../../js/bin_cd.js"></script>
    <script src="../../js/eee.js"></script>
</body>
</html>