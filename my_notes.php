<?php require("conn_db.php");?>
<?php require("header.php");?>
<?php

if (!isset($_SESSION['username'])) {
    // echo "Trying to login..";
    header("Location: login.php");
    exit();
}


$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
  $sql = "INSERT INTO mynotes (username, title, content) VALUES ('$username', '$title', '$content')";
        if (mysqli_query($conn, $sql)) {
            //  echo "Connection successfully";
        } else {
            // عرض الخطأ إذا حدث
            echo "Error Connection: " . mysqli_error($conn);
        }
    } else {
        echo "Title and content cannot be empty.";
    }
$sql = "SELECT * FROM mynotes WHERE username ='$username'";
$result = mysqli_query($conn, $sql);
?>
<?php echo "Hello My Bro: " . $_SESSION["username"];?>

<div>
  <form action="" method="post">
    <label for="title">My title</label>
    <input type="text" id="title" name="title" placeholder="My title..">
    <label for="content">My Content</label>
    <textarea id="content" name="content" rows="5" placeholder="My content.."></textarea>
    <input type="submit" value="Click To Add">
  </form>
</div>
<hr>

<h3>Notes</h3>
<?php while($row = mysqli_fetch_assoc($result)): ?>
    <p> 
        <a href="edit_mynotes.php?note-id=<?php echo $row['id']; ?>">
            <?php echo $row['title']; ?>
        </a>
    </p>
<?php endwhile; ?>
<?php require("./footer.php");?>