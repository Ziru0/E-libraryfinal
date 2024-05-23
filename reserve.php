<?php
include('conn.php');

if (isset($_GET['reserve'])) {
    $reservation_id = $_GET['reserve'];

    // Get the book title from the reservation
    $stmt = $con->prepare("SELECT selected_books FROM reservation WHERE reservation_id = ?");
    $stmt->execute([$reservation_id]);
    $reservation = $stmt->fetch();
    if ($reservation) {
        $book_title = $reservation['selected_books'];

        // Mark the book as reserved
        $sql = "UPDATE booklist SET status='reserved' WHERE title=?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$book_title]);

        // Optionally, you can mark the reservation as accepted in your reservation table if needed
        $sql = "UPDATE reservation SET status='accepted' WHERE reservation_id=?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$reservation_id]);
    }
}

header("Location: admin.php"); // Redirect back to the admin page
exit();
?>
