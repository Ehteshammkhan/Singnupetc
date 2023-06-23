<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>

<h2>Welcome
    <?php echo $_SESSION['username']; ?> Your Session Is Not Going Anywhere Until YOU Logout Your Session!<h2>