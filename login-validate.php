<?php
include "db_connection.php";

$emailaddress_error = $pass_error = $login_account_error = $login_pass_error = "";
$emailaddress = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["emailaddress"])) {
        $emailaddress_error = "Email Address is required";
    } else {
        $emailaddress = $_POST["emailaddress"];
    }

    if (empty($_POST["pass"])) {
        $pass_error = "Password is required";
    } else {
        $pass = $_POST["pass"];
    }

    if ($emailaddress_error == "" and $pass_error == "") {
        session_start(); //added
        $conn = OpenCon();
        $sql = "SELECT * FROM Users WHERE Email = '$emailaddress' ";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($result);
        if ($rows) {
            if ($rows["Password"] == $pass) {
                $_SESSION['username']=$rows["FirstName"]; //added
                header("location:mainpage.php");
            }
            else { $login_pass_error = "Wrong password, please try again"; }
        }
        else {
            { $login_account_error = "Account doesn't exist, please try again"; }
        }
        CloseCon($conn);
    }
}

?>