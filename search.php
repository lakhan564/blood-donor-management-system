<?php
// search.php

// Database connection बाद में यहां जोड़ा जा सकता है.
// अभी graphical search page तैयार किया गया है.
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Search Blood Donor</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
            color: #333;
        }

        /* HEADER */

        header {
            background: linear-gradient(135deg, #b30000, #e00000);
            color: white;

            padding: 18px 7%;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow: 0 3px 12px rgba(0,0,0,0.2);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            font-size: 38px;
        }

        .logo h1 {
            font-size: 24px;
        }

        .logo p {
            font-size: 13px;
            margin-top: 4px;
        }

        nav a {
            color: white;
            text-decoration: none;

            margin-left: 20px;

            font-weight: bold;
            font-size: 14px;
        }

        nav a:hover {
            color: #ffdede;
        }


        /* PAGE TITLE */

        .page-title {
            text-align: center;
            padding: 40px 15px 20px;
        }

        .page-title h2 {
            color: #b30000;
            font-size: 36px;
        }

        .page-title p {
            color: #777;
            margin-top: 8px;
        }


        /* SEARCH BOX */

        .search-container {
            width: 90%;
            max-width: 850px;

            margin: 20px auto 50px;
        }

        .search-card {
            background: white;

            padding: 40px;

            border-radius: 15px;

            box-shadow: 0 8px 25px rgba(0,0,0,0.10);

            text-align: center;
        }


        /* ICON */

        .search-icon {
            width: 80px;
            height: 80px;

            background: #ffe5e5;

            border-radius: 50%;

            margin: auto;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 40px;
        }


        .search-card h3 {
            color: #b30000;

            font-size: 27px;

            margin-top: 18px;
        }

        .search-card p {
            color: #777;

            margin-top: 8px;

            margin-bottom: 30px;
        }


        /* FORM */

        .search-form {
            display: grid;

            grid-template-columns: 1fr auto;

            gap: 12px;

            text-align: left;
        }


        label {
            grid-column: 1 / -1;

            font-weight: bold;

            margin-bottom: -5px;
        }


        select {
            width: 100%;

            padding: 14px;

            border: 1px solid #ccc;

            border-radius: 7px;

            font-size: 16px;

            background: white;

            outline: none;
        }

        select:focus {
            border-color: #d00000;

            box-shadow:
                0 0 5px rgba(208,0,0,0.2);
        }


        /* SEARCH BUTTON */

        .search-btn {
            border: none;

            background:
                linear-gradient(
                    135deg,
                    #b30000,
                    #e00000
                );

            color: white;

            padding: 0 30px;

            border-radius: 7px;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;
        }

        .search-btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 5px 15px rgba(180,0,0,0.3);
        }


        /* BLOOD GROUPS */

        .blood-groups {
            margin-top: 40px;
        }

        .blood-groups h3 {
            color: #b30000;

            margin-bottom: 20px;
        }

        .groups {
            display: grid;

            grid-template-columns:
                repeat(8, 1fr);

            gap: 10px;
        }

        .group {
            background: #fff5f5;

            border: 1px solid #ffd0d0;

            color: #b30000;

            padding: 14px 5px;

            border-radius: 8px;

            font-weight: bold;

            text-align: center;

            transition: 0.3s;
        }

        .group:hover {
            background: #b30000;

            color: white;

            transform: translateY(-3px);
        }


        /* INFO */

        .info-box {
            margin-top: 30px;

            background: #fff5f5;

            border-left:
                5px solid #d00000;

            padding: 15px;

            border-radius: 5px;

            text-align: left;

            color: #555;
        }


        /* FOOTER */

        footer {
            background: #222;

            color: white;

            text-align: center;

            padding: 25px;
        }

        footer p {
            color: #ccc;

            margin-top: 6px;
        }


        /* MOBILE */

        @media(max-width: 700px) {

            header {
                flex-direction: column;

                gap: 15px;

                text-align: center;
            }

            nav a {
                margin: 5px;

                display: inline-block;
            }

            .search-card {
                padding: 25px;
            }

            .search-form {
                grid-template-columns: 1fr;
            }

            .search-btn {
                padding: 14px;
            }

            .groups {
                grid-template-columns:
                    repeat(4, 1fr);
            }

            .page-title h2 {
                font-size: 28px;
            }
        }

    </style>

</head>


<body>


<!-- HEADER -->

<header>

    <div class="logo">

        <div class="logo-icon">
            🩸
        </div>

        <div>

            <h1>
                Blood Donor Management
            </h1>

            <p>
                Donate Blood • Save Lives
            </p>

        </div>

    </div>


    <nav>

        <a href="index.php">
            Home
        </a>

        <a href="register.php">
            Register
        </a>

        <a href="search.php">
            Search Blood
        </a>

        <a href="request.php">
            Request Blood
        </a>

    </nav>

</header>



<!-- PAGE TITLE -->

<section class="page-title">

    <h2>
        Search Blood Donor
    </h2>

    <p>
        Find a blood donor according to blood group
    </p>

</section>



<!-- SEARCH -->

<div class="search-container">

    <div class="search-card">


        <div class="search-icon">
            🔍
        </div>


        <h3>
            Search Available Blood
        </h3>


        <p>
            Select a blood group to find available donors.
        </p>



        <form
            action="search.php"
            method="GET"
            class="search-form"
        >


            <label>
                Select Blood Group
            </label>


            <select
                name="blood_group"
                required
            >

                <option value="">
                    Select Blood Group
                </option>

                <option value="A+">
                    A+
                </option>

                <option value="A-">
                    A-
                </option>

                <option value="B+">
                    B+
                </option>

                <option value="B-">
                    B-
                </option>

                <option value="AB+">
                    AB+
                </option>

                <option value="AB-">
                    AB-
                </option>

                <option value="O+">
                    O+
                </option>

                <option value="O-">
                    O-
                </option>

            </select>


            <button
                type="submit"
                class="search-btn"
            >

                🔍 Search Donor

            </button>


        </form>



        <!-- BLOOD GROUPS -->

        <div class="blood-groups">

            <h3>
                Available Blood Groups
            </h3>


            <div class="groups">

                <div class="group">
                    A+
                </div>

                <div class="group">
                    A-
                </div>

                <div class="group">
                    B+
                </div>

                <div class="group">
                    B-
                </div>

                <div class="group">
                    AB+
                </div>

                <div class="group">
                    AB-
                </div>

                <div class="group">
                    O+
                </div>

                <div class="group">
                    O-
                </div>

            </div>

        </div>



        <!-- INFORMATION -->

        <div class="info-box">

            🩸 <b>How it works:</b>

            Select your required blood group
            and click on
            <b>Search Donor</b>.

            The system will display matching
            donors from the database.

        </div>


    </div>

</div>



<!-- FOOTER -->

<footer>

    <h3>
        🩸 Blood Donor Management System
    </h3>

    <p>
        Donate Blood • Save Lives
    </p>

    <p>
        © 2026 Blood Donor Management System
    </p>

</footer>


</body>

</html>