<?php
include('conn.php');

if (isset($_GET['return'])) {
    $reservation_id = $_GET['return'];

    $stmt = $con->prepare("SELECT selected_books FROM reservation WHERE reservation_id = ?");
    $stmt->execute([$reservation_id]);
    $reservation = $stmt->fetch();
    if ($reservation) {
        $book_title = $reservation['selected_books'];

        $sql = "UPDATE booklist SET status='available' WHERE title=?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$book_title]);
    }
}

header("Location: admin.php"); 
exit();
?>
