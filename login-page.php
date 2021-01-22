<!DOCTYPE HTML>  
<html>

<head>
<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body> 

<div class="login-form">
    <?php include("login-validate.php"); ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="header" <h3>WELCOME BACK!</h3> </div>
        <input type="text" name="emailaddress" placeholder="Email Address" class="input" value="<?= $emailaddress ?>">
        <span class="error"><?= $emailaddress_error ?></span><br>
        <span class="error"><?= $login_account_error ?></span><br>

        <input type="password" name="pass" placeholder="Password" class="input" value="<?= $pass ?>">
        <span class="error"><?= $pass_error ?></span><br>
        <span class="error"><?= $login_pass_error ?></span><br>

        <input type="submit" value="Log In" class="btn">

        <a href="signup-page.php" style="color:#2999c5; font-size: medium; text-decoration:none;"><center>New User?</center></a>

    </form>
</div>

</body>
</html>