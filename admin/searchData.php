<?php 

    require_once "../connection.php";
    $name = $_POST["empname"];
    $stmt = $db->query("SELECT * FROM phplogin WHERE username LIKE '%name%'");
    $stmt->execute();
    $phplogins = $stmt->fetchAll();
    $phplogins = $stmt->fetchAll();
    if (!$phplogins) {
        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
        } else {
        foreach($phplogins as $phplogin){
                ?> <tr>
                    <td><?php echo $phplogin['users_id']; ?></td>
                    <td><?php echo $phplogin['username']; ?></td>
                    <td><?php echo $phplogin['email']; ?></td>
                    <td><?php echo $phplogin['phone_number']; ?></td>
                    <td><?php echo $phplogin['line_id']; ?></td>
                    <td><?php echo $phplogin['role']; ?></td>
                </tr>
        <?php }  }      
?>
