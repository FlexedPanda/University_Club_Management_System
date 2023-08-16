<?php
require_once('dbconnect.php');

$sql = "SELECT name, president, established date from club";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    foreach($row as $elem){
        echo $elem;
    }
}
?>