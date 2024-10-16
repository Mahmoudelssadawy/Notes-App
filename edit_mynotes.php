<?php require("./header.php");?>
<?php require("./conn_db.php");?>
<?php

$db_note_id= $_GET['note-id'];
$usernam=$_SESSION['username'];

$sql = "SELECT * FROM users WHERE id='$db_note_id'";
$result = mysqli_query($conn, $sql);
$note=mysqli_fetch_assoc($result);

if($_SERVER["REQUEST_METHOD"] == "POST"){

$titel=$_POST["title"];
$content=$_POST["content"];

$sql = "UPDATE mynotes SET title='$titel',content='$content' WHERE id='$db_note_id'";
//$note=mysqli_fetch_assoc($result);

  if (mysqli_query($conn,$sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record";
  }
}
?>
<h2>Edit My Note</h2>
<form action="" method="post">
  <label for="username">Owner Note</label>
  <input type="text" name="username" value="<?php echo $_SESSION["username"]; ?>" disabled><br>  
  
  <label for="title">Content Title</label>
  <input type="text" name="title" value="<?php echo isset($note["title"]) ? $note["title"] : ''; ?>"><br>
  
  <label for="content">My Content</label>
  <textarea id="content" name="content" rows="5"><?php echo isset($note["content"]) ? $note["content"] : ''; ?></textarea><br>
  
  <input type="submit" value="Click To Edit">
</form>

<?php require("./footer.php");?>
