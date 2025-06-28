<?php
require 'includes/config.inc.php';

// Ensure the user is logged in and session variables are set
session_start();
if (!isset($_SESSION['hostel_id'])) {
    header('Location: login.php'); // Redirect if not logged in
    exit();
}
$hostel_id = $_SESSION['hostel_id'];

if (isset($_POST['search'])) {
    $search_box = $_POST['search_box'];
    $query_search = "SELECT * FROM Student WHERE Student_id LIKE '$search_box%' AND Hostel_id = '$hostel_id'";
    $result_search = mysqli_query($conn, $query_search);

    // Get the hostel name
    $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
    $result6 = mysqli_query($conn, $query6);
    $hostel_name = '';
    if ($row6 = mysqli_fetch_assoc($result6)) {
        $hostel_name = $row6['Hostel_name'];
    }
} else {
    // Default query for allocated rooms
    $query1 = "SELECT * FROM Student WHERE Hostel_id = '$hostel_id'";
    $result1 = mysqli_query($conn, $query1);
    
    // Get the hostel name
    $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
    $result6 = mysqli_query($conn, $query6);
    $hostel_name = '';
    if ($row6 = mysqli_fetch_assoc($result6)) {
        $hostel_name = $row6['Hostel_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Responsive web template, Bootstrap Web Templates">
    <title>Allocated Rooms</title>
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Bootstrap and custom styles -->
    <link rel="stylesheet" href="web_home/css_home/bootstrap.css">
    <link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="web_home/css_home/fontawesome-all.css">

    <!-- Web Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>

<!-- Banner Section -->
<div class="inner-page-banner" id="home">
    <header>
        <div class="container agile-banner_nav">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <h1><a class="navbar-brand" href="home_manager.php">NITC <span class="display"></span></a></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="home_manager.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="allocate_room.php">Allocate Room</a></li>
                        <li class="nav-item"><a class="nav-link" href="message_hostel_manager.php">Messages Received</a></li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms <b class="caret"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li><a href="allocated_rooms.php">Allocated Rooms</a></li>
                                <li><a href="empty_rooms.php">Empty Rooms</a></li>
                                <li><a href="vacate_rooms.php">Vacate Rooms</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact_manager.php">Contact</a></li>
                        <li class="dropdown nav-item">
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li><a href="admin/manager_profile.php">My Profile</a></li>
                                <li><a href="includes/logout.inc.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</div>

<!-- Search Section -->
<section class="contact py-5">
    <div class="container">
        <div class="mail_grid_w3l">
            <form action="allocated_rooms.php" method="post">
                <div class="row">
                    <div class="col-md-9"> 
                        <input type="text" placeholder="Search by Roll Number" name="search_box">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" value="Search" name="search">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php if (isset($_POST['search'])): ?>
<!-- Search Results Table -->
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Contact Number</th>
                <th>Hostel</th>
                <th>Room Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result_search) == 0) {
                echo '<tr><td colspan="5">No Rows Returned</td></tr>';
            } else {
                while ($row_search = mysqli_fetch_assoc($result_search)) {
                    $room_id = $row_search['Room_id']; 
                    $query7 = "SELECT * FROM Room WHERE Room_id = '$room_id'";
                    $result7 = mysqli_query($conn, $query7);
                    $row7 = mysqli_fetch_assoc($result7);
                    $room_no = $row7['Room_No'];
                    $student_name = $row_search['Fname']." ".$row_search['Lname'];
                    echo "<tr><td>{$student_name}</td><td>{$row_search['Student_id']}</td><td>{$row_search['Mob_no']}</td><td>{$hostel_name}</td><td>{$room_no}</td></tr>\n";
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<!-- Allocated Rooms Section -->
<div class="container">
    <h2 class="heading text-capitalize mb-sm-5 mb-4"> Rooms Allotted </h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Contact Number</th>
                <th>Hostel</th>
                <th>Room Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (mysqli_num_rows($result1) == 0) {
                    echo '<tr><td colspan="5">No Rows Returned</td></tr>';
                } else {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $room_id = $row1['Room_id']; 
                        $query7 = "SELECT * FROM Room WHERE Room_id = '$room_id'";
                        $result7 = mysqli_query($conn, $query7);
                        $row7 = mysqli_fetch_assoc($result7);
                        $room_no = $row7['Room_No'];
                        $student_name = $row1['Fname']." ".$row1['Lname'];
                        echo "<tr><td>{$student_name}</td><td>{$row1['Student_id']}</td><td>{$row1['Mob_no']}</td><td>{$hostel_name}</td><td>{$room_no}</td></tr>\n";
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<footer class="py-5">
    <div class="container py-md-5">
        <div class="footer-logo mb-5 text-center">
            <a class="navbar-brand" href="http://www.nitc.ac.in/" target="_blank">NIT <span class="display"> CALICUT</span></a>
        </div>
        <div class="footer-grid">
            <div class="list-footer">
                <ul class="footer-nav text-center">
                    <li><a href="home_manager.php">Home</a></li>
                    <li><a href="allocate_room.php">Allocate</a></li>
                    <li><a href="contact_manager.php">Contact</a></li>
                    <li><a href="admin/manager_profile.php">Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap Scripts -->
<script src="web_home/js_home/jquery-2.2.3.min.js"></script>
<script src="web_home/js_home/bootstrap.js"></script>

</body>
</html>
