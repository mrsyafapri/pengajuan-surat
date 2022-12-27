<?php
include "connect/koneksi.php";

session_start();
$user = $_SESSION["id_user"];
session_destroy();
header('Location: login.php');
