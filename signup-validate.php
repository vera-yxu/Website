<?php
include "db_connection.php";

$fname_error = $lname_error = $email_error = $password_error = "";
$fname = $lname = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fname_error = "First Name is required";
    } else {
        $fname = $_POST["fname"];
    }
    
    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error="Invalid email format";
        }
    }

    if (empty($_POST["lname"])) {
        $lname_error = "Last Name is required";
    } else {
        $lname = $_POST["lname"];
    }

    if (empty($_POST["password"])) {
        $password_error = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if ($fname_error == "" and $lname_error == "" and $email_error == "" and $password_error == "") {
        session_start(); //added
        $conn = OpenCon();
        $sql = "INSERT INTO Users (FirstName, LastName, Email, Password)
                VALUES ('$fname', '$lname', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['username']=$fname;
            header("location:mainpage.php"); //added
        }
        else {
            echo "Error: ". $sql . "<br>" . $conn->error;
        }
        CloseCon($conn);
    }
}

?>