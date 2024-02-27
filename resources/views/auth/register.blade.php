<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css" media="all">
    <link rel="stylesheet" href="../css/login_rep.css" media="all">
    <title>SIGN UP</title>
</head>

<body>
    <div class="form-sec">
            
        <h1>REGISTRATION FORM</h1>
        
        <form name="reg-form" action="../../backend_reg" method="post">
            @csrf
            <table>
            
                <tr>
                    <td>FULLNAME:</td>  <td><input type="text" value="ADMIN" name="name" readonly required></td>
                </tr>

                <tr>
                    <td>EMAIL ADDRESS:</td>   <td><input type="text"  name="email" required></td>
                </tr>

                <tr>
                    <td>PASSWORD:</td>

                    <td>
                        <span><input type="password"  name="password" id="p-p-p" onclick="record()" required></span>
                        
                        <span id="p-a-t">
                            <input type="button" value="SHOW" onclick="login()" id="aaa"> 
                            <input type="button" value="SHOW" onclick="lob()" id="bbb">
                        </span>
                    </td>
                    <script src="../js/reed.js"></script>
                </tr>

                <tr>
                    <td>PHONE NUMBER:</td>     
                    <td><input type="number"  name="phone" required></td>
                </tr>

            </table>

            <div class="btn-div">
                <button class="btn">REGISTER</button>
            </div>
        
        </form>
    
    </div>

</body>

</html>