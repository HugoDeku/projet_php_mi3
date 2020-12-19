<?php
session_start();
if(isset($_SESSION['newUser'])){
    var_dump($_SESSION['newUser']);
    unset($_SESSION['newUser']);
}

if(isset($_SESSION['error'])){
    var_dump($_SESSION['error']);
    unset($_SESSION['error']);
}