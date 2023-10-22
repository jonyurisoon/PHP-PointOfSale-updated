<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>

<?php

function conn_db()
{
    try {
        //if not working, change '3306' to your mysql port
        return new PDO('mysql:host=localhost:3306;dbname=pointOfSale', 'root', '');
    } catch (PDOException $ex) {
        echo "Connection Error: ", $ex->getMessage();
    }
}

//Create
function add_data($menu_name, $menu_desc, $price)
{
    $db = conn_db();
    $sql = "Insert into ref_menu(menu_name, menu_desc, price) values(?, ?, ?)";
    $st = $db->prepare($sql);

    if ($st->execute(array($menu_name, $menu_desc, $price))) {
        // Success - Display SweetAlert
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Menu item created!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php'; // Redirect to the main page
                }
            });
        </script>";
    }
    $db = null;
}

// Retrieve 
function view_data()
{
    $db = conn_db();
    $sql = "SELECT * FROM ref_menu ORDER BY menu_id ASC";
    $st = $db->prepare($sql);
    $st->execute();
    $rows = $st->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $rows;
}

// Retrieve JSON format
function view_data_json()
{
    $db = conn_db();
    $sql = "SELECT * FROM ref_menu ORDER BY menu_id ASC";
    $st = $db->prepare($sql);
    $st->execute();
    $rows = $st->fetchAll(PDO::FETCH_ASSOC);
    $jsonRes = json_encode($rows);
    echo $jsonRes;
    $db = null;
    return $rows;
}

//Update
function update_data($menu_name, $menu_desc, $price, $menu_id)
{
    $db = conn_db();
    $sql = "UPDATE ref_menu SET menu_name=?, menu_desc=?, price=? WHERE menu_id=?";
    $st = $db->prepare($sql);

    if ($st->execute([$menu_name, $menu_desc, $price, $menu_id])) {
        // Success - Display SweetAlert
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Menu item updated!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php'; // Redirect to the main page
                }
            });
        </script>";
    }
    $db = null;
}

//Delete
function delete_data($id)
{
    $db = conn_db();
    $sql = "DELETE FROM ref_menu WHERE menu_id=?";
    $st = $db->prepare($sql);

    if ($st->execute([$id])) {
        // Success - Display SweetAlert
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Menu item deleted!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php'; // Redirect to the main page
                }
            });
        </script>";
    }
    $db = null;
}

//Search
function search_data($menu_id)
{
    $db = conn_db();
    $sql = "SELECT * FROM ref_menu WHERE menu_id=?";
    $st = $db->prepare($sql);
    $st->execute(array($menu_id));
    $row = $st->fetch(PDO::FETCH_ASSOC);
    $db = null;
    return $row ?: [];
}
