 <html>

<head>
<title>Change Password</title>
<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body> 

<div class="login-form">
    <?php include("changepass_validate.php"); ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="header" <h3>CHANGE PASSWORD</h3> </div><br>

        <label style="color: #2999c5;">Current Password: </label>
        <input style="margin-top: 5px;" type="password" name="currentpass" placeholder="Please enter your current password" class="input" value="<?= $currentpass ?>"><br>
        <span class="error"><?= $currentpass_error ?></span><br>

        <label style="color: #2999c5;">New Password: </label>
        <input style="margin-top: 5px;" type="password" name="newpass" placeholder="Please create a new password" class="input" value="<?= $newpass ?>"><br>
        <span class="error"><?= $newpass_error ?></span><br>

        <label style="color: #2999c5;">Re-enter New Password: </label>
        <input style="margin-top: 5px;" type="password" name="newpass2" placeholder="Please re-enter the new password" class="input" value="<?= $newpass2 ?>"><br>
        <span class="error"><?= $newpass2_error ?></span><br>
        <span class="error"><?= $passnotmatch_error ?></span><br>

        <input type="submit" value="Submit" class="btn">

        <a href="mainpage.php" style="color:#2999c5; font-size: meidum; text-decoration:none;"><center>Go back to main page</center></a>

    </form>
</div>

</body>
</html>