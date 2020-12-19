<?php

if(isset($_SESSION['cart'])){
    var_dump($_SESSION['cart']);
    unset($_SESSION['cart']);
}
