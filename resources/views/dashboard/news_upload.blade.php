<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/news_upload.css" media="all">
    <link rel="stylesheet" href="../css/dash_css_rep.css" media="all">
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../ckeditor/samples/js/sample.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/np_form.js"></script>
    <!-- <script src="../js/ajax.js"></script> -->
    <title>Dashboard</title>
    
</head>
<body>

    <?php require("navigation_units/admin_dashboard_layout.php"); ?>

    <div id="masag">
        <div class="msg">    
            <div class="msa"></div>
            <button class="aj-btn"><a href="news_upload.php">OKAY</a></button>
        </div>
    </div>

    <section class="main-div-container">


        <form  class="news_upl" action="backend_news" method="post" enctype="multipart/form-data">
            @csrf
            <div class="sec-div-container">
                <?php
                    if (isset($_GET['msg'])) {
                        echo "<div class=msg-log>".$_GET['msg']."</div>";
                    }
                ?>

                <h1>UPLOAD NEWS EVENTS</h1>

                
                <div class="fir-div-container">
                    <table>

                        <tr>
                            <td>
                                <span>News Title:</span>
                                <input type="text" name="title" size="40" required>
                            </td>

                            <td>
                                <span>News Desc.:</span>
                                <input type="text" name="desc" size="40" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span>Images:</span>
                                <input type="file" name="image" size="40" required style="background-color:white;">
                            </td>

                            
                            <td>
                                <span>Category:</span>
                                <select name="cat" id="cat" required>
                                </select>
                            </td>
                        </tr>

                        <tr class="cat-typ">
                            <td>
                                <span>Category Type:</span>
                                <select name="type" required id="typ"></select>
                            </td>
                        </tr>

                    </table>
                </div>
                
                <div class="txt-container">
                    <textarea id="editor" name="post" required></textarea>
                </div>

                <div class="con-btn-div">
                    <button class="con-btn">SUBMIT</button>
                </div>
                
            
            </div>

        </form>


            
        <script>
            initSample();
        </script>


    </section>


</body>
</html>