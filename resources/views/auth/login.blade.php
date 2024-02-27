<?php 
    session_start(); 
    session_destroy();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css" media="all">
    <link rel="stylesheet" href="../css/login_rep.css" media="all">
    <title>LOGIN</title>
</head>

<body>
    
    <div class="login-sec">
            <h1>LOGIN</h1>
    
    <form name="login-form" action="../../backend_login" method="post">
        @csrf
    <?php
        if (isset($_GET['msg'])) {
            echo "<div class='msg-log'>$_GET[msg]</div>";
        }
    ?>
    <table>
    
        <tr>
            <td>EMAIL ADDRESS:</td> 
            <td><input type="text" name="email" placeholder="EMAIL ADDRESS"></td>
        </tr>
        
        <tr>
            <td>PASSWORD:</td> 
            <td><input type="password" name="password" placeholder="PASSWORD" id="p-pass"></td>
        </tr>

        <tr>            
            <td id="tock"><input type="button" value="TEXT" class="change-pass"  onclick="login()"></td>
            <td id="pock"><input type="button" value="TEXT" class="change-pass"   onclick="lob()"></td>
        </tr>
        <script src="../js/reg.js"></script>


    </table>

    

    <div class="btn-div">
        <button class="btn">ENTER</button>
    </div>
    
    </form>

       
    </div>


</body>

</html>