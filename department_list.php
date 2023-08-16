<?php
require_once('dbconnect.php');

$sql = "SELECT name, head, email from department";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    foreach($row as $elem){
        echo $elem;
    }
}
?>