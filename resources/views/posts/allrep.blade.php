
<?php

    use App\Models\Comment;
    use App\Models\Reply;

    
?>

    <script src='../../../js/jquery.js'></script>
    <script src='../../../js/ajax.js'></script>
    <div id='masag'>
        <div class='msg'>    
            <div class='msa'></div>
            <form><button class='aj-btn'>OKAY</button></form>
        </div>
    </div>
    @php
        $rep = Reply::where('com_id',$formData['cid'])->get();
        $com = Comment::where('id',$formData['cid'])->get();
    @endphp
    <h1>Replies</h1>
    
    @foreach($com as $coms)
        <div class="per-com">
            <span class="rep-nm">{{$coms['name']}}</span>
            <div class="com-per-div">{{$coms['comment']}}</div>
        </div>
    @endforeach

    <div class='reply-div'>

        <form  action='../../../posts/allrex' class="repfm" method='post'>
            @csrf
            <p id='rep-id'>
            <textarea name='rep' required id='rep-txt' placeholder='Type in your reply'></textarea>
            <input type='hidden' name='cid' value="{{$formData['cid']}}" required>
            <span class='rep-btn'><button>ENTER</button></span>
            </p>
        </form>
         

       
        @foreach($rep as $ron)
            <div class='per-rep'>
                <div class="rep-per-div">{{$ron['reply']}}</div>
            </div>
       @endforeach
    </div>
