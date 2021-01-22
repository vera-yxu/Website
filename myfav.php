<html>

<head>
    <link rel="stylesheet" href="main_style.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.del_btn').click(function(){
                var homeid = $(this).attr('id');
                //alert('You clicked on ' + homeid);
                $.ajax({
                    url: 'myfav.php',
                    type: 'POST',
                    data: {
                        homeid: homeid
                    },
                    datatype: 'json',
                    success: function(result){
                        alert("Deleted home" + homeid);
                    }
                });           
            });
        });

    </script>
</head>

<body>

<?php include("header.php"); ?>

<?php
include "db_connection.php";
$fname = $_SESSION['username'];
$conn = OpenCon();
$sql_name = "SELECT * FROM Users WHERE FirstName = '$fname'";
$result_name = mysqli_query($conn, $sql_name);
$rows_name = mysqli_fetch_array($result_name);
$userid = $rows_name['UserID'];

$sql = "SELECT * FROM Myfav WHERE UserID = '$userid'";
$likes = mysqli_query($conn, $sql);
?>

<div class="container">
    <?php while ($rows = mysqli_fetch_array($likes)) { 
        echo "You liked home" ."". $rows['HomeID'] . "  ". "."; ?>
        <span><a style="text-decoration:none;" href="" class="del_btn" id="<?php echo $rows['HomeID']; ?>">delete</a></span><br>
    <?} ?>

</div>

<?php 
if (isset($_POST['homeid'])) {
    $homeid = $_POST['homeid'];
    $sql = "DELETE FROM Myfav WHERE UserID='$userid' AND HomeID='$homeid' ";
    if ($conn->query($sql) === TRUE) {
        header("location:myfav.php");
     } else echo "Error: ". $sql . "<br>" . $conn->error;
}
CloseCon($conn);
?>

</body>
</html>