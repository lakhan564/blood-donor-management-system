<?php

include "../db.php";

$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$sql = "UPDATE admin 
        SET username='$username', password='$password'
        WHERE id=1";

if (mysqli_query($conn, $sql)) {
    echo "Admin password created successfully.<br>";
    echo "Username: admin<br>";
    echo "Password: admin123";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>