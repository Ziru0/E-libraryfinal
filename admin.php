<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="dsficon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/glightbox.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">

    <link rel="stylesheet" href="css/flatpickr.min.css">

    <title>DSF Library</title>
</head>
<body>

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="index.php" class="logo">
                            <img src="images/logo.png" alt="" width="150px" height="150px">
                        </a>
                    </div>
                    <div class="col-8 text-center">
                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="Books.php">Books</a></li>
                        </ul>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <div class="account">
                            <div class="col-8 text-center">
                                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                    <li class="has-children">
                                        <a href="">Account</a>
                                        <ul class="dropdown">
                                            <?php if (isset($_SESSION['email'])): ?>
                                                <li><a onclick="window.location.href='profile.php';">Profile</a></li>
                                                <li><a onclick="window.location.href='logout.php';">Log-out</a></li>
                                            <?php else: ?>
                                                <li><a onclick="window.location.href='login.php';">Log-in</a></li>
                                                <li><a onclick="window.location.href='register.php';">Register</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="hero overlay inner-page">
    <img src="images/blob.svg" alt="" class="img-fluid blob">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-6">
                <h1 class="h11">Reservations and Book list</h1>
            </div>
        </div>
    </div>
</div>

<center>
    <style>
        .h11 {
            color: #ffff;
        }

        table {
            margin-top: 30px;
            width: 1000px;
            border-collapse: collapse;
            margin-bottom: 50px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            color: black;
        }

        th {
            color: #ffff;
            background-color: #1553EA;
        }

        h1 {
            margin-top: 50px;
            color: black;
        }

    </style>
    <h1>Reservations</h1>
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-library";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT reservation.*, elib.fullname, elib.course, booklist.title, booklist.author, booklist.about, booklist.status
        FROM reservation 
        JOIN elib ON reservation.user_id = elib.user_id
        JOIN booklist ON reservation.selected_books = booklist.title"; // Assuming `selected_books` stores book titles

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
    <tr>
    <th>Title</th>
    <th>Full Name</th>
    <th>Time</th>
    <th>Course</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["title"] . "</td>
        <td>" . $row["fullname"] . "</td>
        <td>" . $row["timess"] . "</td>
        <td>" . $row["course"] . "</td>
        <td>" . $row["dates"] . "</td>
        <td>" . $row["status"] . "</td>
        <td>
			
            <a class='btn btn-success' href='reserve.php?reserve=" . $row['reservation_id'] . "'>Accept</a>
			<a class='btn btn-success' href='return.php?return=" . $row['reservation_id'] . "'>Returned</a>
            <a class='btn btn-danger' href='delete.php?delete=" . $row['reservation_id'] . "'>Decline</a>
        </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";    
}
$connection->close();
?>

 

    <h1>Books</h1>

    <table cellspacing="0" cellpadding="2" id="sample">
    <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Author</th>
            <th>About</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('conn.php');
        if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; };
        $start_from = ($page-1) * 5;       
        $result = $con->prepare("SELECT * FROM booklist ORDER BY book_id ASC LIMIT $start_from, 5");
        $result->execute();
        while ($row = $result->fetch()) {
        ?>
        <tr class="record" <?php if ($row['status'] == 'reserved') echo 'style="display:none;"'; ?>>
            <td><?php echo $row['book_id']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['about']; ?></td>
            <td><a class='btn btn-danger' href='delete.php?delete1=<?php echo $row['book_id']; ?>'>Delete</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
    </table>

    <div id="pagination">
        <?php 
        $result = $con->prepare("SELECT COUNT(book_id) FROM booklist");
        $result->execute(); 
        $row = $result->fetch(); 
        $total_records = $row[0]; 
        $total_pages = ceil($total_records / 5); 
          
        for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='admin.php?page=".$i."'";
            if ($page == $i) {
                echo " id='active'";
            }
            echo ">";
            echo "".$i."</a> "; 
        }; 
        ?>
    </div>

    <form action="" method="POST">  
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="author" placeholder="Author">
        <input type="text" name="about" placeholder="About">
        <button class="btn btn-primary" type="submit" value="submit" name="addp">Add Book</button>
    </form>  

    <?php
    include 'conn.php';
    if (isset($_POST['addp'])) {
        $stmt = $con->prepare("INSERT INTO booklist (title, author, about) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $author, $about);

        $title = $_POST["title"];
        $author = $_POST["author"];
        $about = $_POST["about"];

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Saved Successfully!')</script>";
        } else {
            echo "<script>alert('Failed to save data.')</script>";
        }
    }
    ?> 

</center>
</body>
</html>
