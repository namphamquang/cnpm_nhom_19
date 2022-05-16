<?php
session_start();
unset($_SESSION['userInfo']);
header('location: index.php');