<?php
include "db_connection.php";

$currentpass_error = $newpass_error = $newpass2_error = $passnotmatch_error = "";
$currentpass = $newpass = $newpass2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["currentpass"])) {
        $currentpass_error = "Current password is required";
    } else {
        $currentpass = $_POST["currentpass"];
    }

    if (empty($_POST["newpass"])) {
        $newpass_error = "New password is required";
    } else {
        $newpass = $_POST["newpass"];
    }

    if (empty($_POST["newpass2"])) {
        $newpass2_error = "Re-enter new password is required";
    } else {
        $newpass2 = $_POST["newpass2"];
    }

    if ($newpass == $newpass2) {
        if ($currentpass_error == "" and $newpass_error == "" and $newpass2_error == "") {
            session_start(); 
            $conn = OpenCon();
            $sql = "SELECT * FROM Users WHERE FirstName = '" . $_SESSION["username"] . "'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_array($result);
            if ($rows) {
                if ($rows["Password"] == $currentpass) {
                    mysqli_query($conn, "UPDATE Users SET Password = '$newpass' WHERE FirstName='" . $_SESSION["username"] . "'");
                    echo "Password Changed";
                }
                else { $currentpass_error = "Wrong password, please try again"; }
            }
            else 
                echo "Info not retrieved from database"; 
            
            CloseCon($conn);
        }
    } else {
        $passnotmatch_error = "Passwords do not match, please try again";
    }

    
}

?>