<?php
include('conn.php');

if (isset($_GET['return'])) {
    $reservation_id = $_GET['return'];

    // Find the book title related to this reservation
    $stmt = $con->prepare("SELECT selected_books FROM reservation WHERE reservation_id = ?");
    $stmt->execute([$reservation_id]);
    $reservation = $stmt->fetch();
    if ($reservation) {
        $book_title = $reservation['selected_books'];

        // Update the status of the book to available
        $sql = "UPDATE booklist SET status='available' WHERE title=?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$book_title]);
    }
}

header("Location: admin.php"); // Redirect back to the admin page
exit();
?>
