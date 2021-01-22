<html>
<head>
    <link rel="stylesheet" href="style_main.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.addfav').click(function(){
                var homeid = $(this).attr('id');
                //alert('You clicked on ' + homeid);
                $.ajax({
                    url: 'mainpage.php',
                    type: 'POST',
                    data: {
                        homeid: homeid
                    },
                    datatype: 'json',
                    success: function(result){
                        alert("Successfully added home" + homeid);
                    }
                });           
            });
        });
    </script>
</head>

<?php 
    include "db_connection.php";
    $conn = OpenCon();
    $sql = " SELECT * FROM Hosts, Homes, Post WHERE Post.HomeID = Homes.HomeID AND Post.HostID = Hosts.HostID";
    $result = mysqli_query($conn, $sql);
?>

<body>
    <?php include("header.php"); ?>

    <?php while ($rows = mysqli_fetch_array($result)) { ?>

    <div class="container">
        <div class="home">           
                <div class="img" style="background-image: url(<?php echo $rows['Imgname'] ?>)"></div><br>
                <p>This is home <?php echo $rows['HomeID'] ?></p><br>
                <p>Hosted by: <?php echo $rows['HFname'] . " " . $rows['HLname'] ?></p><br>
                <p>Location: <?php echo $rows['Country'] . " " . $rows['Zipcode'] ?> </p><br>
                <p>Number of bedrooms: <?php echo $rows['Nbedroom'] ?> </p><br>
                <p>Number of bathrooms: <?php echo $rows['Nbathroom'] ?> </p><br>
                <p>Maximum number of guests: <?php echo $rows['Maxguests'] ?> </p><br>
                <p>Description: <?php echo $rows['Description'] ?> </p><br>
                <span><a style="text-decoration:none;" href="" class="addfav" id="<?php echo $rows['HomeID']; ?>">Add to Favourites</a></span>
                <br>
                <br>
        </div>
    </div>
        
    <?} ?>
    <?php CloseCon($conn); ?>

    <?php 
        $fname = $_SESSION['username'];
        $conn = OpenCon();
        $sql_name = "SELECT * FROM Users WHERE FirstName = '$fname'";
        $result_name = mysqli_query($conn, $sql_name);
        $rows_name = mysqli_fetch_array($result_name);
        $userid = $rows_name['UserID'];
        if (isset($_POST['homeid'])) {
            $homeid = $_POST['homeid'];
            $sql = "INSERT INTO Myfav (UserID, HomeID) VALUES ('$userid', '$homeid') ";
            if ($conn->query($sql) === TRUE) {
                echo "data successfully inserted to Myfav table";
            } else echo "Error: ". $sql . "<br>" . $conn->error;
        }
        CloseCon($conn);
    ?>

</body>
</html>