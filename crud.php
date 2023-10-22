<?php
include 'functions.php';

if (isset($_POST['submit'])) {
    $menu_name = trim($_POST['menuName']);
    $menu_desc = trim($_POST['menuDesc']);
    $price = trim($_POST['price']);

    add_data($menu_name, $menu_desc, $price);
}

if (isset($_POST['edit'])) {
    $menu_id = trim($_POST['menu_id']);
    $menu_name = trim($_POST['menuName']);
    $menu_desc = trim($_POST['menuDesc']);
    $price = trim($_POST['price']);

    update_data($menu_name, $menu_desc, $price, $menu_id);
}

if (isset($_POST['delete'])) {
    $id = trim($_POST['delete']);
    delete_data($id);
}
