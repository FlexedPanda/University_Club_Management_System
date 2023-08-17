<?php
require_once('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $departmentName= $_GET['dept_name'];
    $message = $_POST['message'];


    require_once('dbconnect.php');
    $insertSql = "INSERT INTO departmentmessages (departmentname, message) VALUES ('$departmentName', '$message')";

    if (mysqli_query($conn, $insertSql)) {
        mysqli_close($conn);

        echo '
        <head>
            <title>Posted</title>
            <link rel="stylesheet" type="text/css" href="css/error.css">
        </head>
        <body background="img/bracubackground.jpg">
            <div class="center-div">
                <h1>Message Posted<i></i></h1>
                <p>Message Have Been Successfully Posted & Sent To All Users.</p>
                <button class="btn" onclick="history.go(-1);" >Go Back To Homepage<i></i></button>
            </div>
        </body>
        ';
        // header("Location: home.php");
        exit();
    } else {
        // Database update failed
        echo "Error posting message: " . mysqli_error($conn);
    }
}
?>
