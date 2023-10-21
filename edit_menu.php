<?php
include 'functions.php'; 

if (isset($_POST['submit'])) {
    $menu_id = trim($_POST['menu_id']);
    $menu_name = trim($_POST['menuName']);
    $menu_desc = trim($_POST['menuDesc']);
    $price = trim($_POST['price']);

    update_data($menu_name, $menu_desc, $price, $menu_id);

}
?>