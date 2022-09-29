<?php 

    session_start();

    require_once "../connection.php";

    if (isset($_POST['update'])) {
        $phplogin_id = $_POST['phplogin_id'];
        $users_id = $_POST['users_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone_number =$_POST['phone_number'];
        $line_id =$_POST['line_id'];
        $role = $_POST['role'];

        $sql = $db ->prepare("UPDATE phplogin SET users_id = :uusers_id, username = :uname, email = :uemail, phone_number = :uphone_number, line_id = :uline_id,  role = :urole where phplogin_id = :uphplogin_id");
        $sql->bindParam(":uphplogin_id", $phplogin_id);
        $sql->bindParam(":uusers_id", $users_id);
        $sql->bindParam(":uname", $username);
        $sql->bindParam(":uemail", $email);
        $sql->bindParam(":uphone_number", $phone_number);
        $sql->bindParam(":uline_id", $line_id);
        $sql->bindParam(":urole", $role);
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            max-width: 550px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <hr>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_GET['phplogin_id'])) {
                        $phplogin_id = $_GET['phplogin_id'];
                        $stmt = $db->query("SELECT * FROM phplogin WHERE phplogin_id = $phplogin_id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
                <div class="mb-3">
                    <label for="phplogin_id" class="col-sm-3 control-label">ID:</label>
                    <input type="text" readonly value="<?php echo $data['phplogin_id']; ?>" required class="form-control" name="phplogin_id" >
                    <div class="mb-3">
                    <label for="users_id" class="col-sm-3 control-label">รหัสผู้ใช้</label>
                    <input type="text" value="<?php echo $data['users_id']; ?>" required class="form-control" name="users_id">
                </div>
                    <label for="username" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
                    <input type="text" value="<?php echo $data['username']; ?>" required class="form-control" name="username" >
                </div>
                <div class="mb-3">
                    <label for="email" class="col-sm-3 control-label">อีเมล์:</label>
                    <input type="text" value="<?php echo $data['email']; ?>" required class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="col-sm-3 control-label">เบอร์โทรศัพท์:</label>
                    <input type="text" value="<?php echo $data['phone_number']; ?>" required class="form-control" name="phone_number">
                </div>
                <div class="mb-3">
                    <label for="line_id" class="col-sm-3 control-label">ไลน์ไอดี:</label>
                    <input type="text" value="<?php echo $data['line_id']; ?>" required class="form-control" name="line_id">
                </div>

                <div class="mb-3">
                    <label for="type" class="col-sm-3 control-label">ระดับสมาชิก</label>
                    <div class="col-sm-12">
                    <select name="role" class="form-control">
                            <option value="" selected="selected">- ระดับสมาชิก -</option>
                            <option value="admin">ดูแลระบบ</option>
                            <option value="student">นักศึกษา</option>
                            <option value="in_personnel">บุคลากรภายใน</option>
                            <option value="out_personnel">บุคคลภายนอก</option>
                        </select>
                    </div>
                    </div>
                <hr>
                <a href="admin_home.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div>

    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }

    </script>
</body>
</html>