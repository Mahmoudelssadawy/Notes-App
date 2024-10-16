<?php 
    require("./header.php");
    require("conn_db.php");
?>
<div>
  <form action=""method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="uname" placeholder="Your name..">
    <label for="password">Last Name</label>
    <input type="password" id="password" name="passwo" placeholder="Your Password..">
    <input type="submit" value="Register">
  </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_name =$_POST["uname"];
    $db_password = $_POST["passwo"];

    // تأكد من أن الحقول مطابقة لأسماء الأعمدة في قاعدة البيانات
    $sql = "INSERT INTO users (username, passwo)
     VALUES ('$db_name', '$db_password')";

    if (mysqli_query($conn, $sql)) {
        echo "Connection successfully";
        header("Location: login.php");
        exit();
    } else {
        // عرض الخطأ إذا حدث
        echo "Error Connection: " . mysqli_error($conn);
    }
}
?>
<?php require("./footer.php");?>








