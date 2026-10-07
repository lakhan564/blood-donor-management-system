<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blood Donor Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7fa;
            color: #333;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #b30000, #e60000);
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            font-size: 40px;
        }

        .logo h1 {
            font-size: 25px;
        }

        .logo p {
            font-size: 13px;
            margin-top: 4px;
        }

        /* Navigation */
        nav a {
            color: white;
            text-decoration: none;
            margin-left: 22px;
            font-size: 15px;
            font-weight: bold;
        }

        nav a:hover {
            color: #ffd6d6;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(
                rgba(150,0,0,0.85),
                rgba(220,0,0,0.75)
            ),
            url("https://images.unsplash.com/photo-1615461066841-6116e61058f4?auto=format&fit=crop&w=1600&q=80");

            background-size: cover;
            background-position: center;

            min-height: 390px;

            display: flex;
            justify-content: center;
            align-items: center;

            text-align: center;
            color: white;
            padding: 40px 20px;
        }

        .hero-content {
            max-width: 750px;
        }

        .hero h2 {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 19px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .hero-buttons a {
            display: inline-block;
            text-decoration: none;
            padding: 13px 25px;
            margin: 5px;
            border-radius: 7px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-register {
            background: white;
            color: #c40000;
        }

        .btn-search {
            border: 2px solid white;
            color: white;
        }

        .hero-buttons a:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.25);
        }

        /* Main */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-title h2 {
            font-size: 32px;
            color: #b30000;
        }

        .section-title p {
            margin-top: 8px;
            color: #666;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .card {
            background: white;
            padding: 30px 25px;
            border-radius: 15px;
            text-align: center;

            box-shadow: 0 5px 20px rgba(0,0,0,0.08);

            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .card-icon {
            width: 75px;
            height: 75px;
            margin: auto;

            background: #ffe5e5;
            border-radius: 50%;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 35px;
        }

        .card h3 {
            margin: 18px 0 12px;
            color: #b30000;
            font-size: 22px;
        }

        .card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .card a {
            display: inline-block;
            background: #d60000;
            color: white;
            text-decoration: none;

            padding: 10px 22px;
            border-radius: 6px;

            font-weight: bold;
        }

        .card a:hover {
            background: #990000;
        }

        /* Statistics */
        .stats {
            margin-top: 60px;

            background: #fff;

            display: grid;
            grid-template-columns: repeat(4, 1fr);

            border-radius: 15px;

            box-shadow: 0 5px 20px rgba(0,0,0,0.08);

            overflow: hidden;
        }

        .stat {
            text-align: center;
            padding: 30px 15px;
            border-right: 1px solid #eee;
        }

        .stat:last-child {
            border-right: none;
        }

        .stat h2 {
            color: #d00000;
            font-size: 32px;
        }

        .stat p {
            color: #666;
            margin-top: 8px;
        }

        /* Emergency Section */
        .emergency {
            margin-top: 50px;

            background: linear-gradient(135deg, #8b0000, #e00000);

            color: white;

            padding: 35px;

            border-radius: 15px;

            text-align: center;
        }

        .emergency h2 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .emergency p {
            margin-bottom: 20px;
        }

        .emergency a {
            display: inline-block;
            background: white;
            color: #c00000;

            padding: 12px 25px;

            border-radius: 6px;

            text-decoration: none;
            font-weight: bold;
        }

        /* Footer */
        footer {
            margin-top: 60px;

            background: #1f1f1f;
            color: white;

            text-align: center;

            padding: 25px;
        }

        footer p {
            margin: 5px;
            color: #ccc;
        }

        /* Responsive */
        @media(max-width: 900px) {

            header {
                flex-direction: column;
                gap: 20px;
            }

            nav a {
                margin: 5px;
                display: inline-block;
            }

            .cards {
                grid-template-columns: 1fr 1fr;
            }

            .stats {
                grid-template-columns: 1fr 1fr;
            }

            .hero h2 {
                font-size: 38px;
            }
        }

        @media(max-width: 600px) {

            .cards {
                grid-template-columns: 1fr;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .stat {
                border-right: none;
                border-bottom: 1px solid #eee;
            }

            .hero h2 {
                font-size: 30px;
            }

            .hero p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

<!-- HEADER -->
<header>

    <div class="logo">

        <div class="logo-icon">🩸</div>

        <div>
            <h1>Blood Donor Management</h1>
            <p>Donate Blood • Save Lives</p>
        </div>

    </div>

    <nav>
        <a href="index.php">Home</a>
        <a href="register.php">Donor Registration</a>
        <a href="search.php">Search Donors</a>
        <a href="request.php">Request Blood</a>
        <a href="requests.php">Requests</a>
        <a href="admin.php">Admin</a>
    </nav>

</header>


<!-- HERO -->
<section class="hero">

    <div class="hero-content">

        <h2>Donate Blood, Save Lives ❤️</h2>

        <p>
            Welcome to Blood Donor Management System.
            Find blood donors quickly and help people
            during emergency situations.
        </p>

        <div class="hero-buttons">

            <a href="register.php" class="btn-register">
                🩸 Register as Donor
            </a>

            <a href="search.php" class="btn-search">
                🔍 Search Blood
            </a>

        </div>

    </div>

</section>


<!-- SERVICES -->
<div class="container">

    <div class="section-title">

        <h2>Our Services</h2>

        <p>
            Easy and fast blood donor management services
        </p>

    </div>


    <div class="cards">


        <!-- Donor Registration -->
        <div class="card">

            <div class="card-icon">
                🩸
            </div>

            <h3>Donor Registration</h3>

            <p>
                Register yourself as a blood donor
                and help someone in need.
            </p>

            <a href="register.php">
                Register Now
            </a>

        </div>


        <!-- Search -->
        <div class="card">

            <div class="card-icon">
                🔍
            </div>

            <h3>Search Blood</h3>

            <p>
                Search available blood donors
                according to blood group and location.
            </p>

            <a href="search.php">
                Search Donor
            </a>

        </div>


        <!-- Request -->
        <div class="card">

            <div class="card-icon">
                📋
            </div>

            <h3>Blood Request</h3>

            <p>
                Submit a blood requirement request
                for patients and emergencies.
            </p>

            <a href="request.php">
                Request Blood
            </a>

        </div>


        <!-- Availability -->
        <div class="card">

            <div class="card-icon">
                🏥
            </div>

            <h3>Blood Availability</h3>

            <p>
                Check blood availability by
                blood group.
            </p>

            <a href="availability.php">
                Check Blood
            </a>

        </div>


        <!-- Requests -->
        <div class="card">

            <div class="card-icon">
                📑
            </div>

            <h3>Blood Requests</h3>

            <p>
                View and manage submitted
                blood requests.
            </p>

            <a href="requests.php">
                View Requests
            </a>

        </div>


        <!-- Admin -->
        <div class="card">

            <div class="card-icon">
                👨‍💼
            </div>

            <h3>Admin Panel</h3>

            <p>
                Admin can manage donors,
                requests and blood records.
            </p>

            <a href="admin.php">
                Admin Login
            </a>

        </div>

    </div>


    <!-- STATISTICS -->
    <div class="stats">

        <div class="stat">

            <h2>150+</h2>

            <p>Registered Donors</p>

        </div>


        <div class="stat">

            <h2>8</h2>

            <p>Blood Groups</p>

        </div>


        <div class="stat">

            <h2>75+</h2>

            <p>Blood Requests</p>

        </div>


        <div class="stat">

            <h2>120+</h2>

            <p>Lives Helped</p>

        </div>

    </div>


    <!-- EMERGENCY -->
    <div class="emergency">

        <h2>🚨 Need Blood Urgently?</h2>

        <p>
            Search for available blood donors
            according to your blood group.
        </p>

        <a href="search.php">
            Find Blood Donor
        </a>

    </div>

</div>


<!-- FOOTER -->
<footer>

    <h3>🩸 Blood Donor Management System</h3>

    <p>
        Donate Blood • Save Lives
    </p>

    <p>
        © 2026 Blood Donor Management System
    </p>

</footer>

</body>
</html>