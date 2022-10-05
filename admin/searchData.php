<?php 
        session_start();
        require_once "../connection.php";
        if (!isset($_SESSION['admin_login'])) {
            header("location: ../index.php");
        }

        if (isset($_GET['delete'])) {
            $delete_id = $_GET['delete'];
            $deletestmt = $db->query("DELETE FROM phplogin WHERE phplogin_id = $delete_id");
            $deletestmt->execute();
    
            if ($deletestmt) {
                echo "<script>alert('Data has been deleted successfully');</script>";
                $_SESSION['success'] = "Data has been deleted succesfully";
                header("refresh:1; url=admin_home.php");
            }
            
        }
        

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="text-center mt-5">
        <div class="container">

            <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <h3>
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
    <div><img src="psu.png"alt="PSU" width="7%" height="7%"></div>
            &nbsp;
            <font size="5"><marquee>Welcome Fitness and swimming pool service database system for PSU sport complex </marquee></font>
            <br>
            <h3>
                ผู้ดูแลระบบ
            </h3>
            <h4>
                ยินดีต้อนรับเข้าสู่ระบบฟิตเนสศูนย์กีฬามหาวิทยาลัยสงขลานครินทร์
            </h4>
            <div class="col-md-20 d-flex justify-content-end">
                <div>&nbsp;</div>
                    <a href="../logout.php" class="btn btn-danger">ออกจากระบบ</a>
                </div>
            <div>
            &nbsp;
    </div>

            <meta name="viewport" content="width=device-width, initial-scale=1">
                <style>
                body {font-family: Arial;}

                /* Style the tab */
                .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
                }

                /* Style the buttons inside the tab */
                .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
                }

                /* Change background color of buttons on hover */
                .tab button:hover {
                background-color: #ddd;
                }

                /* Create an active/current tablink class */
                .tab button.active {
                background-color: #ccc;
                }

                /* Style the tab content */
                .tabcontent {
                display: none;
                padding: 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
                }
                </style>
                </head>
                <body>
                <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Home')">Home</button>
                <button class="tablinks" onclick="openCity(event, 'Serviceuser')">ผู้ใช้บริการ</button>
                <button class="tablinks" onclick="openCity(event, 'Report')">รายงาน</button>
                <button class="tablinks" onclick="openCity(event, 'Information')">ข้อมูลสมาชิก</button>
                <button class="tablinks" onclick="openCity(event, 'Notification')">การแจ้งเตือน</button>
                <button class="tablinks" onclick="openCity(event, 'User')">สมัครสมาชิก</button>
    </div>

    <div id="Home" class="tabcontent">
                <h3>Home</h3>
                <p>Home</p>
                <div align="center">
                    <link rel="stylesheet" href="zpp.css">
                </head>
                <body class="light">
                    <div class="calendar">
                        <div class="calendar-header">
                            <span class="month-picker" id="month-picker">February</span>
                            <div class="year-picker">
                                <span class="year-change" id="prev-year">
                                    <pre><</pre>
                                </span>
                                <span id="year">2021</span>
                                <span class="year-change" id="next-year">
                                    <pre>></pre>
                                </span>
                            </div>
                        </div>
                        <div class="calendar-body">
                            <div class="calendar-week-day">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="calendar-days"></div>
                        </div>
                        <div class="calendar-footer">
                            <div class="toggle">
                                <span>Dark Mode</span>
                                <div class="dark-mode-switch">
                                    <div class="dark-mode-switch-ident"></div>
                                </div>
                            </div>
                        </div>
                        <div class="month-list"></div>
                    </div>

                    <script src="app.js"></script>
                    </div>
                </div>

                <div id="Serviceuser" class="tabcontent">
                <h3>ผู้ใช้บริการ</h3>
                <table class="table">
                <thead>
                <tr>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">อีเมล์</th>
                    <th scope="col">เบอร์โทรศัพท์</th>
                    <th scope="col">ไลน์ไอดี</th>
                    <th scope="col">ระดับสมาชิก</th>
                    <th scope="col">เพิ่มเข้าใช้บริการ</th>
                </tr>
                <tbody>
                <?php 
                    require_once "../connection.php";
                    $name = $_POST["empname"];
                    $stmt = $db->query("SELECT * FROM phplogin WHERE username LIKE '%$name%' or phplogin_id LIKE '%$name%' or email LIKE '%$name%'");
                    $stmt->execute();
                    $phplogins = $stmt->fetchAll();
                    if (!$phplogins) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                        } else {
                        foreach($phplogins as $phplogin){
                                ?> <tr>
                                    <td><?php echo $phplogin['username']; ?></td>
                                    <td><?php echo $phplogin['email']; ?></td>
                                    <td><?php echo $phplogin['phone_number']; ?></td>
                                    <td><?php echo $phplogin['line_id']; ?></td>
                                    <td><?php echo $phplogin['role']; ?></td>
                                    <td>
                                        <a href="adduser.php?phplogin_id=<?php echo $phplogin['phplogin_id']; ?>" class="btn btn-warning">Add</a>                                    </td>
                                </tr>
                        <?php }  }      
                ?>
                </tbody>
            </table>
                <script>
                function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
                }
                </script>

    </div>

    <div id="Report" class="tabcontent">
                    <div align="right" class="col-md-20 d-flex justify-content-end">
                        <div>&nbsp;</div>
                        <form action="s.adata.php" method="post">
                            <input type="submit" value="ค้นหา" class="btn btn-info my-2">
                        </form>
                    </div>
                            <div class="col-md-20 d-flex justify-content-end">
                                <a class="btn btn-info" href="downloadpdf.php?file=gfgpdf">โหลดรายงาน</a>
                            </div>

                            <br>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">อีเมล์</th>
                    <th scope="col">เบอร์โทรศัพท์</th>
                    <th scope="col">ไลน์ไอดี</th>
                    <th scope="col">ระดับสมาชิก</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">วันที่</th>
                </tr>
                <tbody>
                <?php 
                    $stmt = $db->query("SELECT * FROM phplogin, phpdata Where phplogin.phplogin_id = phpdata.phplogin_id;");
                    $stmt->execute();
                    $phplogins = $stmt->fetchAll();

                    if (!$phplogins) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($phplogins as $phplogin)  {  
                ?>
                    <tr>
                        <td><?php echo $phplogin['username']; ?></td>
                        <td><?php echo $phplogin['email']; ?></td>
                        <td><?php echo $phplogin['phone_number']; ?></td>
                        <td><?php echo $phplogin['line_id']; ?></td>
                        <td><?php echo $phplogin['role']; ?></td>
                        <td><?php echo $phplogin['price']; ?></td>
                        <td><?php echo $phplogin['date']; ?></td>
                    </tr>
                <?php }  } ?>
            </tbody>
            </table>
                <script>
                function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
                }
                </script>

    </div>
                
    <div id="Notification" class="tabcontent">
                <h3>การแจ้งเตือน</h3>  
                    <body>
                        <div class="container">
                        <hr>
                        <form action="sendinfo.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมล์</label>
                                <input type="email" class="form-control" name="email" aria-describedby="email">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">ชื่อ-สกุล</label>
                                <input type="text" class="form-control" name="fullname" aria-describedby="Full Name">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </body>
    </div>
    <div id="Information" class="tabcontent">
                <h3>ข้อมูลสมาชิก</h3>
                <div align="right">
                    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                        ค้นหา <input type="text" name="search" placeholder="กรอกคำค้นหา">
                        <input class="btn btn-info" type="submit" value="ค้นหา">
                    </form>
                </div>
                <style>
                    table {
                    border-collapse: collapse;
                    border-spacing: 0;
                    width: 100%;
                    border: 1px solid #ddd;
                    }

                    th, td {
                    text-align: left;
                    padding: 16px;
                    }

                    tr:nth-child(even) {
                    background-color: #f2f2f2;
                    }
                </style>
        <br>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">อีเมล์</th>
                    <th scope="col">เบอร์โทรศัพท์</th>
                    <th scope="col">ไลน์ไอดี</th>
                    <th scope="col">ระดับสมาชิก</th>
                </tr>
                <tbody>
                <?php 
                    $stmt = $db->query("SELECT * FROM phplogin");
                    $stmt->execute();
                    $phplogins = $stmt->fetchAll();

                    if (!$phplogins) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($phplogins as $phplogin)  {  
                ?>
                    <tr>
                        <td><?php echo $phplogin['username']; ?></td>
                        <td><?php echo $phplogin['email']; ?></td>
                        <td><?php echo $phplogin['phone_number']; ?></td>
                        <td><?php echo $phplogin['line_id']; ?></td>
                        <td><?php echo $phplogin['role']; ?></td>
                    </tr>
                <?php }  } ?>
            </tbody>
            </table>
                <tbody>        
    </div>

    <div id="User" class="tabcontent">
                <h3>สมัครสมาชิก</h3>
                &nbsp;
                <a href="../register.php" class="btn btn-primary">Add User</a>
                &nbsp;
                <br>
                <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php } ?>
        <br>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">อีเมล์</th>
                    <th scope="col">เบอร์โทรศัพท์</th>
                    <th scope="col">ไลน์ไอดี</th>
                    <th scope="col">ระดับสมาชิก</th>
                    <th scope="col">แก้ไขข้อมูล</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $db->query("SELECT * FROM phplogin");
                    $stmt->execute();
                    $phplogins = $stmt->fetchAll();

                    if (!$phplogins) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($phplogins as $phplogin)  {  
                ?>
                    <tr>
                        <td><?php echo $phplogin['username']; ?></td>
                        <td><?php echo $phplogin['email']; ?></td>
                        <td><?php echo $phplogin['phone_number']; ?></td>
                        <td><?php echo $phplogin['line_id']; ?></td>
                        <td><?php echo $phplogin['role']; ?></td>
                        <td>
                            <a href="edit.php?phplogin_id=<?php echo $phplogin['phplogin_id']; ?>" class="btn btn-warning">แก้ไข</a>
                            <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $phplogin['phplogin_id']; ?>" class="btn btn-danger">ลบข้อมูล</a>
                        </td>
                    </tr>
                <?php }  } ?>
            </tbody>
        </div>
    </div>
                </div>

                <script>
                function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
                }
                </script>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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