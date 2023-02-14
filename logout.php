<?php
session_start();
unset($_SESSION["obj"]);
header("Location:index.php");
?>