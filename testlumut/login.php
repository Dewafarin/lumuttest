<?php

include 'function.php';

session_start();

if (isset($_SESSION['admin'])) {
    header("Location: index.php");
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'");

    if (mysqli_num_rows($user) === 1) {
        $data = mysqli_fetch_assoc($user);

        if ($password == $data["password"]) {
            if ($data["role"] == "admin") {
                $_SESSION["login"] = $username;
                $_SESSION["admin"] = true;

                header("location:index.php");
                exit;
            } else {
                $_SESSION["login"] = $username;
                $_SESSION["user"] = true;

                header("location:user.php");
                exit;
            }
        }else{
            echo "username ataupassword salah";
        }
    }
    $error  = true;
} else {
    $daftar = true;
}


?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <form method="POST">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <a href="index.php">kembali</a>
        <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput">
            <label for="floatingInput">username</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2" name="login" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
    </form>
</body>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

</html>