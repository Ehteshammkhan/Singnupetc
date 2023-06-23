<?php
include 'connection.php';
// $sq = "DELETE FROM `registration` WHERE `registration`.`id` = 9";
// $result = mysqli_query($conn, $sq);
// if ($result) {
//     echo "sabbo deleted successfully";
// } else {
//     die(mysqli_error($conn));
// }
$sucess = 0;
$existed = 0;
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql = "insert into `registration` (username,password) values ('$password','$password')";
    // $result = mysqli_query($conn, $sql);
    // if ($result) {
    //     echo "Data inserted sucessfully";
    // } else {
    //     die(mysqli_error($conn));
    // }

    $sql = "select * from `registration` where username='$username'";
    $result = mysqli_query($conn, $sql);
    // print_r($result);
    if ($result) {
        $num = mysqli_num_rows($result);
        // print_r($num);
        if ($num > 0) {
            // echo "Username Is already Existed";
            $existed = 1;
        } else {
            $sql = "insert into `registration` (username,password) values ('$username','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // echo "Login Sucessfull";
                $sucess = 1;
            } else {
                die(mysqli_error($conn));
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <?php
    if ($sucess) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>congratulations</strong> You Have Successfully Sign UP.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <?php
    if ($existed) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> This User Is Already Existed.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <div class="container">
        <h2 class="mt-5 mb-5 text-center">Signup Your Registration Form</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
        </form>
    </div>
</body>

</html>