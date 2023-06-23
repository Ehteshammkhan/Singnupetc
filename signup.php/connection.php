<?php
$conn = new mysqli('localhost', 'root', "", 'signupform');
if (!$conn) {
    die(mysqli_error($conn));
}
?>