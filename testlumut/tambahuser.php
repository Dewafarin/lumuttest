<?php


include 'function.php';

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: user.php");
}
$alluser = mysqli_query($conn, "SELECT * FROM account");

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

    <div class="container">
        <a href="userbaru.php" class="btn btn-outline-success" type="submit">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nama</th>
                    <th scope="col">role</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alluser as $alldata) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $alldata['username'] ?></td>
                        <td><?= $alldata['role'] ?></td>
                        <td> <a class="action inline" href="edituser.php?username=<?= $alldata['username'] ?>">
                                edit
                            </a>
                            <a class="action" href="deleteuser.php?username=<?= $alldata['username'] ?>" onclick="return confirm('Hapus <?= $alldata['username']; ?>?')">
                                <div class="action">
                                    hapus
                                </div>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>