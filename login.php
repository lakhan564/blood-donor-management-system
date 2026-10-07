<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include "../db.php";

$donor_sql = "SELECT COUNT(*) AS total FROM donors";
$donor_result = mysqli_query($conn, $donor_sql);
$donor_data = mysqli_fetch_assoc($donor_result);

$request_sql = "SELECT COUNT(*) AS total FROM blood_requests";
$request_result = mysqli_query($conn, $request_sql);
$request_data = mysqli_fetch_assoc($request_result);

$pending_sql = "SELECT COUNT(*) AS total 
                FROM blood_requests 
                WHERE status='Pending'";

$pending_result = mysqli_query($conn, $pending_sql);
$pending_data = mysqli_fetch_assoc($pending_result);

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="../style.css">

</head>

<body>

<header>

<h1>Admin Dashboard</h1>

<p>Welcome, <?php echo $_SESSION['admin_username']; ?></p>

</header>

<nav>

<a href="dashboard.php">Dashboard</a>

<a href="../donors.php">Donors</a>

<a href="../requests.php">Requests</a>

<a href="logout.php">Logout</a>

</nav>

<div class="container">

<h2>Dashboard</h2>

<div class="cards">

<div class="card">
<h2><?php echo $donor_data['total']; ?></h2>
<p>Total Donors</p>
</div>

<div class="card">
<h2><?php echo $request_data['total']; ?></h2>
<p>Total Requests</p>
</div>

<div class="card">
<h2><?php echo $pending_data['total']; ?></h2>
<p>Pending Requests</p>
</div>

</div>

</div>

</body>
</html>