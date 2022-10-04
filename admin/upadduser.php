<?php 

    session_start();

    require_once "../connection.php";

    if (isset($_POST['asdate'])) {
        $price = $_POST['price'];
        $date = date('Y-m-d',strtotime($_POST['date']));
        //$date = $_POST['date'];
        //$dates = date_format($date,"Y/m/d");
        $id = $_POST['id'];


        $sql = $db ->prepare("INSERT INTO phpdata(price,date,phplogin_id) VALUES ('$price','$date','$id')");
        $sql->execute();
        if ($sql) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: admin_home.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: admin_home.php");
        }
    }

?>