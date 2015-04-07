<?php
$servername = "oak.arvixe.com:3306";
$username = "guest";
$password = "12341234";

// Create connection
$conn = new mysqli($servername, $username, $password);
echo "entering<br>";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "entering<br>";
$sql = "USE shareviz_bh3";
$result = $conn->query($sql);
$r=(string)$_REQUEST["colorR"];
$g=(string)$_REQUEST["colorG"];
$b=(string)$_REQUEST["colorB"];
echo "entering<br>";
echo $r;
echo "<br>";
$sql = "INSERT INTO mp3 (time, R, G, B) VALUES (now(),$r,$g,$b)";
echo $sql;
echo "<br>";
$result = $conn->query($sql) ;


//echo $result;
?>