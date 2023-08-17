<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Departments</title>
        <style>
            .module{
                position: relative;
                height: 100%;
                width:25%;
                margin: 15% auto;
                background-color : #EBEBEB;
                opacity: 1;
                padding-top: 2px;
                padding-bottom: 20px;
                padding-left: 2%;
                padding-right: 2%;
                -webkit-box-shadow: 0px 1px 20px 0px rgba(136,136,136,1);
                -moz-box-shadow: 0px 1px 20px 0px rgba(136,136,136,1);
                box-shadow: 0px 1px 20px 0px rgba(136,136,136,1);
            }
        </style>
    </head>
    <body background="img/bracubackground.jpg">
        <div class="module">
            <h2><center>Clubs</center></h2>
            <?php
            require_once('dbconnect.php');

            $sql = "SELECT name, president, established_date from club";
            $result = mysqli_query($conn, $sql);
            ?>
            <table border ="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>Club Name</th>
                    <th>Club President</th>
                    <th>Established Date</th>
                </tr>

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                        <td><?php echo $row['name']; ?> </td>
                        <td><?php echo $row['president']; ?> </td>
                        <td><?php echo $row['established_date']; ?> </td>
                        <tr>
                <?php 
                        } 
                    }
                ?>
            </table>
        </div>
    </body>
</html>