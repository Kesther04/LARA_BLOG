<?php 
    session_start();
    // if(!isset($_SESSION['id'])){
    //     print("<script>window.location='../dashboard'</script>");
    // }
?>

<script src="../js/dash.js"></script>

<div  id="peon" >&#9776;</div>



    
    <div class="dashboard">
        <div id="losec">&times;</div>
       

        <img src="../images/logo.png">
    
        <div class="dash-b"><a href="../" target="blank">HOME</a></div>
        <div class="dash-b"><a href="news_upload">NEWS UPLOAD</a></div>

        <div class="dash-b"><button onclick="if(window.confirm('Are you sure want to log out of this page')){window.location='../auth/index';}">LOG OUT</button></div>
        
    </div>



   

