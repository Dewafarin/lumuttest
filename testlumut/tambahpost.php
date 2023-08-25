<?php

include 'function.php';
session_start();

if (isset($_POST["tambah"])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d h:i:sa');;
    $username = $_SESSION['login'];




    mysqli_query($conn, "insert into post values('','$title','$content','$date','$username')");
    if ($_SESSION["admin"]) {
        header("location:index.php");
    } else {
        header("location:user.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">LUMUT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tambahuser.php">Tambah User</a>
                    </li>
                </ul>

                <form class="d-flex" role="search">
                    <a href="logout.php" class="btn btn-outline-danger" type="submit">Logout</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">ketik</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button class="btn btn-primary w-100 py-2" name="tambah" type="submit">tambah</button>
        </form>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>