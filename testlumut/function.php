<?php

$conn = new mysqli("localhost", "root", "", "lumuttest");
date_default_timezone_set("Asia/Jakarta");

function hapusu($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM account WHERE username='$id'");
}


function hapuspost($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM post WHERE idpost=$id");
}
