<?php 
    require_once "../connection.php";

    $stmt = $db->query("SELECT * FROM phplogin");
                    $stmt->execute();
                    $phplogins = $stmt->fetchAll();

                    if (!$phplogins) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($phplogins as $phplogin)  {  
                ?>
                    <tr>
                        <td><?php echo $phplogin['users_id']; ?></td>
                        <td><?php echo $phplogin['username']; ?></td>
                        <td><?php echo $phplogin['email']; ?></td>
                        <td><?php echo $phplogin['phone_number']; ?></td>
                        <td><?php echo $phplogin['line_id']; ?></td>
                        <td><?php echo $phplogin['role']; ?></td>
                    </tr>
                <?php }  }
    header("Content-Type: application/octet-stream");
    $file = $_GET["file"] . ".pdf";
    header("Content-Disposition: attachment; filename=" . urlencode($file));
    header("Content-Type: application/download");
    header("Content-Description: File Transfer");
    header("Content-Length: " . filesize($file));
    flush(); // Not a must.
    $fp = fopen($file, "r");
    while (!feof($fp)) {
    echo fread($fp, 65536);
    flush(); // This is essential for large downloads
    }
    fclose($fp);

?>