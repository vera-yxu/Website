<html>
    <head>
    <link rel="stylesheet" href="style_main.css" type="text/css"/>
    </head>

    <body>
        <div class="header"> 

            <div class="hi">
                <?php
                session_start();
                echo "Hi" . " " .  $_SESSION['username'] ."". "!"; 
                ?>
            </div>
            <div class="main">
                <a href="mainpage.php" style="color:dodgerblue; text-decoration:none;"><center>Main Page</center></a>
            </div>
            <div class="fav">
                <a href="myfav.php" style="color:dodgerblue; text-decoration:none;"><center>My Favoutites</center></a>
            </div>

            <div class="changepass">
                <a href="change_password.php" style="color:purple; text-decoration:none;">Change Password</a>
            </div>

            <div class="logout">
                <a href="logout.php" style="color: purple; text-decoration:none;">Log Out</a>
            </div>

        </div>
    </body>
</html>