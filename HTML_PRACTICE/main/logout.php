<?php
session_start();
session_destroy(); // clear all sessions
header("Location: index.php"); // back to login
exit();
