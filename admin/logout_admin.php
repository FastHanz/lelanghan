<?php

session_start();
session_unset();

$_SESSION['pesan'] = "Berhasil Logout.";

header("Location: index.php");

