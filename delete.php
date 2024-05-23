<?php
include 'connn.php';
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	$sql="delete from reservation where reservation_id = '$delete_id'";
	mysqli_query($connection,$sql);
	echo "<script>alert('Deleted Succesfully!')</script>";
	echo "<script>window.location='books.php'</script>";
}
  ?>

  <?php
include 'connn.php';
if (isset($_GET['delete1'])) {
	$delete_id = $_GET['delete1'];
	$sql="delete from booklist where book_id = '$delete_id'";
	mysqli_query($connection,$sql);
	echo "<script>alert('Declined Succesfully!')</script>";
	echo "<script>window.location='books.php'</script>";
}
  ?>
