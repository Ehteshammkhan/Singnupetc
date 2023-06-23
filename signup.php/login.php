<?php

// $sq = "DELETE FROM `registration` WHERE `registration`.`id` = 9";
// $result = mysqli_query($conn, $sq);
// if ($result) {
//     echo "sabbo deleted successfully";
// } else {
//     die(mysqli_error($conn));
// }
$error = 0;
$existedsucess = 0;
if (isset($_POST['submit'])) {
    include 'connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql = "insert into `registration` (username,password) values ('$password','$password')";
    // $result = mysqli_query($conn, $sql);
    // if ($result) {
    //     echo "Data inserted sucessfully";
    // } else {
    //     die(mysqli_error($conn));
    // }

    $sql = "select * from `registration` where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    // print_r($result);
    if ($result) {
        $num = mysqli_num_rows($result);
        // print_r($num);
        if ($num > 0) {
            // echo "Username Is already Existed";
            $existedsucess = 1;
            session_start();
            $_SESSION['username']=$username;
            header("location:welcome.php");
        } else {
            $error = 1;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <?php
    if ($existedsucess) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>congratulations</strong> You Have Successfully Log In.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <?php
    if ($error) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> Invalid Credentils.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    } ?>
    <div class="container">
        <h2 class="mt-5 mb-5 text-center">Login Into Your Account</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </form>
    </div>
</body>

</html>