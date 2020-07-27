<?php

include_once("config.php");

$pdo = new PDO('mysql:host='.SERVIDOR.";dbname=".DB , USER, PASSWORD);

// $connection = mysqli_connect(SERVIDOR,USER, PASSWORD, DB);
// if(isset($pdo)){
//     echo "<script>alert('connected');</script>";
// }else{
//     echo "error" ;
// }

?>
