<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "blood_donor"
);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>