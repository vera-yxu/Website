<!DOCTYPE HTML>  
<html>

<head>
<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body> 

<div class="signup-form">
    <?php include("signup-validate.php"); ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="header" <h3>REGISTER FOR FREE!</h3> </div>
        <input type="text" name="fname" placeholder="First Name" class="input" value="<?= $fname ?>">
        <span class="error"><?= $fname_error ?></span><br>

        <input type="text" name="lname" placeholder="Last Name" class="input" value="<?= $lname ?>">
        <span class="error"><?= $lname_error ?></span><br>

        <input type="text" name="email" placeholder="Email Address" class="input" value="<?= $email ?>">
        <span class="error"><?= $email_error ?></span><br>

        <input type="password" name="password" placeholder="Password" class="input" value="<?= $password?>">
        <span class="error"><?= $password_error ?></span><br>

        <input type="submit" value=Submit class="btn">

        <a href="login-page.php" style="color:#2999c5; font-size: medium; text-decoration:none;"><center>Already Resgistered?</center></a>

    </form>
</div>

</body>
</html>