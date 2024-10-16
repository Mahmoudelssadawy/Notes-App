<?php 
    require("conn_db.php"); // تأكد من تضمين ملف الاتصال بالقاعدة
    require("header.php"); 
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_name = $_POST["uname"];
    $db_password = $_POST["passwo"];

    $sql = "SELECT * FROM users WHERE username='$db_name' AND passwo='$db_password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["username"] = $row['username']; // قم بتخزين ID المستخدم في الجلسة
        echo "Login Done";
        header("Location:my_notes.php");
        exit(); // تأكد من إنهاء السكربت بعد إعادة التوجيه
    } else {
        echo "Re-login";
    }
}
?>
<?php require("./footer.php"); ?>

<div>
  <form action=""method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="uname" placeholder="Your name..">
    <label for="password">Password</label>
    <input type="password" id="password" name="passwo" placeholder="Your Password..">
    <input type="submit" value="Lgoin">
  </form>
</div>
