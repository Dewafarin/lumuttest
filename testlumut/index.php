<?php


include 'function.php';

session_start();
$username = $_SESSION["login"];


if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
$alluser = mysqli_query($conn, "SELECT * FROM post WHERE username='$username'");

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
            <a class="navbar-brand" href="#">LUMUT</a>
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
        <h1><?= $username ?></h1>
        <a href="tambahpost.php" class="btn btn-outline-success my-2" type="submit">tambah post</a>
        <?php foreach ($alluser as $alldata) : ?>
            <div class="card my-3" style="width: 18rem;">
                <a class="action inline" href="deletepost.php?idpost=<?= $alldata['idpost'] ?>" onclick="return confirm('Hapus <?= $alldata['title']; ?>?')">
                    <div class="action">
                        hapus
                    </div>
                </a>
                <a class="action inline" href="ubahpost.php?idpost=<?= $alldata['idpost'] ?>">
                    edit
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?= $alldata['title'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">by <?= $alldata['username'] ?> <?= $alldata['date'] ?></h6>
                    <p class="card-text"><?= $alldata['content'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>