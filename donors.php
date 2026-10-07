<?php

include "db.php";

$sql = "SELECT * FROM donors ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Blood Donors</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
        }

        header {
            background: linear-gradient(135deg, #b30000, #e00000);
            color: white;
            padding: 20px 7%;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 25px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
        }

        .title h2 {
            color: #b30000;
            font-size: 32px;
        }

        .title p {
            color: #777;
            margin-top: 8px;
        }

        .donor-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .donor-card {
            background: white;
            padding: 25px;
            border-radius: 15px;

            box-shadow:
                0 5px 20px rgba(0,0,0,0.10);

            transition: 0.3s;
        }

        .donor-card:hover {
            transform: translateY(-5px);
        }

        .blood {
            width: 65px;
            height: 65px;

            background: #ffe5e5;
            color: #c00000;

            border-radius: 50%;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 20px;
            font-weight: bold;

            margin-bottom: 15px;
        }

        .donor-card h3 {
            color: #333;
            margin-bottom: 12px;
        }

        .donor-card p {
            margin: 8px 0;
            color: #666;
        }

        .blood-group {
            color: #d00000;
            font-weight: bold;
        }

        .empty {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 12px;
            color: #777;
        }

        footer {
            margin-top: 50px;
            background: #222;
            color: white;
            text-align: center;
            padding: 25px;
        }

        @media(max-width: 800px) {

            .donor-grid {
                grid-template-columns: 1fr 1fr;
            }

            header {
                flex-direction: column;
                gap: 15px;
            }
        }

        @media(max-width: 550px) {

            .donor-grid {
                grid-template-columns: 1fr;
            }
        }

    </style>

</head>

<body>


<header>

    <h1>🩸 Blood Donor Management</h1>

    <nav>

        <a href="index.php">Home</a>

        <a href="register.php">Register</a>

        <a href="search.php">Search Blood</a>

    </nav>

</header>


<div class="container">

    <div class="title">

        <h2>Available Blood Donors</h2>

        <p>
            Registered blood donors
        </p>

    </div>


    <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="donor-grid">


            <?php while ($row = mysqli_fetch_assoc($result)) { ?>


                <div class="donor-card">

                    <div class="blood">

                        <?php
                        echo htmlspecialchars(
                            $row['blood_group']
                        );
                        ?>

                    </div>


                    <h3>

                        👤
                        <?php
                        echo htmlspecialchars(
                            $row['name']
                        );
                        ?>

                    </h3>


                    <p>
                        <b>Age:</b>

                        <?php
                        echo htmlspecialchars(
                            $row['age']
                        );
                        ?>
                    </p>


                    <p>
                        <b>Gender:</b>

                        <?php
                        echo htmlspecialchars(
                            $row['gender']
                        );
                        ?>
                    </p>


                    <p>

                        🩸 <b>Blood Group:</b>

                        <span class="blood-group">

                            <?php
                            echo htmlspecialchars(
                                $row['blood_group']
                            );
                            ?>

                        </span>

                    </p>


                    <p>

                        📱 <b>Mobile:</b>

                        <?php
                        echo htmlspecialchars(
                            $row['mobile']
                        );
                        ?>

                    </p>


                    <p>

                        📧 <b>Email:</b>

                        <?php
                        echo htmlspecialchars(
                            $row['email']
                        );
                        ?>

                    </p>


                    <p>

                        📍 <b>City:</b>

                        <?php
                        echo htmlspecialchars(
                            $row['city']
                        );
                        ?>

                    </p>


                    <p>

                        🏠 <b>Address:</b>

                        <?php
                        echo htmlspecialchars(
                            $row['address']
                        );
                        ?>

                    </p>


                </div>


            <?php } ?>


        </div>

    <?php } else { ?>

        <div class="empty">

            <h3>🩸 No Donors Found</h3>

            <p>
                अभी कोई donor registered नहीं है।
            </p>

        </div>

    <?php } ?>


</div>


<footer>

    <h3>
        🩸 Blood Donor Management System
    </h3>

    <p>
        Donate Blood • Save Lives
    </p>

</footer>


</body>

</html>