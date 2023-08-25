<?php
require 'function.php';
$id = $_GET["username"];
hapusu($id);
header("Location:tambahuser.php");
