<?php
// require("conn_db.php");
session_start();
session_unset();
session_destroy(); 
// إعادة توجيه المستخدم إلى صفحة تسجيل الدخول أو الصفحة الرئيسية
header("Location: login.php");
exit(); // إنهاء السكربت فورًا بعد إعادة التوجيه
?>
