<?php
session_start();
if(isset($_SESSION['test'])){
    var_dump($_SESSION['test']);
    unset($_SESSION['test']);
}

if(isset($_SESSION['error'])){
    var_dump($_SESSION['error']);
    unset($_SESSION['error']);
}
