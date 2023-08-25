<?php
require 'function.php';
$id = $_GET["idpost"];
hapuspost($id);
header("Location:index.php");
