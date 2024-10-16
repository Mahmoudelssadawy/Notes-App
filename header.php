<?php session_start();?>
<?php require("conn_db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App 📚​</title>
    <link rel="stylesheet" href="./style.css"> <!-- تأكد من وضع مسار الملف الصحيح هنا -->
</head>
<body>
    <header>
        <h1>Notes App</h1>
        <nav>
            <ul>
                <?php if (isset($_SESSION["username"])): ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="my_notes.php">My Notes</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <br>
    <!-- باقي المحتوى -->
</body>
</html>
