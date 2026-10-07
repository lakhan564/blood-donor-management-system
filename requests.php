<?php

include "db.php";

$sql = "SELECT * FROM blood_requests
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Blood Requests</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<header>

<h1>Blood Request Management</h1>

</header>

<nav>

<a href="index.php">Home</a>

<a href="request_blood.php">Request Blood</a>

</nav>

<div class="container">

<h2>All Blood Requests</h2>

<table>

<tr>

<th>Patient</th>
<th>Blood Group</th>
<th>Units</th>
<th>Hospital</th>
<th>Mobile</th>
<th>City</th>
<th>Status</th>

</tr>

<?php

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['blood_group']; ?></td>

<td><?php echo $row['units']; ?></td>

<td><?php echo $row['hospital']; ?></td>

<td><?php echo $row['mobile']; ?></td>

<td><?php echo $row['city']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>